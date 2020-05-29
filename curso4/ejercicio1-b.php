<?php
include("cocheClass.php");
include("concesionariaClass.php");

// Creamos el objeto / Instanciamos la clase
$concesionaria = new Concesionaria("MyCar");
$concesionaria->comprar(new Coche("Azul", "Volkswagen", 4, 2));
$coche2 = new Coche("Gris", "Fiat", 0, 1);
$concesionaria->comprar($coche2);
$concesionaria->comprar(new Coche("Azul", "Volkswagen", 0, 3));
$concesionaria->vender($coche2);

$concesionaria->print();
