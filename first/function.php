<?php
declare(strict_types=1); // activate strict mode

function greet(string $name):string {
  return "Hello, $name!\n";
};

echo greet("World");
// echo greet(); // trows an error


# optional arguments
function greetWithTime (string $name, string $time = "morning"):string {
  return "Good $time, $name!\n";
};

echo greetWithTime("Charlie");
echo greetWithTime("Bob", "evening");

function add(int $a, int $b): int {
  return $a + $b;
}

echo add(1, 2);
// echo add('1', 2); // trows an error
// echo add(1.43, 2); // trows an error
// echo add((int)'1', 2); // kinda works
echo "\n";

# Variadic arguments
function sum(int ...$numbers): int {
  // $sum = 0;
  // foreach ($numbers as $number) {
  //   $sum += $number;
  // }
  // return $sum;
  # Simple way
  return array_sum($numbers);
}

echo sum(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
echo "\n";
// echo sum(1); // return 1;
// echo sum(); // also works

function introduceTeam(string $teamName, string ...$members): void {
  echo "Team: $teamName\n";
  echo "Members: " . implode(', ', $members). "\n";
}

introduceTeam("Team A", "Alice", "Bob", "Charlie");
$teamBMembers = ["Harry", "Johnny", "Joe"];
introduceTeam("Team B", ...$teamBMembers, "Amo");

# Anonymous functions

$anonymousGreetMessage = "Bye";
$anonymousGreet = function (string $name) use ($anonymousGreetMessage): string { // use & before message to change original variable
  $anonymousGreetMessage .= "!";
  return "$anonymousGreetMessage, $name!\n";
};

echo $anonymousGreetMessage . "\n"; // still just "Bye"
echo $anonymousGreet("Alice");

# Union Types
function processInput(int|float|string $input): string {
  return match (true) {
    is_int($input) => "Integer",
    is_float($input) => "Float",
    is_string($input) => "String",
    default => "Unknown"
  };
}

$inputs = [1, 1.0, "hello"];
foreach ($inputs as $input) {
  echo processInput($input) . "\n";
}

# named arguments php8.0 feature
function namedGreet(string $name, string $greeting = "Hello", bool $shout = false): string {
  $message = "$greeting, $name!\n";
  return $shout ? strtoupper($message) : $message;
}

echo namedGreet(name: "Alice", shout: true);
echo namedGreet("Bob", greeting: "Hi");

# Arrow functions php7.4 feature
$arrowNumbers = [1,2,3,4,5];
$arrowMultiplier = 3;
$squaredNumbers = array_map(
  fn ($number): int => $number * $arrowMultiplier, // we can use global variables here
  $arrowNumbers
);

# Higher order functions
$users = [
  ["id" => 1, "name" => "Alice", "age" => 25, "role" => "admin"],
  ["id" => 2, "name" => "Bob", "age" => 30, "role" => "user"],
  ["id" => 3, "name" => "Charlie", "age" => 35, "role" => "user"],
];
function createFilter($key, $value) {
  return fn ($item) => $item[$key] === $value;
};
$isAdmin = createFilter("role", "admin");
$isBob = createFilter("name", "Bob");

$admins = array_filter($users, $isAdmin);
$bob = array_filter($users, $isBob);

var_dump($admins, $bob);

# recursive functions
function factorial(int $n): int {
  if ($n === 0 || $n === 1) {
    return 1;
  }
  return $n * factorial($n - 1);
}

var_dump(factorial(5)); // 120

# generators
function countDown(int $start): Generator {
  for ($i = $start; $i >= 0; $i--) {
    yield random_int(1, 100);
  }
} 

foreach (countDown(5) as $number) {
  echo $number . "\n";
}

