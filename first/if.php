<?php

$x = 10;
if ($x > 5) {
  echo "x is greater than 5";
}
echo "\n";

$score = 85;
if ($score >= 90) {
  echo "A";
} elseif ($score >= 80) {
  echo "B";
} elseif ($score >= 70) {
  echo "C";
} elseif ($score >= 60) {
  echo "D";
} else {
  echo "F";
}
echo "\n";

$num = 15;
if ($num > 0) {
  if ($num % 2 == 0) {
    echo "Positive Even number";
  } else {
    echo "Positive Odd number";
  }
} else {
  echo "Negative number";
}
echo "\n";

$username = "admin";
$password = "password";

if ($username === "admin" && $password === "password") {
  echo "Login Success";
} else {
  echo "Login Failed";
}
