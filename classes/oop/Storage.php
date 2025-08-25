<?php

class Storage {
    public $file; 


/**
 * Undocumented function
 *
 * @param string $file
 */
public function __construct(string $file) {
    $this->file = $file;

}
/**
 * Undocumented function
 *
 * @param string $data
 * @return void
 */
public function save(string $data): void {
    file_put_contents($this->file, $data . PHP_EOL, FILE_APPEND);
}

public function readAll(): array {
    return file($this->file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
}
}