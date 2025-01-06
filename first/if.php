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

# switch case

$size = "M";

switch ($size) {
  case "S":
  case "M":
    echo "Size is Small or Medium\n";
    break;
  case "L":
  case "XL":
    echo "Size is Large or Extra Large\n";
    break;
  default:
    echo "Unknown Size\n";
}

# match expression

$status = 404;

$message = match ($status) {
  200,300 => "OK",
  400, 404,500 => "Error",
  default => "Unknown Status",
};

echo $message . "\n";
