<?php

$person = "John";
$client = &$person; // create reference

var_dump($person, $client);

$client = "Jane";
var_dump($person, $client); // now both are Jane

$person= "Joe";
var_dump($person, $client); // now both are Joe

# for functions

function double(int $number): int {
  return $number * 2;
}

$number = 5;
var_dump(double($number)); // return 10
var_dump($number); // return 5

function doubleByReference(int &$number): int {
  return $number *= 2;
}

var_dump(doubleByReference($number)); // return 10
var_dump($number); // return 10

# funny race

$largeArray = range(1, 1_000_000);

# first copy
$startTime = microtime(true);
$startMemory = memory_get_usage();

$out = [];

foreach ($largeArray as $value) {
  $out[] = double($value);
} 

$endTime = microtime(true);
$endMemory = memory_get_usage();

echo "Time: " . ($endTime - $startTime) . "s\n";
echo "Memory: " . (($endMemory - $startMemory) / 1024 / 1024) . "MBs\n";

# second for Reference
$startRefTime = microtime(true);
$startRefMemory = memory_get_usage();

foreach ($largeArray as &$value) {
  $value = double($value);
} 

$endRefTime = microtime(true);
$endRefMemory = memory_get_usage();

echo "Ref Time: " . ($endRefTime - $startRefTime) . "s\n";
echo "Ref Memory: " . (($endRefMemory - $startRefMemory) / 1024 / 1024) . "MBs\n";
