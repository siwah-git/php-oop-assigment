<?php

class FizzBuzz
{
    /**
     *  @var int $limit to determine the limit value
     *  @var string $fizzWord for words used to replace multiples of 3
     *  @var string $buzzword for words used to replace multiples of 5
     * 
     */
    public $limit; 
    public $fizzWord;
    public $buzzword;

    /**
     * Constructor to initialize the FizzBuzz property
     * @param int $limit the limit number for the loop.
     * @param string $fizzWord the word for multiples of 3
     * @param string $buzzword the word for multiples of 5
     */
    public function __construct($limit, $fizzWord, $buzzWord)
    {
        $this->limit = $limit;
        $this->fizzWord = $fizzWord;
        $this->buzzword = $buzzWord;
    }
    /**
     * Method Executes the FizzBuzz logic and returns the results.
     * @return array An array containing the FizzBuzz results
     */
    function run() : array {
        $array =[];                              //empty array to hold the results
        for ($i = 1; $i <= $this->limit; $i++) { 
            if ($i % 3 == 0 && $i % 5 == 0) {   //if multiples of 3 & 5 print then the combination of both.
                $array[] = $this->fizzWord . $this->buzzword;
            } elseif ($i % 3 == 0) {            //multiples of 3 print $fizzWord
                $array[] = $this->fizzWord;
            } elseif ($i % 5 == 0) {
                $array[] = $this->buzzword;     //If multiple of 5 print $buzzWord
            } else {
                $array[] = $i;
            }
        }
        return $array;
    }
}

?>