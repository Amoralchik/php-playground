<?php

# While loop
$secret = "magic";
$attempt = 0;
$maxAttempts = 5;

while ($attempt < $maxAttempts) {
  echo 'Guess the secret: ';
  $guess = trim(fgets(STDIN)); # get user input and trim it
  $attempt++;

  if ($guess === $secret) {
    echo "Correct! you guessed the secret word\n";
    break;
  } elseif ($attempt >= $maxAttempts) {
    echo "You run out of attempts\n";
  } else {
    $attemptsLeft = $maxAttempts - $attempt;
    echo "Incorrect! Try again\n Attempt left: $attemptsLeft\n";
  }
}

# For loop

echo "Countdown: \n";
for ($i = 10; $i >= 0; $i--) {
  echo "$i\n";
  if (1 === $i) {
    echo "Blast off!\n";
  }
  sleep(1); 
}

for ($i = 0; $i < 10; $i++) {
  echo "Current number: $i\n";
};

# Do while loop

do {
  $diceRoll = rand(1,6);
  echo "You rolled a $diceRoll\n";
  if ($diceRoll === 6) {
    echo "You win!\n";
    break;
  }
  echo "Roll again\n";
  $rollAgain = trim(fgets(STDIN));
} while ("y" === $rollAgain);

# Foreach loop

$basket = [
  "apple" => 2,
  "banana" => 3,
];
$total = 0;

foreach ($basket as $item => $quantity) {
  $total += $quantity;
  echo "$item: $quantity\n";
}

echo "Total items: $total\n";
