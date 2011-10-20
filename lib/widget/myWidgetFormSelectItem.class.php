<?php


/**
 * myWidgetFormSelectItem represents a select HTML tag for a list of items in filter,
 * each option is marked with a data-group_id tag to enable link to a group select box
 *
 */
class myWidgetFormSelectItem extends sfWidgetFormSelect
{

  /**
   * Renders the widget.
   *
   * @param  string $name        The element name
   * @param  string $value       The value selected in this widget
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    if ($this->getOption('multiple'))
    {
      $attributes['multiple'] = 'multiple';

      if ('[]' != substr($name, -2))
      {
        $name .= '[]';
      }
    }

    $choices = $this->getOption('choices')->call();
    
    //

    return $this->renderContentTag('select', "\n".implode("\n", $this->getOptionsForSelect($value, $choices))."\n", array_merge(array('name' => $name), $attributes));
  }

  /**
   * Returns an array of option tags for the given choices
   *
   * @param  string $value    The selected value
   * @param  array  $choices  An array of choices
   *
   * @return array  An array of option tags
   */
  protected function getOptionsForSelect($value, $choices)
  {
    $mainAttributes = $this->attributes;
    $this->attributes = array();

    if (!is_array($value))
    {
      $value = array($value);
    }

    $value = array_map('strval', array_values($value));
    $value_set = array_flip($value);

    $options = array();
    foreach ($choices as $key => $option)
    {
      $attributes = array('value' => self::escapeOnce($key));
      if (isset ($option['data-group']))
      {
        $attributes['data-group'] = $option['data-group'];
      }
      if (isset($value_set[strval($key)]))
      {
        $attributes['selected'] = 'selected';
      }

      $options[] = $this->renderContentTag('option', self::escapeOnce($option['label']), $attributes);
    }

    $this->attributes = $mainAttributes;

    return $options;
  }
}
