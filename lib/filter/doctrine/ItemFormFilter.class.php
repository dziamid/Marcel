<?php

/**
 * Item filter form.
 *
 * @package    marcel
 * @subpackage filter
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemFormFilter extends BaseItemFormFilter
{
  public function configure()
  {
    $date_widget = new sfWidgetFormJQueryDate(array(
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
      'culture' => 'ru'
    ));
    $this->setWidget('created_at', new sfWidgetFormFilterDate(array(
      'from_date' => $date_widget,
      'to_date' => $date_widget,
      'with_empty' => false
    )));
    // menu group custom filter
    $this->setWidget('menu_group', new sfWidgetFormDoctrineChoice(array(
      'model' => 'MenuGroup',
      'add_empty' => true
    )));
    $this->setValidator('menu_group', new sfValidatorPass());
    // menu item custom filter (show only those of a chosen group (jquery filter))
    
    $this->setWidget('menu_item_id', new sfWidgetFormDoctrineChoice(array(
      'model' => 'MenuItem',
      'add_empty' => true,
      'renderer_class' => 'myWidgetFormSelectItem'
    )));

  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields['menu_group'] = 'menu_group';
    return $fields;
  }
  public function addMenuGroupColumnQuery($query, $field, $value)
  {
    $rootAlias = $query->getRootAlias();
    $query->
      addWhere('g.id = ?', $value);
  }
}
