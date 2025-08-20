<<<<<<< HEAD
=======
<?php

declare(strict_types=1);

/**
 * The main entry point of the application.
 * This file uses an autoloader to dynamically include class files.
 *
 * @author Gemini
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
echo "=== Prime Generator ===\n";
$prime = new PrimeGenerator(20);
print_r($prime->generate());

echo "\n=== CSV Reader ===\n";
$csv = new CsvReader('data/students.csv');
print_r($csv->getHeader());
print_r($csv->getRows());

echo "\n=== Logger System ===\n";
$fileLogger = new FileLogger('data/logs.txt');
$appFile = new App($fileLogger);
$appFile->run('Application started.');

$consoleLogger = new ConsoleLogger();
$appConsole = new App($consoleLogger);
$appConsole->run('Application is running.');

echo "\n=== Order Management ===\n";
$orderRepo = new OrderRepository();
$orderRepo->createOrder("Andi", 150000);
$orderRepo->createOrder("Budi", 200000);
echo "Total Orders: " . $orderRepo->getTotalOrders() . PHP_EOL;
<<<<<<< HEAD
echo "Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.') . PHP_EOL;
=======
echo "Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.') . PHP_EOL;
>>>>>>> 622323f76d9dff3dc6a83c6a9ac4b59cf8cccc2d
>>>>>>> 6b4c80e4e319fd4912ca23134a3d3168b0b5544a
