<?php

/**
 * home componenets.
 *
 * @package    cert
 * @subpackage home
 * @author     Dziamid Zayankouski
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class menu_itemComponents extends sfComponents
{
  public function executeList(sfWebRequest $request)
  {
    $this->menu_items = Doctrine::getTable('MenuItem')->findAll();
  }
}
