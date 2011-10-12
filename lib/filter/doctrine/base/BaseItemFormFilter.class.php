<?php

/**
 * Item filter form base class.
 *
 * @package    marcel
 * @subpackage filter
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'menu_item_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('MenuItem'), 'add_empty' => true)),
      'bill_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Bill'), 'add_empty' => true)),
      'quantity'     => new sfWidgetFormFilterInput(),
      'price'        => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'menu_item_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('MenuItem'), 'column' => 'id')),
      'bill_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Bill'), 'column' => 'id')),
      'quantity'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Item';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'menu_item_id' => 'ForeignKey',
      'bill_id'      => 'ForeignKey',
      'quantity'     => 'Number',
      'price'        => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
