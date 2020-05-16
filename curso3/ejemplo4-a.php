<?php

// ARRAY CON INDICE NUMERICO
$colores = array("rojo", "azul", "verde");
#[0 => "rojo", 1 => "azul", 2 => "verde"]

foreach ($colores as $value) {
    print $value."<br />\n";
}

// ARRAY ASOCIATIVO
$tiempo = array(
    "m" => "mañana",
    "t" => "tarde",
    "n" => "noche"
);
#["m" => "mañana", "t" => "tarde", "n" => "noche"]

foreach ($tiempo as $key => $value) {
    print $key." => ".$value."<br />\n";
}
