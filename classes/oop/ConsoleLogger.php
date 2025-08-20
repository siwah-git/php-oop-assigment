<?php
/**
 * Class ConsoleLogger
 * A concrete class for logging messages to the console (standard output).
 *
 * @package Classes\OOP
 *
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