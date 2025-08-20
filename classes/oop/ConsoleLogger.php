<?php

declare(strict_types=1);
require_once 'Logger.php';

/**
 * Class ConsoleLogger
 * 
 * Menampilkan pesan log ke layar (output).
 */
class ConsoleLogger extends Logger
{
    /**
     * Menampilkan pesan ke output.
     *
     * @param string $message Pesan log
     * @return void
     */
    public function log(string $message): void
    {
        echo $message . PHP_EOL;
    }
}
