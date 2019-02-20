
<?php

require_once 'basket_from_file.php';
require_once dirname(__DIR__) . '\classes\basket.php';
require_once dirname(__DIR__) . '\classes\read_csv.php';

$nunberArgs = 0;
if (!empty($argv)) {

    $nunberArgs = count($argv);
}

switch ($nunberArgs) {
    case 1:
        main($file = '../tests/basket.csv', $options = '');
        break;
    case 2:
        main($argv[1], $options = '');
        break;
    case 3:
        main($argv[1], $argv[2]);
        break;
    default:
        break;
}

function main($file = '', $options = '')
{

    if (!file_exists($file)) {
        throw new Exception('Incorrect File..!');
        die();
    }
    $basket = new Basket();

    $readCSV = new ReadCSV();
    $readCSV->open($file);
    $readCSV->setDelimiter(',');

    $basketFromFile = new BasketFromFile($readCSV, $basket);
    $basketFromFile->addFileToBasket();

    if ($options == '-displayauthors') {
        printToconsole($basket, $options);
    } elseif ($options == '-basket') {
        return $basket;
    } else {
        printToFile($basket);
    }

}
function printBasket($basket, $options = "")
{

    $books = $basket->getBooks();
    $text = "";

    $totalPriceAmount = $basket->getTotalPriceAmount();

    foreach ($books as $key => $book) {
        $type = ((get_class($book) == 'ExclusiveBook') ? 'Exclusivo' : ((get_class($book) == 'NewBook') ? 'Novo' : ((get_class($book) == 'UsedBook') ? 'Usado' : get_class($book))));
        $book_price = (string)$book->getPrice();
        $book_price_original = (string)$book->getOriginalPrice();
        $book_title = $book->getTitle();
        $book_authors = str_replace('|', ', ', $book->getAuthors());
        $book_isbn = $book->getISBN();

        //$book_price = str_pad($book_price, ((strlen($book_price)) == 5 ? strlen($book_price)+1 : strlen($book_price)+0),' ',STR_PAD_LEFT);
        $book_price = str_pad($book_price, (strlen($book_price) + (strlen($totalPriceAmount) - strlen($book_price))), ' ', STR_PAD_LEFT);
        $book_price_original = str_pad($book_price_original, (strlen($book_price_original) + (strlen($totalPriceAmount) - strlen($book_price_original))), ' ', STR_PAD_LEFT);

        if ($options == '-displayauthors') {
            $text .= "€ $book_price_original/$book_price: $book_title - $book_authors" . PHP_EOL;
        } else {
            $text .= "€ $book_price [$type] $book_isbn: $book_title - $book_authors" . PHP_EOL;
        }
    }

    $text .= "€ $totalPriceAmount - Total" . PHP_EOL;

    return $text;
}
function printToFile($basket)
{
    $text = printBasket($basket);
    file_put_contents('output.txt', $text);

}
function printToConsole($basket, $options = "")
{
    $text = printBasket($basket, $options);
    echo $text;

}

