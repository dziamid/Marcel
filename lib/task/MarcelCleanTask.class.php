<?php
class MarcelCleanTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('months', sfCommandArgument::OPTIONAL, 'Period of time in months', 6),      
    ));
    
    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'frontend'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'prod'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
    ));
    
    $this->namespace = 'marcel';
    $this->name = 'clean';
    $this->briefDescription = 'Clean database Items and corresponding MenuItems (if not used anymore) older then %months% months';
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
    $months = $arguments['months'];
    $date = strtotime($months.' months ago');
    //clean up Items
    $q = ItemTable::getInstance()->createQuery('i')
      ->delete()
      ->where('i.created_at < ?', date('Y-m-d', $date));
      
    $res = $q->execute();
    $this->log(sprintf('Cleaned up %s items', $res));
    //clean up MenuItems
    //remove old MenuItems that are NOT used by any existing Items
    $q = MenuItemTable::getInstance()->createQuery('m')
      ->leftJoin('m.Items i')
      ->where('i.id IS NULL')
      ->andWhere('m.created_at < ?', date('Y-m-d', $date));
    
    $menuItems = $q->execute();
    $count = $menuItems->count();
    
    Doctrine_Manager::connection()->beginTransaction();
    foreach ($menuItems as $item)
    {
      $item->hardDelete();
    }
    Doctrine_Manager::connection()->commit();
    
    $this->log(sprintf('Cleaned up %s menu items', $count));
    
    //clean up MenuGroups
    $q = MenuGroupTable::getInstance()->createQuery('m')
      ->leftJoin('m.Items i')
      ->where('i.id IS NULL')
      ->andWhere('m.created_at < ?', date('Y-m-d', $date));    
    $menuGroups = $q->execute();
    $count = $menuGroups->count();
    
    Doctrine_Manager::connection()->beginTransaction();
    foreach ($menuGroups as $group)
    {
      $group->hardDelete();
    }
    Doctrine_Manager::connection()->commit();
    
    $this->log(sprintf('Cleaned up %s menu groups', $count));
  }
}
?>