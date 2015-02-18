<?php

$links = [2,3,4,5,5,6,7,7,8,8,9,0];
$stringhe = ["a", "b", "f"];
$mixed = array(1, "ciao", 9.4, [2, 4, "stella"]);
$links[2];
$mixed[3][0];

$vuoto = [];

$a = 1;
$b = 4;
$a = $b;

$links = $stringhe;
$stringhe[] = "prova";
$a = $links;
print_r($a);
print_r($links);
print_r($stringhe);

$mixed[] = 10;
$mixed[] = $stringhe;

$mixed = array_merge($mixed, $stringhe);
print_r($mixed);

$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 3));
print_r(array_chunk($input_array, 2, true));

$uno = [0,1,2,3,4,5];
$due = ["a","b","c","d","e","f"];
$c = array_combine($uno, $due);
print_r($c);
print_r(array_reverse($c));

$input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
$rand_keys = array_rand($input, 2);
echo $input[$rand_keys[0]] . "\n";
echo $input[$rand_keys[1]] . "\n";

$numbers = range(1, 20);
shuffle($numbers);
foreach ($numbers as $number) {
    echo "$number ";
}







/*
 * fare prove con array
 * vedere hash + metodi php
 * 
 * interfacce
 * includere classi php da altri file
 * 
 * metodi magici (?)
 * 
 */