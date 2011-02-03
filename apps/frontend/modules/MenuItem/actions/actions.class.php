<?php

require_once dirname(__FILE__).'/../lib/MenuItemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/MenuItemGeneratorHelper.class.php';

/**
 * MenuItem actions.
 *
 * @package    marcel
 * @subpackage MenuItem
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuItemActions extends autoMenuItemActions
{
  public function preExecute()
  {
    parent::preExecute();
    $this->getUser()->setCulture('ru');
    Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);

  }
  /**
  * Add a menu item to a bill
  */
  public function executeSelect(sfWebRequest $request)
  {
    $item = $this->getRoute()->getObject();
    $bill = Doctrine::getTable('Bill')->findOneById($request->getParameter('bill_id'));
    $bill->addMenuItem($item);

    if ($request->isXmlHttpRequest())
    {
      return $this->renderPartial('bill/show', array('bill' => $bill));
    }
    $this->redirect('desk_show', $bill->getDesk());
  }
  
  /**
   * Save order of menu items (ajax)
   */
  public function executeListSaveOrder(sfWebRequest $request)
  {
    if ($request->isXmlHttpRequest())
    {
      $ids = $request->getParameter('sf_admin_list_table');
      foreach ($ids as $index => $id)
      {
        if (empty($id))
        {
          continue;
        }
        $menu_item = Doctrine::getTable('MenuItem')->findOneById($id);
        $menu_item->setIndex($index);
        $menu_item->save();
      }
    }
    return $this->renderText(true);
  }
}
