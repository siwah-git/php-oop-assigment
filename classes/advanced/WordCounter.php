<?php
class WordCounter {
    private $filepath;
    private $content;

    // Constructor menerima path file txt
    public function __construct ($filepath){
        $this->filepath = $filepath;

    // mengecek apakah file yang akan dihitung ada
    if (!file_exists($filepath)) {
        throw new Exception ("file tidak ditemukan : " . $filepath);
    }

    //ambil isi file
    $this->content = file_get_contents($filepath);
    }

    // Method untuk menghitung jumlah kata yang ada di file
    public function countWords(): int{

        $words = str_word_count(strtolower($this->content), 1);
        return count ($words);
}

    public function mostFrequentWord(): string { // Method unruk mencari kata yang paling sering muncul
        $words = str_word_count(strtolower($this->content), 1);
    
        $frequency = array_count_values($words); // hitung frekuensi setiap kata

        arsort($frequency) ; // mengurutkan dari yang terbesar ke kecil lalu ambil yang pertama
        $mostFrequent = array_key_first($frequency);

        return $mostFrequent;

    }
}

?>