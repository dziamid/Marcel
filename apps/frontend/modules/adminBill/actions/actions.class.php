<?php

require_once dirname(__FILE__).'/../lib/adminBillGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminBillGeneratorHelper.class.php';

/**
 * adminBill actions.
 *
 * @package    marcel
 * @subpackage adminBill
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminBillActions extends autoAdminBillActions
{
  public function executeBatchHide(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    foreach ($ids as $id)
    {
      $bill = Doctrine::getTable('Bill')->find($id);
      $bill->setIsHidden(true);
      $bill->save();
    }
  }

  public function executeBatchShow(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    foreach ($ids as $id)
    {
      $bill = Doctrine::getTable('Bill')->find($id);
      $bill->setIsHidden(false);
      $bill->save();
    }
  }

  /* Overrides auto to enable sort by custom fields */
  protected function isValidSortColumn($column)
  {
    return $column != 'total';
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
      case 'Desk':
        $sort[0] = 'd.id';
        break;
    }

    $query->addOrderBy($sort[0] . ' ' . $sort[1]);
  }
}
