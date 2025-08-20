<?php
class CsvReader{
    public $filePath;
    public $header = [];
    public function __construct($filePath){
        $this->filePath = $filePath;
    }
    public function getHeader(){
        if (empty($this->header)){
            if (($handle = fopen($this->filePath,"r")) !== FALSE) {
                $this->header = fgetcsv($handle);
                fclose($handle);
            }
        }
        return $this->header;
    }
    public function getRows(){
        $rows = [];
        $header = $this->getHeader();
        if (($handle=fopen($this->filePath, "r"))!==FALSE){
            fgetcsv($handle);
            while (($data = fgetcsv($handle))!==FALSE){
                $rows[]=array_combine($header,$data);
            }
            fclose($handle);
        }
        return $rows;
    }
}