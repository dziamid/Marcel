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
    $this->redirect('menu_item');
  }
  public function executeStats(sfWebRequest $request)
  {
    $this->items = Doctrine::getTable('Item')
      ->getForStatMonth($request->getParameter('month'));
  }
}
