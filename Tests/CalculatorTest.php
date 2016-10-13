<?php
require_once(__DIR__.'/../Classes/Exceptions/DivZeroException.php');
include(__DIR__.'/../Classes/Calculator.php');
//include(__DIR__.'/../Classes/Utilities.php');

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private $calculator;

    private $utilitiesMock;

    public function setUp(){
      $this->utilitiesMock = $this->getMockBuilder('Utilities')
                                  ->setMethods(['getAwesomeString','getData','postData'])
                                  ->getMock();
      $this->utilitiesMock->method('getAwesomeString')
                          ->willReturn('===AwesomeStringMock===');

      $this->utilitiesMock->method('postData')
                          ->willReturn(true);

      $this->utilitiesMock->method('getData')
                          ->willReturn('=== My Mocked Data ===');

      $this->calculator = new Calculator($this->utilitiesMock);
      //$this->calculator = new Calculator();
    }


    /**
     *@covers Calculator::__construct
     */
    public function testConstructorWithoutParameters()
    {
      $this->calculator = new Calculator();
    }

    /**
     *@covers Calculator::add
     */
    public function testAdd()
    {
      $actual = $this->calculator->add(5,5);
      $expected = 10;
      $this->assertEquals($expected, $actual);
    }

    /**
     *@covers Calculator::sub
     */
    public function testSub()
    {
      $actual = $this->calculator->sub(5,5);
      $expected = 0;
      $this->assertEquals($expected, $actual);

      $actual = $this->calculator->sub(5,5,true);
      $expected = 0;
      $this->assertEquals($expected, $actual);

    }

    /**
     *@covers Calculator::mult
     */
    public function testMult()
    {
      $actual = $this->calculator->mult(5,5);
      $expected = 25;
      $this->assertEquals($expected, $actual);

      $actual = $this->calculator->getMessage();
      //$expected = "==============Multiplicacion realizada satisfactoriamente=============";
      $expected = '===AwesomeStringMock===';
      $this->assertStringStartsWith($expected, $actual);

    }

    /**
     *@covers Calculator::div
     */
    public function testDiv()
    {
      $actual = $this->calculator->div(15,5);
      $expected = 3;
      $this->assertEquals($expected, $actual);
    }

    /**
     *@covers Calculator::div
     */
    public function testDivException()
    {
      $this->setExpectedException('DivZeroException');
      $this->calculator->div(15,0);
    }

    /**
     *@covers Calculator::testeable
     */
    public function testTesteable()
    {

      $actual = $this->calculator->testeable($this->utilitiesMock);
      $expected = '=== My Mocked Data ===';
      $this->assertEquals($expected, $actual);

    }


}
?>
