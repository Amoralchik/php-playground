<?php

declare(strict_types=1);

function countVisitors(): void {
  static $visitorCount = 0; // static variable save its value between function calls
  $visitorCount++;
  echo "Visitor #$visitorCount has visited!\n";
}

# another static example
// function getDBConnection() {
//   static $connection = null;
//   if ($connection === null) {
//     $connection = connect();
//   }
//   return $connection;
// }

$superhero = 'Superman'; // global variable

function revealIdentity(): void {
  global $superhero; // global keyword allows to use global variable inside function
  $superhero = 'Spiderman'; // potential dangerous usage
  echo " $superhero true identity is Clark Kent\n";
}

revealIdentity(); // now $superhero is Spiderman

countVisitors(); // Visitor #1 has visited!
countVisitors(); // Visitor #2 has visited!
countVisitors(); // Visitor #3 has visited!
