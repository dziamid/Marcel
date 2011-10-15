<?php

/**
 * statItem components.
 *
 * @package    marcel
 * @subpackage statItem
 * @author     Dziamid
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class statsComponents extends sfComponents
{
  public function executeFilterDate(sfWebRequest $request)
  {
    $dates = array();
    
    $dates['this-day'] = array(
      'from' => $this->splitDate(strtotime('now')),
      'to' => $this->splitDate(strtotime('now')),
    );
    $dates['this-week'] = array(
      'from' => $this->splitDate(strtotime('Monday this week')),
      'to' => $this->splitDate(strtotime('Sunday this week')),
    );
    $dates['this-month'] = array(
      'from' => $this->splitDate(strtotime('first day of this month')),
      'to' => $this->splitDate(strtotime('last day of this month')),
    );
    
    $this->dates = $dates;
  }
  /**
   * timestamp to array('day' => 1, 'month' => 1, 'year' => 2010)
   *
   */
  protected function splitDate($timestamp)
  {
    $date = new DateTime('@'.$timestamp);
    
    return array(
      'day' => (int)$date->format('d'),
      'month' => (int)$date->format('m'),
      'year' => (int)$date->format('Y'),
    );
  }
}
