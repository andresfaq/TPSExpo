<?php

/**
 *
 */
class DivZeroException extends Exception
{
  function __construct($message = "Division by zero" )
  {
    parent::__construct($message, 1);
  }
}


 ?>
