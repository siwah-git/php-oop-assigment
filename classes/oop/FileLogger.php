<?php

declare(strict_types=1);
require_once 'Logger.php';

/**
 * Class FileLogger
 * Saves log messages to a file named logs.txt.
 */
class FileLogger extends Logger {

    /**
     * @var string Path to the log file.
     */
    private string $filePath;

    /**
     * FileLogger constructor.
     * @param string $filePath The path to the file where logs will be stored.
     */
    public function __construct(string $filePath = 'data/logs.txt') {
        // If an object is created without an argument, it defaults to 'data/logs.txt'.
        $this->filePath = $filePath;
    }

    /**
     * Writes a message to the log file.
     * @param string $message The log message.
     * @return void
     */
    public function log(string $message): void {
        // Writes new content to the file. FILE_APPEND ensures new messages are added
        // at the end, preserving all log history.
        file_put_contents($this->filePath, $message . PHP_EOL, FILE_APPEND);
    }
}