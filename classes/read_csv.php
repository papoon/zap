<?php

class ReadCSV{

    private $delimitir = ';';
    private $enclosed = '"';
    private $csv;
    private $chunk  = 1000;
    private $handle;
    public function __construct(){
        $this->csv = array();
    }

    public function open($file){
        $this->handle = fopen($file, "r");
    }

    public function getHeaderString(){
        return implode($this->delimitir,fgetcsv($this->handle));
    }
    public function getHeader(){
        return fgetcsv($this->handle);
    }
    public function getFistLine(){
        return fgetcsv($this->handle);
    }
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

    public function setDelimiter($delimitir){
        $this->delimitir = $delimitir;
    }

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