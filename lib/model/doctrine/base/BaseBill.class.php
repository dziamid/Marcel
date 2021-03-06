<?php

/**
 * BaseBill
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $number
 * @property integer $desk_id
 * @property boolean $open
 * @property boolean $is_printed
 * @property boolean $is_hidden
 * @property boolean $is_paperless
 * @property boolean $with_discount
 * @property Doctrine_Collection $Items
 * @property Desk $Desk
 * 
 * @method integer             getNumber()        Returns the current record's "number" value
 * @method integer             getDeskId()        Returns the current record's "desk_id" value
 * @method boolean             getOpen()          Returns the current record's "open" value
 * @method boolean             getIsPrinted()     Returns the current record's "is_printed" value
 * @method boolean             getIsHidden()      Returns the current record's "is_hidden" value
 * @method boolean             getIsPaperless()   Returns the current record's "is_paperless" value
 * @method boolean             getWithDiscount()  Returns the current record's "with_discount" value
 * @method Doctrine_Collection getItems()         Returns the current record's "Items" collection
 * @method Desk                getDesk()          Returns the current record's "Desk" value
 * @method Bill                setNumber()        Sets the current record's "number" value
 * @method Bill                setDeskId()        Sets the current record's "desk_id" value
 * @method Bill                setOpen()          Sets the current record's "open" value
 * @method Bill                setIsPrinted()     Sets the current record's "is_printed" value
 * @method Bill                setIsHidden()      Sets the current record's "is_hidden" value
 * @method Bill                setIsPaperless()   Sets the current record's "is_paperless" value
 * @method Bill                setWithDiscount()  Sets the current record's "with_discount" value
 * @method Bill                setItems()         Sets the current record's "Items" collection
 * @method Bill                setDesk()          Sets the current record's "Desk" value
 * 
 * @package    marcel
 * @subpackage model
 * @author     Dziamid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseBill extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('bill');
        $this->hasColumn('number', 'integer', null, array(
             'type' => 'integer',
             'unique' => true,
             ));
        $this->hasColumn('desk_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('open', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => false,
             ));
        $this->hasColumn('is_printed', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_hidden', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_paperless', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             'notnull' => true,
             ));
        $this->hasColumn('with_discount', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Item as Items', array(
             'local' => 'id',
             'foreign' => 'bill_id',
             'cascade' => array(
             0 => 'delete',
             )));

        $this->hasOne('Desk', array(
             'local' => 'desk_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}