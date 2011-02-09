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
    $ids = $request->getParameter('ids');
    foreach ($ids as $id)
    {
      $bill = Doctrine::getTable('Bill')->find($id);
      $bill->setIsHidden(true);
      $bill->save();
    }
  }
}
