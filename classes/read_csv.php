<?php
/**
 * ReadCSV class
 */
class ReadCSV{

    private $delimiter = ';';
    private $enclosed = '"';
    private $csv;
    private $chunk  = 1000;
    private $handle;
    public function __construct(){
        $this->csv = array();
    }
    /**
     * open file
     *
     * @param [string] $file
     * @return void
     */
    public function open($file){
        $this->handle = fopen($file, "r");
    }
    /**
     * return first line from file
     *
     * @return string
     */
    public function getHeaderString(){
        return implode($this->delimiter,fgetcsv($this->handle));
    }
    /**
     * return first line from file
     *
     * @return array
     */
    public function getHeader(){
        return fgetcsv($this->handle);
    }
    /**
     * return first line from file
     *
     * @return array
     */
    public function getFistLine(){
        return fgetcsv($this->handle);
    }
    /**
     * return one line a time
     *
     * @param boolean $header
     * @return array
     */
    public function readLineByLine($header=false){
        
        if(!$header){
            $this->getFistLine();
        }
        if(($line = $this->getFistLine()) !== FALSE){
            return $line;
        }
        else{
            return false;
        }
    }
    /**
     * return file data in associative_array
     *
     * @param boolean $header
     * @return array
     */
    public function read($header = false){
        $header = $this->getHeader();
        while (($row = fgetcsv($this->handle)) !== FALSE) {
            if(!$header){
                $this->csv[] = $header;
            }
            else{
                $this->csv[] = array_combine($header,$row);
            }
        }

        return $this->csv;
    }
    /**
     * set delimiter file
     *
     * @param [string] $delimiter
     * @return void
     */
    public function setDelimiter($delimiter){
        $this->delimiter = $delimiter;
    }
    /**
     * close file
     *
     * @return void
     */
    public function close(){
        fclose($this->handle);
    }

    public function __destruct()
    {
        if($this->handle != NULL){
            fclose($this->handle);
        }
        
    }
}