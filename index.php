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
echo "Total Orders: " . $orderRepo->getTotalOrders() . PHP_EOL;
echo "Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.') . PHP_EOL . "<br>";
echo "<br>";

echo "=== Basic FizzBuzz ===". PHP_EOL . "<br>";
$fizzbuzz = new FizzBuzz(15, "foo", "bar");
print_r($fizzbuzz->run());
echo "<br>";

echo "=== Word Counter ===". PHP_EOL . "<br>";
try {
    $counter = new WordCounter ("data/sample.txt");
    echo "jumlah kata : " . $counter->countWords() . PHP_EOL;
    echo "kata yang paling banyak muncul : " .$counter->mostFrequentWord() . PHP_EOL;
} catch (Exception $e) {
    echo "ERROR : " . $e->getMessage(); //akan muncul pesan eror jika gagal memuat data
}
echo "<br>";

echo "=== Bentuk ===". PHP_EOL . "<br>";
$shapes = [
    new Box(5),
    new Triangle(6, 7),
    new Circle (9)
];

foreach ($shapes as $shape){
    echo get_class($shape). "luas: ". $shape->getArea(). "\n";
}
echo "<br>";

echo "=== User ===". PHP_EOL . "<br>";
$db = new Database();
$userRepo = new UserRepository($db);

$userRepo->createUser ("Siti Wahyuni", "Siwah@gmail.com");
$userRepo->createUser ("Dwi Resty", "DwiResty@gmail.com");
$userRepo->createUser ("Sinta ", "Sinta@gmail.com");

$users = $userRepo->getAllUsers();

echo "====user=====";
foreach ($users as $users) {
    echo "nama : " . $user['nama'] . "email : " . $user['nama'];
}

//menjalankan array transformer

echo "=== Array Transformer ===". PHP_EOL . "<br>";

$data = [1,2,3,4,5];
$transformer = new ArrayTransformer($data); // constructor menerima data berisi angka

echo "Angka Asli : ";
echo "<pre>" . print_r ($data, true) . "</pre>"; //menampilkan data asli

echo "Kuadrat : ";
echo "<pre>" . print_r ($transformer->mapSquare($data), true) . "</pre>";//menampilakn  kuadrat disetiap angka yang muncul

echo "Genap : ";
echo "<pre>" . print_r ($transformer->filterEven($data), true) . "</pre>";//menampilka angka genap saja

echo "Total :";
echo $transformer->sum($transformer);//menjumlahkan semua angka

echo "=== JSON Mapper ===". PHP_EOL . "<br>";

$user = file_get_contents('config.json');

$usermapper = new JsonMapper($user); 

echo "semua key:\n";
print_r($usermapper->getKeys());

echo "\nJSON Flatten:\n";
print_r($usermapper->flatten());

echo "=== Data Storage ===". PHP_EOL . "<br>";

$storage = new Storage("user.txt"); //membuat storage dengan file txt
//membuat user
$user1 = new User ("Siti Wahyuni", "siwa2323@gmail.com");
$user2 = new User ("Sinta Febriyanti", "sinta1212@gmail.com");
$user3 = new User ("Dwi Resty Kartika", "resty3434@gmail.com");

$user1-> saveToStorage($storage);//menyimpan user ke storage
$user2-> saveToStorage($storage);
$user3-> saveToStorage($storage);

echo "Isi dari file user/.txt:\n";
print_r($storage->readAll());

echo "=== Book Reposytory ===". PHP_EOL . "<br>";

//koneksi dengan mySQLi
$connsql = new mysqli("localhost","root","","testdb");

//mengecek koneksi
if ($connsql->connect_error) {
    die("koneksi gagal:" . $connsql->connect_error);
}

//inisialisasi repository
$repository = new BookRepository($connesql);

//menambahkan buku baru
$repository->createBook("Bumi","Tere Liye",2014);
$repository->createBook("Laut Bercerita", "Leila S.Chudori", 2017);

//mencari buku berdasarkan author
$books = $repository->findBookByAuthor("Tere Liye");
print_r($books);

//menghapus buku dengan id 1
$repository->deleteBook(1);

$connesql->close();



