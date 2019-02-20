<?php

require_once '../classes/book_factory.php';
/**
 * BasketFromFile class
 */
class BasketFromFile
{

    private $file;
    private $basket;
    public function __construct(ReadCSV $file, Basket $basket)
    {
        $this->file = $file;
        $this->basket = $basket;
    }
    /**
     * per line in file create book and add book to basket
     *
     * @return void
     */
    public function addFileToBasket()
    {

        /*$header = $this->file->getHeader();
        if($header !== array('type','title','isbn','price','authors')){
            throw new Exception('File header is not correct');
        }*/

        $data = $this->getFileData();

        foreach ($data as $key => $value) {
            $bookFactory = new BookFactory();
            $book = $bookFactory->makeBook($value['title'], $value['authors'], $value['isbn'], $value['price'], $value['type']);

            $this->basket->addBook($book);
        }
    }
    /**
     * return file data
     *
     * @return array
     */
    public function getFileData()
    {
        $data = $this->file->read($header = true);

        return $data;
    }
}