<?php

class FizzBuzz
{
    // digunakan untuk menyimpan nilai limit, FiWord dan buzzword
    public $limit;
    public $fizzWord;
    public $buzzword;

    // constructor mengisi nilai progam dari parameter
    public function __construct($limit, $fizzWord, $buzzWord)
    {
        $this->limit = $limit;
        $this->fizzWord = $fizzWord;
        $this->buzzword = $buzzWord;
    }

    // Method utama untuk menjalankan fizzbuzz
    function run() : array {
        $array =[];  // array kosong untuk menampung hasil
        for ($i = 1; $i <= $this->limit; $i++) { // untuk looping sampai angka limit yang diinginkan 
   
            //jika kelipatan 3 & 5 cetak maka gabungan keduanya.
            if ($i % 3 == 0 && $i % 5 == 0) { 
                $array[] = $this->fizzWord . $this->buzzword;

             //kelipatan 3 cetak $fizzWord
            } elseif ($i % 3 == 0) {
                $array[] = $this->fizzWord;

            //Jika kelipatan 5 cetak $buzzWord
            } elseif ($i % 5 == 0) {
                $array[] = $this->buzzword;

            } else {
                $array[] = $i;
            }
        }
        return $array;
    }
}

?>