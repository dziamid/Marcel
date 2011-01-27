<?php

/**
 * item actions.
 *
 * @package    marcel
 * @subpackage item
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class itemActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->items = $this->getRoute()->getObjects();
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

    $this->redirect('@item');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $item = $form->save();

      $this->redirect('@item_edit?id='.$item->getId());
    }
  }

  public function executeUnselect(sfWebRequest $request)
  {
    $item = $this->getRoute()->getObject();
    $item->unselect();
    $bill = $item->getBill();
    
    if ($request->isXmlHttpRequest())
    {
      return $this->renderPartial('bill/show', array(
        'bill' => $bill
      ));
    }
    $this->redirect('desk_show', $item->getBill()->getDesk());
  }
}
