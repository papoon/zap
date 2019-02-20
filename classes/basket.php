<?php

class Basket{
    private $basket;

    public function __construct(){
        $this->basket = array();
    }

    public function getNumberBooksIn(){
        $numberBooks = 0;
        foreach ($this->basket as $key => $item) {
            if($item instanceof BookInterface){
                $numberBooks++;
            }
        }
        return $numberBooks;
    }
    public function getBooks(){
        $books = array();
        foreach ($this->basket as $key => $item) {
            if($item instanceof BookInterface){
                $books[] = $item;
            }
        }
        return $books;
    }

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