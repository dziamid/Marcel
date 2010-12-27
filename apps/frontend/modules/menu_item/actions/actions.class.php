<?php

/**
 * menu_item actions.
 *
 * @package    marcel
 * @subpackage menu_item
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menu_itemActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->menu_groups = Doctrine::getTable('MenuGroup')->findAll();
  }
  public function executeShow(sfWebRequest $request)
  {
    $this->menu_item = $this->getRoute()->getObject();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new MenuItemForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->form = new MenuItemForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->form = new MenuItemForm($this->getRoute()->getObject());
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->form = new MenuItemForm($this->getRoute()->getObject());

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->getRoute()->getObject()->delete();

    $this->redirect('@menu_item');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $menu_item = $form->save();

      $this->redirect('@menu_item_edit?id='.$menu_item->getId());
    }
  }
}
