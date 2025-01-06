<?php
declare(strict_types=1);

$abc = null;
$db = $abc ?? "default";

var_dump(
  null == null, // true
  null == false, // true
  null == 0, // true
  null == "", // true
  null == [], // true
  $abc, // NULL
  isset($abc), // false
  is_null($abc), // true
  $db, // default
  empty([]), // true
  array_filter([1, null, '', [], 3]) // [1, 3]
);

function greet(?string $name): string {
  return "Hello, " . ($name ?? "Guest") . "!\n";
}

echo greet(null); // Hello, Guest!
echo greet("John"); // Hello, John!
