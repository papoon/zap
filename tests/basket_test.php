<?php

require_once '../zap/classes/basket.php';
require_once '../zap/classes/book_factory.php';

class BasketTest extends PHPUnit_Framework_TestCase
{

    protected $basket;
    protected $book;
    protected $bookFactory;
    protected function setUp()
    {

        $this->basket = new Basket();
        $this->bookFactory = new BookFactory();
        $this->book = $this->bookFactory->makeBook('Introduction to Python', 'Guido van rossum', 'ZAB', '25.00', 'ExclusiveBook');
        $this->basket->addBook($this->book);
        $this->basket->addBook($this->book);
    }
    public function testGetNumberBooksIn()
    {
        $this->assertEquals('2', $this->basket->getNumberBooksIn());
    }
    public function testGetTotalPriceAmount()
    {
        $this->assertEquals('50.00', $this->basket->getTotalPriceAmount());
    }
    protected function tearDown()
    {
        $this->basket = null;
    }
}