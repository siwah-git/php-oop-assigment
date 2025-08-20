<?php
namespace Classes\Oop;

/**
 * Abstract class Logger
 * 
 * Base class for logging system. 
 * Provides abstract method log() that must be implemented in child classes.
 */
abstract class Logger
{
    /**
     * Abstract method for logging a message.
     * 
     * @param string $message Message to log
     * @return void
     */
    abstract public function log(string $message): void;

    /**
     * Format a log message with timestamp.
     * 
     * @param string $message Message to format
     * @return string Formatted log message with timestamp
     */
    protected function format(string $message): string
    {
        $time = date('Y-m-d H:i:s');
        return "[$time] $message";
    }
}