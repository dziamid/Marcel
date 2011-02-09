<?php

require_once dirname(__FILE__).'/../lib/adminBillGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminBillGeneratorHelper.class.php';

/**
 * adminBill actions.
 *
 * @package    marcel
 * @subpackage adminBill
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminBillActions extends autoAdminBillActions
{
  public function executeBatchHide(sfWebRequest $request)
  {
    $bills = $this->getRoute()->getObjects();
    foreach ($bills as $bill)
    {
      $bill->setIsHidden(true);
      $bill->save();
    }
  }
}
