<?php

/**
 * Class App
 * Represents the main application logic.
 */
class App {

    /**
     * An instance of the logger to be used.
     * @var Logger
     */
    private Logger $logger;

    /**
     * App constructor.
     *
     * @param Logger $logger An instance of a class that inherits from Logger.
     */
    public function __construct(Logger $logger) {
        $this->logger = $logger;
    }

    /**
     * Runs the main application process.
     *
     * @param string $message A message to be logged.
     * @return void
     */
    public function run(string $message): void {
        $this->logger->log($message);
    }
}