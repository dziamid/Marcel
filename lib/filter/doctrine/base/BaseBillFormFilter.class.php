<?php

/**
 * Bill filter form base class.
 *
 * @package    marcel
 * @subpackage filter
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBillFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'number'        => new sfWidgetFormFilterInput(),
      'desk_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Desk'), 'add_empty' => true)),
      'open'          => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_printed'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_hidden'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'is_paperless'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'with_discount' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'number'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'desk_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Desk'), 'column' => 'id')),
      'open'          => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_printed'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_hidden'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'is_paperless'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'with_discount' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('bill_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Bill';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'number'        => 'Number',
      'desk_id'       => 'ForeignKey',
      'open'          => 'Boolean',
      'is_printed'    => 'Boolean',
      'is_hidden'     => 'Boolean',
      'is_paperless'  => 'Boolean',
      'with_discount' => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
