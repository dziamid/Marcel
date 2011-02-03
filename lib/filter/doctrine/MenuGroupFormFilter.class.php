<?php

/**
 * MenuGroup filter form.
 *
 * @package    marcel
 * @subpackage filter
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuGroupFormFilter extends BaseMenuGroupFormFilter
{
  public function configure()
  {
    $this->setWidget('type', new sfWidgetFormChoice(array(
      'choices' => array_merge(array(0 => ''), MenuGroup::getTypes())
    )));
    $this->setValidator('type', new sfValidatorChoice(array(
      'choices' => array_keys(MenuGroup::getTypes())
    )));
  }
  /* Why do I have to manually write this? */
  public function addTypeColumnQuery($query, $field, $value)
  {
    $rootAlias = $query->getRootAlias();
    $query->
      addWhere($rootAlias.'.type = ?', $value);
  }
}
