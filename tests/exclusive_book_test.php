<?php

require_once '../zap/classes/book_factory.php';

class ExclusiveBookTest extends PHPUnit_Framework_TestCase
{

    protected $book;
    protected $bookFactory;
    protected function setUp()
    {

        $this->bookFactory = new BookFactory();
        $this->book = $this->bookFactory->makeBook('Introduction to Python', 'Guido van rossum', 'ZAB', '25.00', 'ExclusiveBook');

    }
    public function testGetPriceNewBook()
    {
        $this->assertEquals('25.00', $this->book->getPrice());
    }
    public function testGetTitleNewBook()
    {
        $this->assertEquals('Introduction to Python', $this->book->getTitle());
    }
    public function testGetISBNNewBook()
    {
        $this->assertEquals('ZAB', $this->book->getISBN());
    }
    public function testGetAuthorsNewBook()
    {
        $this->assertEquals('Guido van rossum', $this->book->getAuthors());
    }
    protected function tearDown()
    {
        $this->book = null;
        $this->bookFactory = null;
    }
}