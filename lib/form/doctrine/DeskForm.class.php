<?php

/**
 * Desk form.
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DeskForm extends BaseDeskForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->getValidator('number')->setOption('required', true);

  }
}
