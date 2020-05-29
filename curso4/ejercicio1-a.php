<?php
include("cocheClass.php");
include("concesionariaClass.php");

// Creamos el objeto / Instanciamos la clase
$coche = new Coche("Blanco", "Volkswagen", 0, 2);
// Usamos los métodos
$coche->color = "Azul";
$coche->print();

// Le sumamos 3 y le restamos 1 al atributo
$coche->acelerar();
$coche->acelerar();
$coche->acelerar();
$coche->frenar();
$coche->print();
