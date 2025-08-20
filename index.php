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
$orderRepo->createOrder("Resty", 150000);
$orderRepo->createOrder("Siwah", 200000);
$orderRepo->createOrder("Sinta", 300000);
echo "Total Orders: " . $orderRepo->getTotalOrders() . PHP_EOL;
echo "Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.') . PHP_EOL;

echo "\n=== Basic FizzBuzz ===\n";
$fizzbuzz = new FizzBuzz(15, "foo", "bar");
print_r($fizzbuzz->run());

echo "\n=== Word Counter ===\n";
try {
    $counter = new WordCounter ("data/sample.txt");
    echo "jumlah kata : " . $counter->countWords() . PHP_EOL;
    echo "kata yang paling banyak muncul : " .$counter->mostFrequentWord() . PHP_EOL;
} catch (Exception $e) {
    echo "ERROR : " . $e->getMessage(); //akan muncul pesan eror jika gagal memuat data
}

echo "\n=== Word Counter ===\n";
$shapes = [
    new Box(5),
    new Triangle(6, 7),
    new Circle (9)
];

foreach ($shapes as $shape){
    echo get_class($shape). "luas: ". $shape->getArea(). "\n";
}