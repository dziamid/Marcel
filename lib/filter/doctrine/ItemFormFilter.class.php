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
    $this->setWidget('menu_group', new sfWidgetFormChoice(array(
      'choices' => array('' => 'any') + MenuGroupTable::getInstance()->getChoices(),
    )));
    $this->setValidator('menu_group', new sfValidatorPass());
    
    // menu item custom filter (show only those of a chosen group (jquery filter))
    $this->setWidget('menu_item_id', new sfWidgetFormChoice(array(
      'choices' => $this->getMenuItemChoices(true),
      'renderer_class' => 'myWidgetFormSelectItem'
    )));
    
    $this->setWidget('type', new sfWidgetFormChoice(array(
      'choices' => array_merge(array(0=>''),MenuGroup::getTypes())
    )));
    
    $this->setValidator('type', new sfValidatorPass());
    
    $this->setWidget('bill_id', new sfWidgetFormInput());
    $this->setValidator('bill_id', new sfValidatorPass());
    
    $this->setWidget('bill_is_hidden', new sfWidgetFormInputCheckbox());
    $this->setValidator('bill_is_hidden', new sfValidatorPass());
    
    $this->setWidget('bill_is_paperless', new sfWidgetFormInputCheckbox());
    $this->setValidator('bill_is_paperless', new sfValidatorPass());
    
  }
  
  public function getFields()
  {
    $fields = parent::getFields();
    $fields['menu_group'] = 'menu_group';
    return $fields;
  }
  public function addBillIdColumnQuery($query, $field, $value)
  {
    $rootAlias = $query->getRootAlias();
    //assume that query is left joined on Bill as b
    //see ItemTable::getItems
    $query->
      addWhere('b.number = ?', $value);
  }
  public function addBillIsHiddenColumnQuery($query, $field, $value)
  {
    //assume that query is left joined on Bill as b
    //see ItemTable::getItems
    if ($value == 'on')
    {
      //show all that are not hidden
      $query->addWhere('b.is_hidden = ?', true);      
    }
  }
  public function addBillIsPaperlessColumnQuery($query, $field, $value)
  {
    //assume that query is left joined on Bill as b
    //see ItemTable::getItems
    if ($value == 'on')
    {
      //show all that are not hidden
      $query->addWhere('b.is_paperless = ?', true);      
    }
  }
  public function addMenuGroupColumnQuery($query, $field, $value)
  {
    $rootAlias = $query->getRootAlias();
    $query->
      addWhere('g.id = ?', $value);
  }
  public function addTypeColumnQuery($query, $field, $value)
  {
    if (!empty($value))
    {
      $query->addWhere('g.type = ?', $value);      
    }
  }
  
  protected function getMenuItemChoices($addEmpty = false)
  {
    $items = MenuItemTable::getInstance()->getChoices();
    
    $choices = array();
    if ($addEmpty)
    {
      $choices[''] = array('label'=>'any', 'data-group'=>'');
    }
    foreach ($items as $item)
    {
      $choices[$item['id']] = array('label'=>$item['name'], 'data-group'=>$item['menu_group_id']);
    }
    return $choices;
  }
}
