<?php

/**
 * WordCounter
 * 
 * Reads a text file, counts its words, and finds the most frequent word.
 */
class WordCounter {
    /**
     * Path to the text file.
     * @var string
     */
    private string $filepath;

    /**
     * The contents of the text file.
     * @var string
     */
    private string $content;

    /**
     * Create a new WordCounter instance.
     * 
     * @param string $filepath Full path to the text file.
     * @throws Exception If the file does not exist.
     */
    public function __construct(string $filepath) {
        $this->filepath = $filepath;

        if (!file_exists($filepath)) {
            throw new Exception("File not found: " . $filepath);
        }

        $this->content = file_get_contents($filepath);
    }

    /**
     * Count all words in the text file.
     * 
     * @return int Total number of words.
     */
    public function countWords(): int {
        $words = str_word_count(strtolower($this->content), 1);
        return count($words);
    }

    /**
     * Get the most frequent word in the text file.
     * 
     * @return string The word that appears most often.
     */
    public function mostFrequentWord(): string {
        $words = str_word_count(strtolower($this->content), 1);
        $frequency = array_count_values($words);
        arsort($frequency);

        return array_key_first($frequency);
    }
}