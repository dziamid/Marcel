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
    $this->desks = $this->getRoute()->getObjects();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->desk = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DeskForm();
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
