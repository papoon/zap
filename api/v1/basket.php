<?php

require_once '../../services/print_basket.php';
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        basket();
        break;
    case 'POST':
        addFileBasket();
        break;
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function addFileBasket()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Methods: POST");
    header('Content-Type: multipart/form-data');
    

    $newFile = __DIR__ . '/' . $_FILES['file']['name'];
    $a = move_uploaded_file($_FILES['file']['tmp_name'], $newFile);
    main($newFile, $options = '');

    http_response_code(201);
    echo json_encode(array("status" => true, "message" => "Books added to basket."));
}

function basket()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");

    $basket = main($file = '../../tests/basket.csv', $options = '-basket');
    http_response_code(200);
    echo json_encode(array("status" => true, "data" => $basket));
}