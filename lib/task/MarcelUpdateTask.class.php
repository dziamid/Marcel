<?php
class MarcelUpdateTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addOptions(array());
    $this->namespace = 'marcel';
    $this->name = 'update';
    $this->briefDescription = 'Updates project via git';
  }

  protected function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);
    
    $res = shell_exec('git pull origin master');
    if (preg_match('/up-to-date/is',$res))
    {
      $this->logSection('marcel', 'No updates found');
      return;
    }
    
    $this->logSection('marcel', 'Clearing cache');
    $this->runTask('cache:clear');
    
    $this->logSection('marcel', 'Building all classes');
    $this->runTask('doctrine:build', array(), array('all-classes'));
    $this->runTask('doctrine:clean',array(),array('no-confirmation'));      
  }
}
?>