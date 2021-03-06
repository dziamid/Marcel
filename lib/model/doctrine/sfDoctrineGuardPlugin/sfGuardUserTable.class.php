<?php

/**
 * sfGuardUserTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class sfGuardUserTable extends PluginsfGuardUserTable
{
  /**
   * Returns an instance of this class.
   *
   * @return object sfGuardUserTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('sfGuardUser');
  }
  public function findOneByGroupName($name)
  {
    $q = $this->createQuery('u')
      ->leftJoin('u.Groups g')
      ->where('g.name = ?', 'waiter');
    $result = $q->fetchOne();
    return $result ? $result : new myNull();
  }
}