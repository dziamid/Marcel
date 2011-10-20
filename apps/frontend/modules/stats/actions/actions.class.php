<?php

/**
 * stats actions.
 *
 * @package    marcel
 * @subpackage stats
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statsActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $query = $this->buildQuery();
    $items = $query->execute(array(), Doctrine::HYDRATE_ARRAY);
    $this->items = $items;
    $totals = array(
      MenuGroup::TYPE_BAR => 0,
      MenuGroup::TYPE_KITCHEN => 0,
    );
    foreach ($items as $item)
    {
      $totals[$item['type']] += $item['total_sum'];
    }
    $this->totals = $totals;
  }
  

  public function executeFilter(sfWebRequest $request)
  {
    if ($request->hasParameter('_reset'))
    {
      $this->setFilters(array());

      $this->redirect('@stats');
    }

    $this->filters = new ItemFormFilter();

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      $this->redirect('@stats');
    }

    $this->setTemplate('index');
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->item = $this->getRoute()->getObject();
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('stats.filters', array(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('stats.filters', $filters, 'admin_module');
  }
  
  protected function buildQuery()
  {
    if (null === $this->filters)
    {
      $this->filters = new ItemFormFilter($this->getFilters());
    }

    $this->filters->setQuery($this->getListQuery());

    $query = $this->filters->buildQuery($this->getFilters());

    return $query;
  }
  
  protected function getListQuery()
  {
    return ItemTable::getInstance()->getGroupedByMenuItem();
  }
}
