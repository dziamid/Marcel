<?php

require_once dirname(__FILE__).'/../lib/MenuGroupGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/MenuGroupGeneratorHelper.class.php';

/**
 * MenuGroup actions.
 *
 * @package    marcel
 * @subpackage MenuGroup
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuGroupActions extends autoMenuGroupActions
{
  public function preExecute()
  {
    parent::preExecute();
    $this->getUser()->setCulture('ru');
    Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);

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
        $menu_group = Doctrine::getTable('MenuGroup')->findOneById($id);
        $menu_group->setIndex($index);
        $menu_group->save();
      }
    }
    return $this->renderText(true);
  }
  
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->getNode()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    $this->redirect('@menu_group');
  }

}
