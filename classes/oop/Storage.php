<?php

class Storage {
    public $file; 


//method untuk constructor menerima file.txt
public function __construct(string $file) {
    $this->file = $file;

}
//method untuk menyimpan data ke file
public function save(string $data): void {
    file_put_contents($this->file, $data . PHP_EOL, FILE_APPEND);
}
//untuk membaca isi dari file dengan array
public function readAll(): array {
    return file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
}