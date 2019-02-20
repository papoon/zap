<?php

class Basket{
    private $basket;

    public function __construct(){
        $this->basket = array();
    }
    /**
     * Return nunber of books in basket
     *
     * @return integer
     */
    public function getNumberBooksIn(){
        $numberBooks = 0;
        foreach ($this->basket as $key => $item) {
            if($item instanceof BookInterface){
                $numberBooks++;
            }
        }
        return $numberBooks;
    }
    /**
     * return array of books in basket
     *
     * @return array Books
     */
    public function getBooks(){
        $books = array();
        foreach ($this->basket as $key => $item) {
            if($item instanceof BookInterface){
                $books[] = $item;
            }
        }
        return $books;
    }
    /**
     * return total of amount in basket
     *
     * @return string
     */
    public function getTotalPriceAmount(){
        $totalPrice = 0;
        foreach ($this->basket as $key => $item) {
            if($item instanceof BookInterface){
                $totalPrice += $item->getPrice();
            }
        }
        return number_format((float)($totalPrice), 2, '.', '');
    }

    public function addBook(BookInterface $book){
        $this->basket[] = $book;
    }
}