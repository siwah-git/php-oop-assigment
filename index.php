<?php
// ===== Load Classes =====

// CsvReader
require_once __DIR__ . '/classes/advanced/CsvReader.php';

// PrimeGenerator
require_once __DIR__ . '/classes/basics/PrimeGenerator.php';

// Logger System
require_once __DIR__ . '/classes/oop/FileLogger.php';
require_once __DIR__ . '/classes/oop/ConsoleLogger.php';
require_once __DIR__ . '/classes/oop/App.php';


// ===== PrimeGenerator Example =====
echo "<h2>Prime Generator Example</h2>";

$primeGen = new PrimeGenerator();
$primes = $primeGen->generatePrimes(20); // primes up to 20
print_r($primeGen->generatePrimes());

echo "<pre>";
print_r($primes);
echo "</pre>";

// ===== CsvReader Example =====
echo "<h2>CSV Reader Example</h2>";

$csv = new CsvReader(__DIR__ . "/data/students.csv");

echo "<pre>";
print_r($csv->getHeader()); // print header
print_r($csv->getRows());   // print rows as associative array
echo "</pre>";

// ===== Logger System Example =====
echo "<h2>Logger System Example</h2>";

// ConsoleLogger
echo "<h3>Console Logger</h3>";
$appConsole = new App(new ConsoleLogger());
$appConsole->run();

// FileLogger
echo "<h3>File Logger</h3>";
$logFile = __DIR__ . '/data/logs.txt';
$appFile = new App(new FileLogger($logFile));
$appFile->run();

echo "<p>Check <code>data/logs.txt</code> for file logs.</p>";