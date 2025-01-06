<?php
$isStudent = 1;
var_dump($isStudent, true);
var_dump($isStudent === true, $isStudent == true); # all number equals to true unless it is 0 | == not strict comparison

$scores = [85, '90', 95.5];

var_dump($scores[0] + $scores[1]); # 175
var_dump($scores[0] + $scores[1] + $scores[2]); # 270.5

var_dump($scores);

$total = $scores[0] + $scores[1] + $scores[2];
echo "Total: $total\n"; # works only in double quotes
echo "Total score is" . $total . "\n";
