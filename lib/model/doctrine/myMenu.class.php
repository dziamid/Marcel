<?php

/**
 * A convenience class for creating the root node of a menu.
 *
 * When creating the root menu object, you can use this class or the
 * normal ioMenuItem class. For example, the following are equivalent:
 *   $menu = new ioMenu(array('class' => 'root'));
 *   $menu = new ioMenuItem(null, null, array('class' => 'root'));
 * 
 * @package     ioMenuPlugin
 * @subpackage  menu
 * @author      Ryan Weaver <ryan@thatsquality.com>
 */
class myMenu extends ioMenu
{
  protected $_menuOptions = array(
    'ignore_params' => true,
    'render_compressed' => true
  );
  
  protected $_dictionary = 'messages';
  
  /**
  * Set $classname to all parents of current page
  *
  */
  public function __construct($options = array(), $childClass = 'ioMenuItem')
  {
    $this->_menuOptions = array_merge($this->_menuOptions, $options);
    
    if ($this->getMenuOption('render_compressed'))
    {
      self::$renderCompressed = true;
    }
    
    parent::__construct($options, $childClass);
    
    if ($this->getMenuOption('ignore_params'))
    {
      $this->ignoreParameters();
    }
  }
  
  public function getMenuOption($name, $default = null)
  {
    if (isset($this->_menuOptions[$name]))
    {
      return $this->_menuOptions[$name];
    }
    return $default;
  }
  
  public function markCurrentBranch($classname)
  {
    if ($current = $this->getCurrent())
    {
      while ($current = $current->getParent())
      {
        $current->setAttribute('class', 'current');
      }    
    }
  }
  /**
  * Display url of the current page ?
  *
  */
  public function hideCurrentUrl($mode = true)
  {
    if ($this->getCurrent())
    {
      $this->getCurrent()->setRoute(null);
    }
  }
  /**
  * Get $level element of current branch
  *
  */
  public function getCurrent($level = null)
  {
    $current = parent::getCurrent();
    if ($level === null)
    {
      return $current;
    }
    if ($current == false)
    {
      return false;
    }
    $current_level = $current->getLevel();
    if ($current_level < $level)
    {
      return null;
    }
    while ($current->getLevel() !== $level)
    {
      $current = $current->getParent();
    }
    return $current;
  }
  /**
  * Wether to ignore ?param=value pairs in uri when getting current uri
  *
  */
  public function ignoreParameters()
  {
    $uri = explode('?', $this->getCurrentUri());
    $this->setCurrentUri($uri[0]);
  }
  /**
  *
  /**
   * Overrides parent's functionality to enable childClass property in app.yml
   * (common class setting for all children)
   *
   */
  public function fromArray($array)
  {
    if (isset($array['name']))
    {
      $this->setName($array['name']);
    }

    if (isset($array['label']))
    {
      $this->_label = $array['label'];
    }

    if (isset($array['i18n_labels']))
    {
      $this->_i18nLabels = $array['i18n_labels'];
    }

    if (isset($array['route']))
    {
      $this->setRoute($array['route']);
    }

    if (isset($array['attributes']))
    {
      $this->setAttributes($array['attributes']);
    }

    if (isset($array['requires_auth']))
    {
      $this->requiresAuth($array['requires_auth']);
    }
    
    if (isset($array['requires_no_auth']))
    {
      $this->requiresNoAuth($array['requires_no_auth']);
    }

    if (isset($array['credentials']))
    {
      $this->setCredentials($array['credentials']);
    }

		if (isset($array['link_options']))
		{
			$this->setLinkOptions($array['link_options']);
		}
    
    $root_child_class = isset($array['child_class']) ? $array['child_class'] : $this->_childClass;

    if (isset($array['children']))
    {
      foreach ($array['children'] as $name => $child)
      {
        //child class setting overrides root class setting
        $class = isset($child['class']) ? $child['class'] : $root_child_class;
        // create the child with the correct class
        $this->addChild($name, null, array(), $class)->fromArray($child);
      }
    }

    return $this;
  }
  /**
  * Set dictionary name for translations
  *
  */
  public function setDictionary($name)
  {
    $this->_dictionary = $name;
    
    return $this;
  }
}