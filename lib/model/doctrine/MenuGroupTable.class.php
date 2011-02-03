<?php

/**
 * MenuGroupTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class MenuGroupTable extends Doctrine_Table
{
  /**
   * Returns an instance of this class.
   *
   * @return object MenuGroupTable
   */
  public static function getInstance()
  {
    return Doctrine_Core::getTable('MenuGroup');
  }
  public function getForList()
  {
    //don't show soft deleted groups and items
    Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, true);
    $return = $this->createQuery('g')
      ->leftJoin('g.Items i')
      ->orderBy('g.type, g.index, i.index')
      ->execute();
      
    Doctrine_Manager::getInstance()->setAttribute(Doctrine_Core::ATTR_USE_DQL_CALLBACKS, false);

    return $return;
  }
  /**
   * Efficiency query
   *
   */
  public function getForAdmin(Doctrine_Query $q)
  {
    $alias = $q->getRootAlias();
    $q->leftJoin($alias.'.Items i');
  }
}