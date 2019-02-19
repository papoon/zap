<?php

require_once 'new_book.php';
require_once 'used_book.php';
require_once 'exclusive_book.php';

class BookFactory {
    private $book;
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
                $this->book = new NewBook($title,$authors,$isbn,$price);
                break;
        }

        return $this->book;

    }
}
