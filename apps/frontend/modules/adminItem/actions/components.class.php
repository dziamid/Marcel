<?php

/**
 * adminItem components.
 *
 * @package    marcel
 * @subpackage adminItem
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminItemComponents extends sfComponents
{
  public function executeFilterToday(sfWebRequest $request)
  {
    $today = new DateTime();
    $this->day = (int)$today->format('d');
    $this->month = (int)$today->format('m');
    $this->year = (int)$today->format('Y');
  }
}
