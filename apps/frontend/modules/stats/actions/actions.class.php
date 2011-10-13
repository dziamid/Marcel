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
    $query = ItemTable::getInstance()->getGroupedByMenuItem();
    $items = $query->execute(array(), Doctrine::HYDRATE_ARRAY);
    $this->items = $items;
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
}
