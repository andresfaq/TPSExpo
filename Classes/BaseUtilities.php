<?php


class BaseUtilities
{
    private $foo = "FOO";
    private $externalValue = '{"data":"this is important data"}';

    public function getFoo()
    {
        return $this->foo;
    }

    public function postData($value)
    {
        $this->externalValue = $value;
        return true;
    }

    public function getData()
    {
        return $this->externalValue;
    }
}


?>
