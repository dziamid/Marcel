<?php

/**
 * MenuGroup form.
 *
 * @package    marcel
 * @subpackage form
 * @author     Dziamid
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MenuGroupForm extends BaseMenuGroupForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at'], $this['slug'], $this['deleted_at'], $this['index'],
          $this['lft'], $this['rgt'], $this['level'], $this['root_id'], $this['parent_id']);

    $this->setWidget('type', new sfWidgetFormChoice(array(
      'expanded' => true,
      'choices' => array('1' => 'Кухня', '2' => 'Бар'),
    )));

    $this->getValidator('name')->setOption('required', true);

    // create a new widget to represent this category's "parent"
    $this->setWidget('parent', new sfWidgetFormDoctrineChoiceNestedSet(array(
      'model'     => 'MenuGroup',
      'table_method' => 'getForAdmin',
      'add_empty' => true,
    )));

    // if the current category has a parent, make it the default choice
    if ($this->getObject()->getParentId())
    {
      $this->setDefault('parent', $this->getObject()->getParentId());
    }

    // set labels of fields
    //$this->widgetSchema->setLabels(array(
    //  'name'   => 'Category',
    //  'parent' => 'Parent category',
    //));
    // set a validator for parent which prevents a category being moved to one of its own descendants
    $this->setValidator('parent', new sfValidatorDoctrineChoiceNestedSet(array(
      'required' => false,
      'model'    => 'MenuGroup',
      'node'     => $this->getObject(),
    )));
    $this->getValidator('parent')->setMessage('node', 'A category cannot be made a descendent of itself.');

  }
  /**
   * Updates and saves the current object. Overrides the parent method
   * by treating the record as a node in the nested set and updating
   * the tree accordingly.
   *
   * @param Doctrine_Connection $con An optional connection parameter
   */
  public function doSave($con = null)
  {
    // save the record itself
    parent::doSave($con);
    // if a parent has been specified, add/move this node to be the child of that node
    if ($this->getValue('parent'))
    {
      $parent = $this->getObject()->getTable()->findOneById($this->getValue('parent'));
      //set parent_id
      $this->getObject()->setParentId($parent->getId());
      if ($this->isNew())
      {
        $this->getObject()->getNode()->insertAsLastChildOf($parent);
      }
      else
      {
        $this->getObject()->getNode()->moveAsLastChildOf($parent);
      }
    }
    // if no parent was selected, add/move this node to be a new root in the tree
    else
    {
      $tree = $this->getObject()->getTable()->getTree();
      //clear parent_id
      $this->getObject()->setParentId(Null);

      if ($this->isNew())
      {
        $tree->createRoot($this->getObject());
      }
      else
      {
        $this->getObject()->getNode()->makeRoot($this->getObject()->getId());
      }
    }
  }

}
