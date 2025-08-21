<?php
/**
 * Class App
 * Merepresentasikan logika utama aplikasi
 * @package Classes\OOP
 *
 */
class App {
    /**
     * @var Logger Instansi logger yang akan digunakan.
     * harus selalu berupa objek dari kelas Logger atau kelas apa pun yang mewarisinya
     */
    private Logger $logger;

    /**
     * App constructor.
     *
     * @param Logger $logger Sebuah instansi dari kelas yang mewarisi Logger.
     */
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    /**
     * Menjalankan proses utama aplikasi.
     *
     * @param string $message Sebuah pesan yang akan dicatat.
     * @return void
     */
    public function run(string $message): void { // melakukan "sesuatu" dan kemudian mencatat peristiwa tersebut.
        $this->logger->log($message); //memanggil metode log() dari objek $this->logger.
    }
}