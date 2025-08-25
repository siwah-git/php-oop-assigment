<?php

declare(strict_types=1);

/**
 * The main entry point of the application.
 * This file uses an autoloader to dynamically include class files.
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
print_r($prime->generate());
echo "<br>";

echo "=== CSV Reader ===" . PHP_EOL . "<br>";
$csv = new CsvReader('data/students.csv');
print_r($csv->getHeader());
print_r($csv->getRows());
echo "<br>";

echo "=== Logger System ===" . PHP_EOL . "<br>";
$fileLogger = new FileLogger('data/logs.txt');
$appFile = new App($fileLogger);
$appFile->run('Application started.');
$consoleLogger = new ConsoleLogger();
$appConsole = new App($consoleLogger);
$appConsole->run('Application is running.');
echo "<br>";

echo "=== Order Management ===" . PHP_EOL . "<br>";
$orderRepo = new OrderRepository();
$orderRepo->createOrder("Resty", 150000);
$orderRepo->createOrder("Siwah", 200000);
$orderRepo->createOrder("Sinta", 300000);
echo "<br>";
echo "- Total Orders -" . PHP_EOL . "<br>";
echo "Total Orders: " . $orderRepo->getTotalOrders() . "<br>";
echo "- Average Total Price -" . PHP_EOL . "<br>";
echo " Average Order Value: Rp " . number_format($orderRepo->getAverageOrderValue(), 0, ',', '.');
echo "<br>";
echo "<br>";

echo "=== Basic FizzBuzz ===" . PHP_EOL . "<br>";
$fizzbuzz = new FizzBuzz(15, "foo", "bar");
print_r($fizzbuzz->run());
echo "<br>";

echo "=== Word Counter ===" . PHP_EOL . "<br>";
try {
    $counter = new WordCounter ("data/sample.txt");
    echo "Word count: " . $counter->countWords() . PHP_EOL;
    echo "<br>";
    echo "Most frequent word: " . $counter->mostFrequentWord() . PHP_EOL;
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}
echo "<br>";

echo "=== Shapes ===" . PHP_EOL . "<br>";
$shapes = [
    new Box(5),
    new Triangle(6, 7),
    new Circle (9)
];

foreach ($shapes as $shape){
    echo get_class($shape) . " area: " . $shape->getArea() . "<br>";
}

echo "=== User ===" . PHP_EOL . "<br>";
$userRepo = new UserRepository();

$userRepo->createUser ("Siti Wahyuni", "Siwah@gmail.com");
$userRepo->createUser ("Dwi Resty", "DwiResty@gmail.com");
$userRepo->createUser ("Sinta ", "Sinta@gmail.com");

echo PHP_EOL;

echo "<br>";

echo "=== Users ===" . PHP_EOL . "<br>";
$allUsers = $userRepo->getAllUsers();
echo "Total users: " . count($allUsers) . PHP_EOL;
echo "<br>";
echo "List of all users: " . PHP_EOL;
print_r($allUsers);

echo "<br>";

echo "=== User by Email ===" . PHP_EOL . "<br>";
$user1 = $userRepo->findByEmail("Siwah@gmail.com");
if ($user1) {

    echo "User with email: Siwah@gmail.com found " . $user1['nama'] . PHP_EOL;
}
echo "<br>";
echo "<br>";
// Running Array Transformer

echo "=== Array Transformer ===" . PHP_EOL . "<br>";

$data = [1,2,3,4,5];
$transformer = new ArrayTransformer($data); // constructor receives data containing numbers

echo "Original numbers: ";
echo print_r($data, true); // displays the original data

echo "Squared numbers: ";
echo print_r($transformer->mapSquare($data), true); // displays the square of each number

echo "Even numbers: ";
echo print_r($transformer->filterEven($data), true); // displays only even numbers

echo "Sum:";
echo $transformer->sum($transformer) . "<br>"; // sums all the numbers
echo PHP_EOL;

echo "<br>";

// Running JSON Mapper

echo "=== JSON Mapper ===" . PHP_EOL . "<br>";
$user = __DIR__ . DIRECTORY_SEPARATOR . 'config.json';

$user = '{
    "user.name": "Siwah",
    "user.age": 22,
    "addres": {
      "city": "Surakarta"
    }
}';


$usermapper = new JsonMapper($user);

echo "All keys:\n";
print_r($usermapper->getKeys());

echo "\nJSON Flatten:\n";
print_r($usermapper->flatten()) . "<br>";

echo "<br>";
echo "<br>";
// Running Data Storage

echo "=== Data Storage ===" . PHP_EOL . "<br>";

$storage = new Storage("user.txt"); // creates storage with a txt file
// creates users
$user1 = new User ("Siti Wahyuni", "siwa2323@gmail.com");
$user2 = new User ("Sinta Febriyanti", "sinta1212@gmail.com");
$user3 = new User ("Dwi Resty Kartika", "resty3434@gmail.com");

echo "<br>";
$user1->saveToStorage($storage); // saves user to storage


echo "Contents of user.txt file:\n";
print_r($storage->readAll());

echo "<br>";
echo "<br>";
// Running Book Repository
echo "=== Book Repository ===" . PHP_EOL . "<br>";
$bookRepo = new BookRepository();

$bookRepo->createBook ("Bumi", "Tere Liye", "2014");
$bookRepo->createBook ("Laut Bercerita", "Laila S.Chudori", "2017");

echo PHP_EOL;
echo "<br>";
echo "<br>";

// Finding books by author
echo "=== Find book by author ===" . PHP_EOL . "<br>";
$book1 = $bookRepo->findByAuthor("Tere Liye");
if ($book1) {
    echo "Book by author: Tere Liye found with title " . $book1['title'] . "<br>";
}
echo "<br>";

// Result if book is not found by author
$book2 = $bookRepo->findByAuthor("Siwah");
if ($book2 == null) {
    echo "Book by author: Siwah not found" . PHP_EOL;
}

echo "<br>";
echo "<br>";

// Deleting book by ID
echo "=== Delete book by ID ===" . PHP_EOL . "<br>";
$book1 = $bookRepo->deleteById(1);
if ($book1) {
    echo "Book with ID 1 has been deleted, title: " . $book1['title'] . "<br>";
}
echo "<br>";