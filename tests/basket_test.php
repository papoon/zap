<?php

require_once '../zap/classes/basket.php';

class BasketTest extends PHPUnit_Framework_TestCase{

    protected $basket;
    
    protected function setUp(){

        $this->basket = new Basket();
    }

    public function testGetNumberBooksIn(){
        $this->assertEquals('3',$this->basket->getNumberBooksIn());
    }
    public function testGetTotalPriceAmount(){
        $this->assertEquals('150.00',$this->basket->getTotalPriceAmount());
    }
    protected function tearDown(){
        $this->book = NULL;
    }
}