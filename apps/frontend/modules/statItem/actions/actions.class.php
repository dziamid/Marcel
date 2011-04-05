<?php

require_once dirname(__FILE__).'/../lib/statItemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/statItemGeneratorHelper.class.php';

/**
 * statItem actions.
 *
 * @package    marcel
 * @subpackage statItem
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statItemActions extends autoStatItemActions
{
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);

    $results = $this->pager->getCountQuery()->execute();
    $totalsum = 0;
    $total_kitchen = 0;
    $total_bar = 0;
    foreach ($results as $res)
    {
      //can't use Item::getTotal here because $res is not an item (it's a group of items)
      //here total_sum refers to sql alias for a SUM, see ItemTable::getGroupedByMenuItem
      $totalsum += $res->getTotalSum();
      $type = $res->getMenuItem()->getGroup()->getType();
      if ($type == 1)
      {
        $total_kitchen += $res->getTotalSum();
      }
      else if ($type == 2)
      {
        $total_bar += $res->getTotalSum();
      }
    }
    $this->total_bar = $total_bar;
    $this->total_kitchen = $total_kitchen;
    $this->totalsum = $totalsum;
  }
  
  public function executeListSaveReport(sfWebRequest $request)
  {
    parent::executeIndex($request);

    $report = new statReport();
    $data = $this->pager->getCountQuery()->execute();
    $report->create($data);
    $date = new DateTime();
    $file = sprintf('Отчет %s.xlsx',$date->format('Y-m-d H:i:s'));
    $folder = sfConfig::get('sf_web_dir').'/uploads';
    $report->save(sprintf('%s/%s', $folder, $file));
    $this->getUser()->setFlash('notice', sprintf("Отчет '%s' сохранён в папке '%s'",$file, $folder), true);
    $this->redirect('statItem/index');
  }

  public function executeListSaveDayReport(sfWebRequest $request)
  {
    parent::executeIndex($request);
    
    $folder = sfConfig::get('sf_web_dir').'/uploads';
    $report = new statDayReport();
    $data = $this->pager->getCountQuery()->execute();
    $report->create($data);
    $date = new DateTime();
    $file = sprintf('Отчет за день %s.xlsx',$date->format('Y-m-d H:i:s'));
    $report->save(sprintf('%s/%s', $folder, $file));
    $this->getUser()->setFlash('notice', sprintf("Отчет '%s' сохранён в папке '%s'",$file, $folder), true);
    $this->redirect('statItem/index');
  }
  
  /* Overrides auto to enable sort by custom fields */
  protected function isValidSortColumn($column)
  {
    return true;
  }

  /* Overrides auto to enable sort by custom fields  */
  protected function addSortQuery($query)
  {
    if (array(null, null) == ($sort = $this->getSort()))
    {
      return;
    }

    if (!in_array(strtolower($sort[1]), array('asc', 'desc')))
    {
      $sort[1] = 'asc';
    }
    
    switch ($sort[0]) {
      case 'MenuItem':
        $sort[0] = 'm.name';
        break;
      case 'type':
        $sort[0] = 'g.type';
        break;
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }
}
