<?php

require_once dirname(__DIR__).'\interfaces\book.php';
/**
 * ExclusiveBook Class
 */
class ExclusiveBook implements BookInterface
{

    private $title;
    private $authors;
    private $isbn;
    private $price;
    public function __construct($title, $authors, $isbn, $price)
    {
        $this->title = $title;
        $this->authors = $authors;
        $this->isbn = $isbn;
        $this->price = $price;
    }
    /**
     * Define Title
     *
     * @param [string] $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    /**
     * Define Authors
     *
     * @param [string] $authors
     * @return void
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }
    /**
     * Define isbn
     *
     * @param [string] $isbn
     * @return void
     */
    public function setISBN($isbn)
    {
        $this->isbn = $isbn;
    }
    /**
     * define price
     *
     * @param [string] $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    /**
     * return book title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
    /**
     * return authors of book
     *
     * @return string
     */
    public function getAuthors()
    {
        return $this->authors;
    }
    /**
     * return isbn of book
     *
     * @return string
     */
    public function getISBN()
    {
        return $this->isbn;
    }
    /**
     * return price book with discount
     *
     * @return string
     */
    public function getPrice()
    {
        //$price = (double) $this->price * 0.1;
        return number_format((float)($this->price), 2, '.', '');
    }
    /**
     * return original price of book
     *
     * @return string
     */
    public function getOriginalPrice()
    {
        return number_format((float)($this->price), 2, '.', '');
    }
}