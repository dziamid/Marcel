<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/menu_item/index')->

  with('request')->begin()->
    isParameter('module', 'menu_item')->
    isParameter('action', 'index')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;
