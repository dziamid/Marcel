<?php

/**
 * MenuGroup form.
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuGroupForm extends BaseMenuGroupForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['slug']);
    $this->setWidget('type', new sfWidgetFormChoice(array(
      'expanded' => true,
      'choices' => array('1' => 'Кухня', '2' => 'Бар')
    )));
  }
}
