<?php

/**
 * Class WordCounter
 * Used to count words and find the most frequently occurring words
 * from the contents of a text file
 * @var string path to file
 * @var string string Content of a text file.
 */
class WordCounter {
    private $filepath;
    private $content;

    /**
     * Constructs a new WordCounter instance.
     *
     * @param string $filepath The path to the text file.
     * @throws Exception If the file does not exist or cannot be read.
     */

    public function __construct ($filepath){
        $this->filepath = $filepath;
    if (!file_exists($filepath)) {
        throw new Exception ("file tidak ditemukan : " . $filepath);
    }

    $this->content = file_get_contents($filepath);
    }

    /**
     * Counts the total number of words in the file.
     * @return int The total word count.
     */

    public function countWords(): int{
        $words = str_word_count(strtolower($this->content), 1);
        return count ($words);
}

    public function mostFrequentWord(): string {                // Method to find the most frequently occurring words
        $words = str_word_count(strtolower($this->content), 1);
    
        $frequency = array_count_values($words);                // count the frequency of each word

        arsort($frequency) ;                                    // sort from largest to smallest then take the first one
        $mostFrequent = array_key_first($frequency);

        return $mostFrequent;

    }
}

?>