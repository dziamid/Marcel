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

        $results = $this->pager->getResults();
    $total = 0;
    foreach ($results as $res)
    {
      $total += $res->getTotal();
    }
    $this->results_total = $total;
  }

}
