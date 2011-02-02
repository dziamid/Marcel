<?php

require_once dirname(__FILE__).'/../lib/statItemGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/statItemGeneratorHelper.class.php';

/**
 * statItem actions.
 *
 * @package    marcel
 * @subpackage statItem
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statItemActions extends autoStatItemActions
{
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);

    $results = $this->pager->getCountQuery()->execute();
    $totalsum = 0;
    foreach ($results as $res)
    {
      //can't use Item::getTotal here because $res is not an item (it's a group of items)
      //here total_sum refers to sql alias for a SUM, see ItemTable::getGroupedByMenuItem
      $totalsum += $res->getTotalSum();
    }
    $this->totalsum = $totalsum;
  }
}
