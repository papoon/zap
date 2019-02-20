<?php

require_once 'new_book.php';
require_once 'used_book.php';
require_once 'exclusive_book.php';

class BookFactory {
    private $book;
    /**
     * create and return type of Book
     *
     * @param [string] $title
     * @param [string] $authors
     * @param [string] $isbn
     * @param [string] $price
     * @param [string] $type
     * @return Book
     */
    function makeBook($title,$authors,$isbn,$price,$type){
        
        switch ($type) {
            case 'NewBook':
                $this->book = new NewBook($title,$authors,$isbn,$price);
                break;
            case 'UsedBook':
                $this->book = new UsedBook($title,$authors,$isbn,$price);
                break;
            case 'ExclusiveBook':
                $this->book = new ExclusiveBook($title,$authors,$isbn,$price);
                break;
            default:
                throw new Exception('Invalid type of book');
                break;
        }

        return $this->book;

    }
}
