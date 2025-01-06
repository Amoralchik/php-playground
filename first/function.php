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
