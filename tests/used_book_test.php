<?php

require_once '../zap/classes/book_factory.php';

class UsedBookTest extends PHPUnit_Framework_TestCase
{

    protected $book;
    protected $bookFactory;
    protected function setUp()
    {

        $this->bookFactory = new BookFactory();
        $this->book = $this->bookFactory->makeBook('The Art of Computer Programming', 'Donalth Knuth', 'USY', '105.00', 'UsedBook');

    }
    public function testGetPriceNewBook()
    {
        $this->assertEquals('78.75', $this->book->getPrice());
    }
    public function testGetTitleNewBook()
    {
        $this->assertEquals('The Art of Computer Programming', $this->book->getTitle());
    }
    public function testGetISBNNewBook()
    {
        $this->assertEquals('USY', $this->book->getISBN());
    }
    public function testGetAuthorsNewBook()
    {
        $this->assertEquals('Donalth Knuth', $this->book->getAuthors());
    }
    protected function tearDown()
    {
        $this->book = null;
        $this->bookFactory = null;
    }
}