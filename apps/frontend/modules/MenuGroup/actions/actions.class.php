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
}
