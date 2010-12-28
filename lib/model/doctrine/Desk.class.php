<?php

/**
 * Desk
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    marcel
 * @subpackage model
 * @author     Dziamid
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Desk extends BaseDesk
{
  public function getOpenBill()
  {
    $q = Doctrine::getTable('Bill')
      ->createQuery('b')
      ->leftJoin('b.Items i')
      ->leftJoin('i.MenuItem')
      ->where('b.open = ?', true)
      ->andWhere('b.desk_id = ?', $this->getId());
    $bill = $q->fetchOne();
    return $bill ? $bill : new myNull();
  }
  public function open()
  {
    $bill = new Bill();
    $bill->setOpen(true);
    $bill->setDesk($this);
    $bill->save();
  }
  public function close()
  {
    if ($this->getOpenBill()->isNotNull())
    {
      $bill = $this->getOpenBill();
      $bill->setOpen(false);
      $bill->save();
    }
  }
}
