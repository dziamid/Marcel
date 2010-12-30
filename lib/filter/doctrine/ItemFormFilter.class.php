<?php

/**
 * Item filter form.
 *
 * @package    marcel
 * @subpackage filter
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ItemFormFilter extends BaseItemFormFilter
{
  public function configure()
  {
    $date_widget = new sfWidgetFormJQueryDate(array(
      'date_widget' => new sfWidgetFormDate(array('format' => '%day%/%month%/%year%')),
      'culture' => 'ru'
    ));
    $this->setWidget('created_at', new sfWidgetFormFilterDate(array(
      'from_date' => $date_widget,
      'to_date' => $date_widget,
      'with_empty' => false
    )));

  }
}
