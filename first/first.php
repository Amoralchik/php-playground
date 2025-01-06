<?php

echo "Hello World!\n"; #print to terminal
$name = 'Amo'; #variable
echo "Hello" . $name . "!\n"; #concatenation

$pizzas = 5;
$slicesPerPizza = 8;
$totalSlices = $pizzas * $slicesPerPizza;
echo "Total slices: $totalSlices\n";  # works only in double quotes

$isHungry = true;
echo "Hungry?\n";
echo $isHungry ? "Yes" : "No"; # ternary operator
echo "\n"; # always add \n after echo

# [1,2,3] = Array
# ["kay" => "value"] = Associative Array
# fn (int #tax); = Type hinting

$isStudent = 1;
var_dump($isStudent, true);
var_dump($isStudent === true, $isStudent == true); # all number equals to true unless it is 0 | == not strict comparison

$scores = [85, '90', 95.5];

var_dump($scores[0] + $scores[1]); # 175
var_dump($scores[0] + $scores[1] + $scores[2]); # 270.5

var_dump($scores);

$total = $scores[0] + $scores[1] + $scores[2];
echo "Total: $total\n";
echo "Total score is" . $total . "\n";
