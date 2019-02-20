<?php

require_once '../zap/classes/read_csv.php';

class ReadCSVTest extends PHPUnit_Framework_TestCase
{

    protected $csv;

    protected function setUp()
    {

        $this->csv = new ReadCSV();
        $this->csv->open('../zap/tests/basket.csv');
        $this->csv->setDelimiter(',');

    }
    public function testgetHeader()
    {
        $this->assertEquals('type,title,isbn,price,authors', $this->csv->getHeader());
    }
    public function testGetFistLine()
    {
        $this->assertEquals(array('ExclusiveBook', 'Introduction to Python', 'ZAB', '25', 'Guido van rossum'), $this->csv->readLineByLine());
    }
    public function testGetSecondLine()
    {
    }

    protected function tearDown()
    {
        $this->csv = null;
    }
}