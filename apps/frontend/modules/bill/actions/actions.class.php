<?php

/**
 * bill actions.
 *
 * @package    marcel
 * @subpackage bill
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class billActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->bills = $this->getRoute()->getObjects();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->bill = Doctrine::getTable('Bill')->getForShow();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BillForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new BillForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new BillForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new BillForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('desk');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $bill = $form->save();

      $this->redirect('@bill_edit?id='.$bill->getId());
    }
  }
  
  /**
  * Close an opened bill (from desk show)
  *
  */
  public function executeClose(sfWebRequest $request)
  {
    $bill = $this->getRoute()->getObject();
    $bill->close();
    $this->redirect('desk', $bill->getDesk());

  }
  
  /**
  * Mark a bill as printed (from desk show)
  *
  */
  public function executePrint(sfWebRequest $request)
  {
    $bill = $this->getRoute()->getObject();
    $bill->setIsPrinted(true);
    $bill->save();
    if ($request->isXmlHttpRequest())
    {
      return $this->renderText($bill->getIsPrinted());
    }
    $this->redirect('desk_show', $bill->getDesk());

  }
  
  /**
   * Toggle bill discount state
   */
  public function executeDiscount(sfWebRequest $request)
  {
    $bill = $this->getRoute()->getObject();
    $bill->toggleDiscount();
    $bill->recalculate();
    $bill->save();
    $this->redirect('desk_show', $bill->getDesk());
  }
}
