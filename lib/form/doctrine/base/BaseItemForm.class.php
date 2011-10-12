<?php

/**
 * Item form base class.
 *
 * @method Item getObject() Returns the current form's model object
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseItemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'menu_item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MenuItem'), 'add_empty' => true)),
      'bill_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bill'), 'add_empty' => true)),
      'quantity'     => new sfWidgetFormInputText(),
      'price'        => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'menu_item_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('MenuItem'), 'required' => false)),
      'bill_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Bill'), 'required' => false)),
      'quantity'     => new sfValidatorInteger(array('required' => false)),
      'price'        => new sfValidatorInteger(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

}
