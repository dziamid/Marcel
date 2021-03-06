<?php

/**
 * DeskTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class DeskTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object DeskTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('Desk');
  }
  public function getForIndex()
  {
    $q = $this->createQuery('d')
      ->leftJoin('d.Bills b with b.open = ?', true)
      ->orderBy('d.index');
      
    return $q->execute();
  }
  public function getForShow()
  {
    $q = $this->createQuery('d')
      ->leftJoin('d.Bills b')
      ->leftJoin('b.Items i')
      ->leftJoin('i.MenuItem');
      
    return $q->fetchOne();
  }
}