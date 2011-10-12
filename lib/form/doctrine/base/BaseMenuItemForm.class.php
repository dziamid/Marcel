<?php

/**
 * MenuItem form base class.
 *
 * @method MenuItem getObject() Returns the current form's model object
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMenuItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'name'          => new sfWidgetFormInputText(),
      'price'         => new sfWidgetFormInputText(),
      'menu_group_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Group'), 'add_empty' => true)),
      'index'         => new sfWidgetFormInputText(),
      'is_active'     => new sfWidgetFormInputCheckbox(),
      'discount'      => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'deleted_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'price'         => new sfValidatorInteger(array('required' => false)),
      'menu_group_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Group'), 'required' => false)),
      'index'         => new sfValidatorInteger(array('required' => false)),
      'is_active'     => new sfValidatorBoolean(array('required' => false)),
      'discount'      => new sfValidatorInteger(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'deleted_at'    => new sfValidatorDateTime(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('menu_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MenuItem';
  }

}
