<?php

/**
 * MenuGroup form base class.
 *
 * @method MenuGroup getObject() Returns the current form's model object
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMenuGroupForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'index'      => new sfWidgetFormInputText(),
      'name'       => new sfWidgetFormInputText(),
      'slug'       => new sfWidgetFormInputText(),
      'parent_id'  => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'deleted_at' => new sfWidgetFormDateTime(),
      'root_id'    => new sfWidgetFormInputText(),
      'lft'        => new sfWidgetFormInputText(),
      'rgt'        => new sfWidgetFormInputText(),
      'level'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'index'      => new sfValidatorInteger(array('required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parent_id'  => new sfValidatorInteger(array('required' => false)),
      'type'       => new sfValidatorInteger(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'deleted_at' => new sfValidatorDateTime(array('required' => false)),
      'root_id'    => new sfValidatorInteger(array('required' => false)),
      'lft'        => new sfValidatorInteger(array('required' => false)),
      'rgt'        => new sfValidatorInteger(array('required' => false)),
      'level'      => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('menu_group[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuGroup';
  }

}
