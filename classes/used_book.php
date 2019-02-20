<?php

require_once '../interfaces/book.php';
/**
 * UsedBook class
 */
class UsedBook implements BookInterface{

    private $title;
    private $authors;
    private $isbn;
    private $price;
    public function __construct($title,$authors,$isbn,$price)
    {
        $this->title = $title;
        $this->authors = $authors;
        $this->isbn = $isbn;
        $this->price = $price;
    }
    /**
     * Undocumented function
     *
     * @param [string] $title
     * @return void
     */
    public function setTitle($title){
        $this->title = $title;
    }
    /**
     * Undocumented function
     *
     * @param [string] $authors
     * @return void
     */
    public function setAuthors($authors){
        $this->authors = $authors;
    }
    /**
     * Undocumented function
     *
     * @param [string] $isbn
     * @return void
     */
    public function setISBN($isbn){
        $this->isbn = $isbn;
    }
    /**
     * Undocumented function
     *
     * @param [string] $price
     * @return void
     */
    public function setPrice($price){
        $this->price = $price;
    }
    /**
     * return book title
     *
     * @return void
     */
    public function getTitle(){
        return $this->title;
    }
    /**
     * return authors of book
     *
     * @return void
     */
    public function getAuthors(){
        return $this->authors;
    }
    /**
     * return isbn of book
     *
     * @return void
     */
    public function getISBN(){
        return $this->isbn;
    }
    /**
     * return price book with discount
     *
     * @return void
     */
    public function getPrice(){
        $price = (double) $this->price * 0.25;
        return number_format((float)($this->price - $price), 2, '.', '');
    }
    /**
     * return original price of book
     *
     * @return void
     */
    public function getOriginalPrice(){
        return number_format((float)($this->price), 2, '.', '');
    }
}