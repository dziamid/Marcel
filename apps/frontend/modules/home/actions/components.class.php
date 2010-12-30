<?php

/**
 * home componenets.
 *
 * @package    cert
 * @subpackage home
 * @author     Dziamid Zayankouski
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeComponents extends sfComponents
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeMenu(sfWebRequest $request)
  {
    $menu = new myMenu();
    $menu->fromArray(sfConfig::get('app_menus_frontend'));
    $menu->markCurrentBranch('current');
    $menu->hideCurrentUrl(true);
    
    $this->menu = $menu;
    $this->submenu = $menu->getCurrent(1);

  }
  
  public function executePager()
  {    
  }
}
