<?php

declare(strict_types=1);

/**
 * The main entry point of the application.
 * This file uses an autoloader to dynamically include class files.
 *
 */

// === Autoload all classes from the specified folders ===
spl_autoload_register(function ($class) {
    $folders = ['classes/basics', 'classes/advanced', 'classes/oop', 'classes/database'];
    foreach ($folders as $folder) {
        $file = $folder . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// === Class call examples ===
echo "=== Prime Generator ===" . PHP_EOL . "<br>";
$prime = new PrimeGenerator(20);
echo "<pre>";
print_r($prime->generate());
echo "</pre>" . PHP_EOL . "<br>";

echo "=== CSV Reader ===" . PHP_EOL . "<br>";
$csv = new CsvReader('data/students.csv');
echo "<pre>";
print_r($csv->getHeader());
print_r($csv->getRows());
echo "</pre>" . PHP_EOL . "<br>";

echo "=== Logger System ===" . PHP_EOL . "<br>";
$fileLogger = new FileLogger('data/logs.txt');
$appFile = new App($fileLogger);
$appFile->run('Application started.');
echo "<br>";

$consoleLogger = new ConsoleLogger();
$appConsole = new App($consoleLogger);
$appConsole->run('Application is running.');
echo "<br>";

echo "=== Order Management ===" . PHP_EOL . "<br>";
$orderRepo = new OrderRepository();
$orderRepo->createOrder("Resty", 150000);
$orderRepo->createOrder("Siwah", 200000);
$orderRepo->createOrder("Sinta", 300000);
echo "Total Orders: " . $orderRepo->getTotalOrders() . PHP_EOL . "<br>";
echo "Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.') . PHP_EOL . "<br>";