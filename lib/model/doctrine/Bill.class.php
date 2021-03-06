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
    //pass new Bill created_at and updated_at dates to related Items:
    $items = $this->getItems();
    foreach ($items as $item)
    {
      $item->setCreatedAt($this->getCreatedAt());
      $item->setUpdatedAt($this->getUpdatedAt());
    }
    return parent::save($conn);
  }
  public function getTotal()
  {
    $total = 0;
    foreach ($this->getItems() as $item)
    {
      $total += $item->getPrice() * $item->getQuantity();
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
      $price = $this->getWithDiscount() ? $menu_item->getDiscountPrice() : $menu_item->getPrice();
      $item->setPrice(round($price,-1));
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
      ->where('b.id = ?', $this->getId())
      ->orderBy('i.created_at');
    
    return $q->fetchOne();
  }
  /**
  * Fetch all items of the bill that relate to certain menu_item type (kitchen or bar)
  *
  */
  public function getItemsByType($type)
  {
    $items = $this->getItems();
    $arr = array();
    foreach ($items as $item)
    {
      if ($item->getMenuItem()->getGroup()->getType() == $type)
      {
        $arr[] = $item;
      }
    }
    return $arr;
  }
  /**
  * Close an open bill
  *
  */
  public function close()
  {
    $this->setOpen(false);
    $this->save();
  }
  /**
   * Toggle bill discount state
   */
  public function toggleDiscount()
  {
    if ($this->getWithDiscount())
    {
      $this->setWithDiscount(false);
    }
    else
    {
      $this->setWithDiscount(true);
    }
  }
  
  /**
   * Recalculate bill items
   *
   * Recalculates bill item prices (according to with_discount setting)
   *
   */
  public function recalculate()
  {
    foreach ($this->getItems() as $item)
    {
      $menu_item = $item->getMenuItem();
      $price = $this->getWithDiscount() ? $menu_item->getDiscountPrice() : $menu_item->getPrice();
      $item->setPrice(round($price,-1));
      $item->save();
    }
    //$this->refresh();
  }

  /**
   * Toggle is_hidden state
   */
  public function toggleHidden()
  {
    if ($this->getIsHidden())
    {
      $this->setIsHidden(false);
    }
    else
    {
      $this->setIsHidden(true);
    }
  }
  
  public function togglePaperless()
  {
    $this->is_paperless = !$this->is_paperless;
  }
}
