<?php

declare(strict_types=1);

/**
 * Class Logger (abstract)
 * * An abstraction for a logging system.
 */
abstract class Logger
{
    /**
     * Writes a log message.
     *
     * @param string $message The message to be logged.
     * @return void
     */
    abstract public function log(string $message): void;
}