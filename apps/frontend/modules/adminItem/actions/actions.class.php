<?php

require_once dirname(__FILE__).'/../lib/adminItemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminItemGeneratorHelper.class.php';

/**
 * adminItem actions.
 *
 * @package    marcel
 * @subpackage adminItem
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminItemActions extends autoAdminItemActions
{
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);

    $results = $this->pager->getCountQuery()->execute();
    $totalsum = 0;
    $total_kitchen = 0;
    $total_bar = 0;
    foreach ($results as $res)
    {
      $totalsum += $res->getTotal();
      $type = $res->getMenuItem()->getGroup()->getType();
      if ($type == 1)
      {
        $total_kitchen += $res->getTotal();
      }
      else if ($type == 2)
      {
        $total_bar += $res->getTotal();
      }
    }
    $this->total_bar = $total_bar;
    $this->total_kitchen = $total_kitchen;
    $this->totalsum = $totalsum;
  }

}
