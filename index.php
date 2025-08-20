<?php
require_once __DIR__ . "/classes/advanced/CsvReader.php";
require_once __DIR__ . "/classes/basics/PrimeGenerator.php";

//create CsvReader object
echo "== CSV Reader Example ===<br>";
$csv = new CsvReader(__DIR__ . "/data/students.csv");

echo "<pre>";
print_r($csv->getHeader());
print_r($csv->getRows());
echo "</pre>";

echo "<br>=== Prime Generator Examplle ===<br>";
$primeGen = new PrimeGenerator();
$primes = $primeGen->generatePrimes(30);

echo "<pre>";
print_r($primes);
echo "</pre";