<?php

require_once dirname(__FILE__).'/../lib/adminDeskGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/adminDeskGeneratorHelper.class.php';

/**
 * adminDesk actions.
 *
 * @package    marcel
 * @subpackage adminDesk
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminDeskActions extends autoAdminDeskActions
{
  /**
   * Save order of desks (ajax)
   */
  public function executeListSaveOrder(sfWebRequest $request)
  {
    if ($request->isXmlHttpRequest())
    {
      $ids = $request->getParameter('sf_admin_list_table');
      foreach ($ids as $index => $id)
      {
        if (empty($id))
        {
          continue;
        }
        $desk = Doctrine::getTable('Desk')->findOneById($id);
        $desk->setIndex($index);
        $desk->save();
      }
    }
    return $this->renderText(true);
  }
}
