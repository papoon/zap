<?php

interface BookInterface
{
    public function getTitle();
    public function getAuthors();
    public function getISBN();
    public function getPrice();
    public function getOriginalPrice();
    public function setTitle($title);
    public function setAuthors($authors);
    public function setISBN($isbn);
    public function setPrice($price);
}