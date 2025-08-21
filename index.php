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
echo "=== Prime Generator ===". PHP_EOL . "<br>";
$prime = new PrimeGenerator(20);
print_r($prime->generate());
echo "<br>";

echo "=== CSV Reader ===". PHP_EOL . "<br>";
$csv = new CsvReader('data/students.csv');
print_r($csv->getHeader());
print_r($csv->getRows());
echo "<br>";

echo "=== Logger System ===". PHP_EOL . "<br>";
$fileLogger = new FileLogger('data/logs.txt');
$appFile = new App($fileLogger);
$appFile->run('Application started.');
$consoleLogger = new ConsoleLogger();
$appConsole = new App($consoleLogger);
$appConsole->run('Application is running.');
echo "<br>";

echo "=== Order Management ===". PHP_EOL . "<br>";
$orderRepo = new OrderRepository();
$orderRepo->createOrder("Resty", 150000);
$orderRepo->createOrder("Siwah", 200000);
$orderRepo->createOrder("Sinta", 300000);
echo "- Jumlah Semua Order -". PHP_EOL . "<br>";
echo "Total Orders: " . $orderRepo->getTotalOrders();
echo "- Rata Rata Total Price -". PHP_EOL . "<br>";
echo " Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.');
echo "<br>";
echo "<br>";

echo "=== Basic FizzBuzz ===". PHP_EOL . "<br>";
$fizzbuzz = new FizzBuzz(15, "foo", "bar");
print_r($fizzbuzz->run());
echo "<br>";

echo "=== Word Counter ===". PHP_EOL . "<br>";
try {
    $counter = new WordCounter ("data/sample.txt");
    echo "jumlah kata : " . $counter->countWords() . PHP_EOL;
    echo "<br>";
    echo "kata yang paling banyak muncul : " .$counter->mostFrequentWord() . PHP_EOL;
} catch (Exception $e) {
    echo "ERROR : " . $e->getMessage(); 
}
echo "<br>";

echo "=== Bentuk ===". PHP_EOL . "<br>";
$shapes = [
    new Box(5),
    new Triangle(6, 7),
    new Circle (9)
];

foreach ($shapes as $shape){
    echo get_class($shape).  " luas: ".  $shape->getArea().  "<br>";
}
echo "<br>";

echo "=== User ===". PHP_EOL . "<br>";
$userRepo = new UserRepository();

$userRepo->createUser ("Siti Wahyuni", "Siwah@gmail.com");
$userRepo->createUser ("Dwi Resty", "DwiResty@gmail.com");
$userRepo->createUser ("Sinta ", "Sinta@gmail.com");

echo PHP_EOL;

echo "<br>";

echo "=== pengguna ===" . PHP_EOL . "<br>";
$allUsers = $userRepo->getAllUsers();
echo "Jumlah pengguna: " .count($allUsers) .PHP_EOL;
echo "<br>";
echo "Daftar semua penguna: " .PHP_EOL;
print_r($allUsers);

echo "<br>";

echo "=== pengguna email ===" . PHP_EOL . "<br>";
$user1 = $userRepo->findByEmail("Siwah@gmail.com");
if ($user1) {
    echo "pengguna dengan email : Siwah@gmail.com ditemukan" .  $user1['nama'] . PHP_EOL;
}

echo "<br>";

$user2 = $userRepo->findByEmail("Ria@gmail.com");
if ($user2 == null) {
    echo "pengguna dengan email : Ria@gmail.com tidak ditemukan" . PHP_EOL;
}