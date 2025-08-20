<?php
namespace Classes\Oop;

require_once __DIR__ . '/Logger.php';

/**
 * App
 * 
 * Represents an application that uses dependency injection of Logger.
 */
class App
{
    /** @var Logger $logger Logger instance */
    private Logger $logger;

    /**
     * Constructor
     * 
     * @param Logger $logger Logger instance (FileLogger or ConsoleLogger)
     */
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Run the application and write logs at different stages.
     * 
     * @return void
     */
    public function run(): void
    {
        $this->logger->log("Application started");
        $this->logger->log("Doing some work...");
        $this->logger->log("Application finished");
    }
}