<?php

require_once('Exceptions/DivZeroException.php');
require_once('Utilities.php');

class Calculator
{
    private $message;
    private $utilities;

    public function __construct($utilities = null)
    {
      if(isset($utilities)){
          $this->utilities = $utilities;
      }else{
          $this->utilities = new Utilities();
      }

    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($msg)
    {
        $this->message = $msg;
    }

    public function add($firstVal, $secondVal)
    {
        return $firstVal + $secondVal;
    }

    public function sub($firstVal, $secondVal)
    {
        // @codeCoverageIgnoreStart
        if(true){
          // nothing
        }
        // @codeCoverageIgnoreEnd
        return $firstVal - $secondVal;

    }

    public function mult($firstVal, $secondVal)
    {
        $this->message = $this->utilities->getAwesomeString("Multiplicacion realizada satisfactoriamente");
        return $firstVal * $secondVal;
    }

    public function div($firstVal, $secondVal)
    {
        if($firstVal==0 || $secondVal==0){
            throw new DivZeroException("Error: Division by Zero");
        }else{
            return $firstVal / $secondVal;
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public function nothing()
    {
          return 0;
    }

    public function untesteable()
    {
          $myUtility = new Utilities();
          $myUtility->postData('{"new data":"im doing changes on the database"}');
          return $myUtility->getData();
    }

    public function testeable($utility)
    {
          $myUtility = $utility;
          $myUtility->postData('{"new data":"im doing changes on the database"}');
          return $myUtility->getData();
    }


}


?>
