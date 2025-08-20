<?php
require_once __DIR__ . "/classes/advanced/CsvReader.php";
use Classes\Advanced\CsvReader;

//create CsvReader object
$csv = new CsvReader(__DR__ . "/data/students.csv");

echo "<pre>";
print_r($csv->getHeader());
print_r($csv->getRows());
echo "</pre>";