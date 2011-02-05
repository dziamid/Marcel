<?php

/**
 * MenuItem form.
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuItemForm extends BaseMenuItemForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['index'], $this['deleted_at']);
    $this->getValidator('name')->setOption('required', true);
    $this->setValidator('price', new sfValidatorInteger(array(
      'required' => true
    )));
    $this->getValidator('menu_group_id')->setOption('required', true);
  }
}
