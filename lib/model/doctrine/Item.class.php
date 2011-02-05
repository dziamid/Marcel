<?php

/**
 * Item
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    marcel
 * @subpackage model
 * @author     Dziamid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Item extends BaseItem
{
  public function unselect()
  {
    $q = $this->getQuantity();
    if ($q > 1)
    {
      $this->setQuantity($q - 1);
      $this->save();
    }
    else
    {
      $this->delete();
    }
  }
  /**
   * Increase quantity of an item by one
   */
  public function increaseQuantity()
  {
    $this->setQuantity($this->getQuantity() + 1);
    $this->save();
  }
  public function getTotal()
  {
    return $this->getPrice() * $this->getQuantity();
  }
  public function getBill()
  {
    $bill = $this->_get('Bill');
    return null !== $bill->getId() ? $bill : new myNull();
  }
}
