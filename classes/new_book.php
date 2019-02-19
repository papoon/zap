<?php

require_once '../zap/interfaces/book.php';
class NewBook implements BookInterface{

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
     * @param [type] $title
     * @return void
     */
    public function setTitle($title){
        $this->title = $title;
    }
    public function setAuthors($authors){
        $this->authors = $authors;
    }
    public function setISBN($isbn){
        $this->isbn = $isbn;
    }
    public function setPrice($price){
        $this->price = $price;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getAuthors(){
        return $this->authors;
    }
    public function getISBN(){
        return $this->isbn;
    }
    public function getPrice(){
        $price = (double) $this->price * 0.1;
        return ($this->price - $price);
    }
}


