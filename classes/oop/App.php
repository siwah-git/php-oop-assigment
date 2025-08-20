<?php

declare(strict_types=1);
require_once 'Logger.php';

/**
 * Class App
 * 
 * Aplikasi yang menerima logger sebagai dependency.
 */
class App
{
    /**
     * @var Logger Logger yang digunakan
     */
    private Logger $logger;

    /**
     * App constructor.
     *
     * @param Logger $logger Objek turunan dari Logger
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Menjalankan aplikasi.
     *
     * @return void
     */
    public function run(): void
    {
        $this->logger->log("Aplikasi berjalan...");
    }
}
