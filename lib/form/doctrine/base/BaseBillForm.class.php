<?php

/**
 * Bill form base class.
 *
 * @method Bill getObject() Returns the current form's model object
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBillForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'number'        => new sfWidgetFormInputText(),
      'desk_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Desk'), 'add_empty' => true)),
      'open'          => new sfWidgetFormInputCheckbox(),
      'is_printed'    => new sfWidgetFormInputCheckbox(),
      'is_hidden'     => new sfWidgetFormInputCheckbox(),
      'is_paperless'  => new sfWidgetFormInputCheckbox(),
      'with_discount' => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'number'        => new sfValidatorInteger(array('required' => false)),
      'desk_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Desk'), 'required' => false)),
      'open'          => new sfValidatorBoolean(array('required' => false)),
      'is_printed'    => new sfValidatorBoolean(array('required' => false)),
      'is_hidden'     => new sfValidatorBoolean(array('required' => false)),
      'is_paperless'  => new sfValidatorBoolean(array('required' => false)),
      'with_discount' => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Bill', 'column' => array('number')))
    );

    $this->widgetSchema->setNameFormat('bill[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bill';
  }

}
