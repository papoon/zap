<?php

require_once '../zap/classes/book_factory.php';

class NewBookTest extends PHPUnit_Framework_TestCase{

    protected $book;
    protected $bookFactory; 
    protected function setUp(){

        $this->bookFactory = new BookFactory();
        $this->book = $this->bookFactory->makeBook('JavaScript: The Good Parts', 'Douglas Crockford', '1AB', '36.00', 'NewBook');

    }
    public function testGetPriceNewBook(){
        $this->assertEquals('32.40',$this->book->getPrice());
    }
    public function testGetTitleNewBook(){
        $this->assertEquals('JavaScript: The Good Parts',$this->book->getTitle());
    }
    public function testGetISBNNewBook(){
        $this->assertEquals('1AB',$this->book->getISBN());
    }
    public function testGetAuthorsNewBook(){
        $this->assertEquals('Douglas Crockford',$this->book->getAuthors());
    }
    protected function tearDown(){
        $this->book = NULL;
    }
}
