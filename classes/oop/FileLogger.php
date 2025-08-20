<?php
namespace Classes\Oop;

require_once __DIR__ . '/Logger.php';

/**
 * FileLogger
 * 
 * Concrete implementation of Logger that writes log messages into a file.
 */
class FileLogger extends Logger
{
    /** @var string $filePath Path to the log file */
    private string $filePath;

    /**
     * Constructor
     * 
     * @param string $filePath Path to the log file
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Write a log message to file.
     * 
     * @param string $message Message to log
     * @return void
     */
    public function log(string $message): void
    {
        $formatted = $this->format($message) . PHP_EOL;
        file_put_contents($this->filePath, $formatted, FILE_APPEND | LOCK_EX);
    }
}