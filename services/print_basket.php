
<?php

require_once 'basket_from_file.php';
require_once '../classes/basket.php';
require_once '../classes/read_csv.php';

if(!empty($argv)){

    $nunberArgs = count($argv);
}


$basket = new Basket();

$readCSV = new ReadCSV();
$readCSV->open('../tests/basket.csv');
$readCSV->setDelimiter(',');

$basketFromFile = new BasketFromFile($readCSV,$basket);
$basketFromFile->addFileToBasket();

printToFile($basket);

function printToFile($basket){
    $books = $basket->getBooks();
    $text = "";

    $totalPriceAmount = $basket->getTotalPriceAmount();

    foreach ($books as $key => $book) {
        $type = ((get_class($book) == 'ExclusiveBook') ? 'Exclusivo' :
         ((get_class($book) == 'NewBook') ? 'Novo' :
          ((get_class($book) == 'UsedBook') ? 'Usado' : get_class($book))) );
        $book_price = (string)$book->getPrice();
        $book_title = $book->getTitle();
        $book_authors = str_replace('|',', ',$book->getAuthors());
        $book_isbn = $book->getISBN();

        //$book_price = str_pad($book_price, ((strlen($book_price)) == 5 ? strlen($book_price)+1 : strlen($book_price)+0),' ',STR_PAD_LEFT);
        $book_price = str_pad($book_price,(strlen($book_price) + (strlen($totalPriceAmount) - strlen($book_price))) ,' ',STR_PAD_LEFT);
        $text .= "€ $book_price [$type] $book_isbn: $book_title - $book_authors".PHP_EOL;
    }
    
    $text .= "€ $totalPriceAmount - Total".PHP_EOL;

    file_put_contents('output.txt', $text);

}

