<?php

/**
 * Bill
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    marcel
 * @subpackage model
 * @author     Dziamid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Bill extends BaseBill
{
  public function __toString()
  {
    return $this->getNumber();
  }
  public function save(Doctrine_Connection $conn = null)
  {
    if (!$this->getNumber())
    {
      $this->setNumber($this->getTable()->getMaxNumber());
    }
    return parent::save($conn);
  }
  public function getTotal()
  {
    $total = 0;
    foreach ($this->getItems() as $item)
    {
      $total += $item->getMenuItem()->getPrice() * $item->getQuantity();
    }
    return $total;
  }
  public function addMenuItem(MenuItem $menu_item, $quantity = 1)
  {
    if ($item = $this->hasMenuItem($menu_item))
    {
      $item->setQuantity($item->getQuantity() + $quantity);
    }
    else
    {
      $item = new Item();
      $item->setMenuItem($menu_item);
      $item->setQuantity($quantity);
      $item->setPrice($menu_item->getPrice());
      $item->setBill($this);
    }
    $item->save();
    $this->refresh(true);
  }
  public function hasMenuItem(MenuItem $menu_item)
  {
    $items = $this->getItems();
    foreach ($items as $item)
    {
      if ($item->getMenuItem() == $menu_item)
      {
        return $item;
      }
    }
    return false;
  }
  public function isOpen()
  {
    return $this->getOpen() == true;
  }
  public function getForShow()
  {
    $q = $this->getTable()
      ->createQuery('b')
      ->leftJoin('b.Items i')
      ->leftJoin('i.MenuItem')
      ->where('b.id = ?', $this->getId());
    
    return $q->fetchOne();
  }
}
