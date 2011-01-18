<?php

/**
 * home componenets.
 *
 * @package    cert
 * @subpackage home
 * @author     Dziamid Zayankouski
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class deskComponents extends sfComponents
{
  public function executeList(sfWebRequest $request)
  {
    Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);
    $this->menu_groups = Doctrine::getTable('MenuGroup')->getForList();
    //not sure if it is needed, but to be on a safe side
    Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, false);

  }
}
