<?php
/**
 * Class ConsoleLogger
 * Sebuah kelas untuk mencatat pesan ke konsol.
 * Diterima langsung melalui metode log().
 * @package Classes\OOP
 */
class ConsoleLogger extends Logger {
    /**
     * Mencatat sebuah pesan ke konsol.
     * @param string $message Pesan yang akan dicatat.
     * @return void
     */
    public function log(string $message): void { // mengambil sebuah pesan dan menampilkannya di konsol.
        echo "[LOG] " . $message . PHP_EOL;
    }
}