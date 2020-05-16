<?php

// ARRAY CON INDICE NUMERICO
$colores = array("rojo", "azul", "verde");
#[0 => "rojo", 1 => "azul", 2 => "verde"]

$i = 0;
do {
    print $colores[$i]."<br />\n";
    $i++;
} while ($i < count($colores));

// ARRAY ASOCIATIVO
$tiempo = array(
    "m" => "mañana",
    "t" => "tarde",
    "n" => "noche"
);
$keys = array_keys($tiempo);
#[0 => "m", 1 => "t", 2 => "n"]

$i = 0;
do {
    print $tiempo[$keys[$i]]."<br />\n";
    $i++;
} while ($i < count($keys));
