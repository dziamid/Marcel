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
  }
  

  public function executeFilter(sfWebRequest $request)
  {
    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

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

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ItemForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new ItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new ItemForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new ItemForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@stats');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $item = $form->save();

      $this->redirect('@stats_edit?id='.$item->getId());
    }
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
      $this->filters = new ItemFormFilter();
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
