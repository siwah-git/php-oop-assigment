<?php

/**
 * FizzBuzz
 * 
 * Generates a FizzBuzz sequence with customizable words.
 */
class FizzBuzz {
    /**
     * The upper limit of the sequence.
     * @var int
     */
    public int $limit;

    /**
     * The word to use instead of "Fizz".
     * @var string
     */
    public string $fizzWord;

    /**
     * The word to use instead of "Buzz".
     * @var string
     */
    public string $buzzWord;

    /**
     * Create a new FizzBuzz generator.
     * 
     * @param int $limit Maximum number to generate.
     * @param string $fizzWord Replacement word for multiples of 3.
     * @param string $buzzWord Replacement word for multiples of 5.
     */
    public function __construct(int $limit, string $fizzWord, string $buzzWord) {
        $this->limit = $limit;
        $this->fizzWord = $fizzWord;
        $this->buzzWord = $buzzWord;
    }

    /**
     * Generate the FizzBuzz sequence.
     * 
     * @return array<int|string> The sequence as an array.
     */
    public function run(): array {
        $result = [];

        for ($i = 1; $i <= $this->limit; $i++) {
            if ($i % 3 === 0 && $i % 5 === 0) {
                $result[] = $this->fizzWord . $this->buzzWord;
            } elseif ($i % 3 === 0) {
                $result[] = $this->fizzWord;
            } elseif ($i % 5 === 0) {
                $result[] = $this->buzzWord;
            } else {
                $result[] = $i;
            }
        }

        return $result;
    }
}

?>