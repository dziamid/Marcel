<?php

class myNull
{ 
  public function __call($method, $arguments)
  {
    return new $this;
  }
  public function __toString()
  {
    return '';
  }
  public function isNull()
  {
    return true;
  }
  public function isNotNull()
  {
    return false;
  }
}