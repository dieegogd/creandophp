<?php

// ARRAY CON INDICE NUMERICO
$colores = array("rojo", "azul", "verde");
#[0 => "rojo", 1 => "azul", 2 => "verde"]

$i = 0;
while ($i < count($colores)) {
    print $colores[$i]."<br />\n";
    $i++;
}

// ARRAY ASOCIATIVO
$tiempo = array(
    "m" => "mañana",
    "t" => "tarde",
    "n" => "noche"
);
$keys = array_keys($tiempo);
#[0 => "m", 1 => "t", 2 => "n"]

$i = 0;
while ($i < count($keys)) {
    print $tiempo[$keys[$i]]."<br />\n";
    $i++;
}
