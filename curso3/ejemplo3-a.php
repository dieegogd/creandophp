<?php

// ARRAY CON INDICE NUMERICO
$colores = array("rojo", "azul", "verde");
#[0 => "rojo", 1 => "azul", 2 => "verde"]

for ($i = 0; $i < count($colores); $i++) {
    print $colores[$i]."<br />\n";
}

// ARRAY ASOCIATIVO
$tiempo = array(
    "m" => "mañana",
    "t" => "tarde",
    "n" => "noche"
);
$keys = array_keys($tiempo);
#[0 => "m", 1 => "t", 2 => "n"]

for ($i = 0; $i < count($keys); $i++) {
    print $tiempo[$keys[$i]]."<br />\n";
}
