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

# some way to write string
$singleQuote = 'Single quote cannot use $isStudent' . "\n";
$doubleQuote = "Double quote can use $isStudent\n";

$heredoc = <<<EOT
Heredoc can use $isStudent
EOT;

$nowdoc = <<<'EOT'
Nowdoc cannot use $isStudent
EOT;

echo $singleQuote;
echo $doubleQuote;
echo $heredoc;
echo $nowdoc;

# string manipulation
$str = "Hello World!";
echo $str[0]; # H
echo $str[-1] . "\n"; # !
// H!

echo substr($str, 0, 5); # Hello
echo substr($str, 6); # World!
// Hello World!

echo strtoupper($str) . "\n"; # HELLO WORLD!
echo ucfirst(strtolower($str)); # Hello world!

$greeting = "Hello";
$greeting .= " World!";
echo $greeting . "\n"; # Hello World!

$haystack = "The quick brown fox";
$pos = strpos($haystack, "quick"); # 4

var_dump($pos, str_replace("quick", "slow", $haystack)); # 4, The slow brown fox

printf("%s eat %d pizzas", $name, $pizzas); # Amo eat 5 pizzas

$csv = 'apple,banana,cherry';
$fruits = explode(',', $csv);
var_dump($fruits); # ["apple", "banana", "cherry"]
var_dump(implode(' ', $fruits)); # apple banana cherry

$padded = str_pad("Hello", 10, "-", STR_PAD_BOTH);
echo $padded . "\n"; # --Hello---
var_dump(trim($padded, "-")); # Hello
var_dump(trim("      Hello    ")); # Hello

$mb_str = "こんにちは";
var_dump(mb_strlen($mb_str)); # 5

$url = "http://example.com?name=Amo&age=25";
var_dump(urlencode($url)); # http%3A%2F%2Fexample.com%3Fname%3DAmo%26age%3D25
var_dump(urldecode(urlencode($url))); # http://example.com?name=Amo&age=25

$html = "<h1>Hello</h1>";
var_dump(htmlentities($html)); # &lt;h1&gt;Hello&lt;/h1&gt;

var_dump(base64_encode($name)); # QW1v
var_dump(base64_decode("QW1v")); # Amo
