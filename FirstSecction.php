<?php

function direBonjour() {
  return "Bonjour, le monde.";
}

function addition(int $a, int $b): int {
  return $a + $b;
}

function trouverMax(int $a, int $b): int
{
  if($a < $b) {
    return $b;
  }
  if($a > $b) {
    return $a;
  }
  if($a === $b) {
    return $a;
  }
}

function estPair($value) {
  return $value % 2 == 0;
}
$result = estPair(3) ? 'Pair' : 'Impair';
echo "Result: $result \n";


function comptercaractere( string $str) {
  return strlen($str);
}


function saluer(string $nom = "Inconnue") {
  return "Bonjour, $nom.";
}
