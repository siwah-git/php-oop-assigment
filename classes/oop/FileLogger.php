<?php

declare(strict_types=1);
require_once 'Logger.php';

/**
 * Class FileLogger
 * Menyimpan pesan log ke dalam file logs.txt.
 */
class FileLogger extends Logger
{
    /**
     * @var string Path ke file log
     */
    private string $filePath;

    /**
     * FileLogger constructor.
     * @param string $filePath Path file tempat menyimpan log
     */
    public function __construct(string $filePath = 'data/logs.txt') //jika membuat objek FileLogger tanpa memberikan argumen, ia akan secara otomatis menggunakan file logs.txt di dalam folder data.
    {
        $this->filePath = $filePath;
    }

    /**
     * Menulis pesan ke file log.
     * @param string $message Pesan log
     * @return void
     */
    public function log(string $message): void
    {
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND); //menulis data ke sebuah file.
        // FILE_APPEND konten baru akan ditambahkan di akhir file, sehingga semua pesan log akan tersimpan.
    }
}
