<?php

/**
 * desk actions.
 *
 * @package    marcel
 * @subpackage desk
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class deskActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $desks = Doctrine::getTable('Desk')->getForIndex();
    $this->desks = $desks;
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->desk = $this->getRoute()->getObject();
    $this->bills = $this->desk->getOpenBills();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DeskForm();
  }
  
  public function executeOpen(sfWebRequest $request)
  {
    $desk = $this->getRoute()->getObject();
    $desk->open();
    $this->redirect('desk_show', $desk);
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new DeskForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new DeskForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new DeskForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@desk');
  }
  
  public function executeClose(sfWebRequest $request)
  {
    $desk = $this->getRoute()->getObject();
    foreach ($desk->getOpenBills() as $bill)
    {
      $bill->close();
    }
    $this->redirect('desk');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $desk = $form->save();

      $this->redirect('@desk_edit?id='.$desk->getId());
    }
  }
}
