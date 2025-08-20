<?php
namespace Classes\Oop;

require_once __DIR__ . '/Logger.php';

/**
 * ConsoleLogger
 * 
 * Concrete implementation of Logger that prints log messages to the output.
 */
class ConsoleLogger extends Logger
{
    /**
     * Print a log message to the output.
     * 
     * @param string $message Message to log
     * @return void
     */
    public function log(string $message): void
    {
        echo $this->format($message) . "<br>";
    }
}