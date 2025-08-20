<?php

class FizzBuzz
{
    public $limit;
    public $fizzWord;
    public $buzzword;

    public function __construct($limit, $fizzWord, $buzzWord)
    {
        $this->limit = $limit;
        $this->fizzWord = $fizzWord;
        $this->buzzword = $buzzWord;
    }
    function run()
    {
        for ($i = 1; $i < $this->limit; $i++) {
            if ($i % 3 == 0) {
                $array[] = $this->fizzWord . $this->buzzword;
            } elseif ($i % 3 == 0) {
                $array[] = $this->fizzWord;
            } elseif ($i % 5 == 0) {
                $array[] = $this->buzzword;
            } else {
                $array[] = $array[] = $i;
            }
        }
        return $array;
    }
}

$fizzbuzz = new FizzBuzz(15, "foo", "bar");
print_r($fizzbuzz->run());

?>