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
  }
}
