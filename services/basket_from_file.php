<?php

require_once '../classes/book_factory.php';
class BasketFromFile{

    private $file;
    private $basket;
    public function __construct(ReadCSV $file, Basket $basket)
    {
        $this->file = $file;
        $this->basket = $basket;
    }

    public function addFileToBasket(){

        $data = $this->getFileData();

        foreach ($data as $key => $value) {
            $bookFactory = new BookFactory();
            $book = $bookFactory->makeBook($value['title'], $value['authors'], $value['isbn'],  $value['price'], $value['type']);
            
            $this->basket->addBook($book);
        }
    }
    
    public function getFileData(){
        $data = $this->file->read($header=true);

        return $data;
    }
}