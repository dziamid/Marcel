<?php

/**
 * BaseItem
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $menu_item_id
 * @property integer $bill_id
 * @property integer $quantity
 * @property integer $price
 * @property MenuItem $MenuItem
 * @property Bill $Bill
 * 
 * @method integer  getMenuItemId()   Returns the current record's "menu_item_id" value
 * @method integer  getBillId()       Returns the current record's "bill_id" value
 * @method integer  getQuantity()     Returns the current record's "quantity" value
 * @method integer  getPrice()        Returns the current record's "price" value
 * @method MenuItem getMenuItem()     Returns the current record's "MenuItem" value
 * @method Bill     getBill()         Returns the current record's "Bill" value
 * @method Item     setMenuItemId()   Sets the current record's "menu_item_id" value
 * @method Item     setBillId()       Sets the current record's "bill_id" value
 * @method Item     setQuantity()     Sets the current record's "quantity" value
 * @method Item     setPrice()        Sets the current record's "price" value
 * @method Item     setMenuItem()     Sets the current record's "MenuItem" value
 * @method Item     setBill()         Sets the current record's "Bill" value
 * 
 * @package    marcel
 * @subpackage model
 * @author     Dziamid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseItem extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('item');
        $this->hasColumn('menu_item_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('bill_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('quantity', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('price', 'integer', 10, array(
             'type' => 'integer',
             'length' => 10,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('MenuItem', array(
             'local' => 'menu_item_id',
             'foreign' => 'id'));

        $this->hasOne('Bill', array(
             'local' => 'bill_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}