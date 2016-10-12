<?php
require_once('Calculator.php');
class AmazingClass
{
    private $calc;

    public function __construct(){
        $calc = new Calculator();
    }

    public function amazingFunction($msg)
    {
        return "==============".$msg."=============";
    }
}


?>
