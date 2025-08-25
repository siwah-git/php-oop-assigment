<?php
/**
 * Class ConsoleLogger
 * 
 * A class for logging messages to the console.
 */
class ConsoleLogger extends Logger {
    /**
     * Logs a message to the console.
     * 
     * @param string $message The message to be logged.
     * @return void
     */
    public function log(string $message): void {
        echo "[LOG] " . $message . PHP_EOL;
    }
}