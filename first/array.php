<?php

$simpleArray = [1,2,3,4,5];
$associativeArray = [
  'name' => 'John',
  'age' => 30,
  'city' => 'New York'
];

echo $simpleArray[0]."\n"; // 1
echo $associativeArray['name']."\n"; // John

$simpleArray[] = 6;
$associativeArray['country'] = 'USA';

$matrix = [
  [1,2,3],
  [4,5,6]
];

echo $matrix[1][1]."\n"; // 5

$fruits = ['apple', 'banana', 'orange'];
var_dump(count($fruits));

sort($fruits);
var_dump($fruits);

rsort($fruits);
var_dump($fruits);

var_dump($associativeArray);

asort($associativeArray); // by value
var_dump($associativeArray);

ksort($associativeArray); // by key
var_dump($associativeArray);

$numbers = range(1,5); // create array with value from 1 to 5
var_dump($numbers);

$squared = array_map(function($n) {
  return $n ** 2;
}, $numbers);
var_dump($squared);

$evenNumbers = array_filter($numbers, function($n) {
  return $n % 2 == 0;
});
var_dump($evenNumbers);

$sum = array_reduce($numbers, function($carry, $n) {
  return $carry + $n;
}, 0);
var_dump($sum);

$moreNumbers = [0, ...$numbers, 6];
var_dump($moreNumbers);

[$first, $second] = $fruits;
var_dump($first, $second);

$set1 = [1,2,3,4,5];
$set2 = [3,4,5,6,7];

var_dump(
  array_intersect($set1, $set2),
  array_intersect($set2, $set1),
  array_diff($set1, $set2),
  array_diff($set2, $set1),
);

$keys = array_keys($associativeArray);
$values = array_values($associativeArray);

var_dump($keys, $values);

var_dump(array_key_exists('name', $associativeArray), in_array("John", $associativeArray));

$fruitString = implode(', ', $fruits);
$backToArray = explode(', ', $fruitString);

var_dump($fruitString, $backToArray);

$set3 = array_merge($set1, $set2);

var_dump(
  $set3,
  array_unique($set3),
  array_slice($set1, 1, 3),
  $associativeArray,
  array_merge($associativeArray, ['country' => 'DE']),
  $set1 + $set2, // not be modified
  $associativeArray + ['county' => 'DE'], // modified
  [...$set1, ...$set2],
  [...$associativeArray, ...['county' => 'DE']],
  array_search('banana', $fruits),
);
