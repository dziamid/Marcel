<?php

/**
 * home actions.
 *
 * @package    marcel
 * @subpackage home
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homeActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    //$this->forward('default', 'module');
  }
  public function executeAdmin(sfWebRequest $request)
  {
    $this->redirect('admin_bill');
  }
  public function executeStat(sfWebRequest $request)
  {
    $this->redirect('stat_item');
  }
  public function executePrivate(sfWebRequest $request)
  {
    $treeObject = Doctrine_Core::getTable('MenuGroup')->getTree();

    $groups = Doctrine::getTable('MenuGroup')->findAll();
    foreach ($groups as $group)
    {
    }
    $category = new MenuGroup();
    $category->name = 'Бар';
    $category->save();
    
    $treeObject->createRoot($category);
  }
}
