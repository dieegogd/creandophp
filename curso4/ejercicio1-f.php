<?php
// Métodos y propiedades estáticas
class nombreClase {
    public static $propiedadEstatica = "Hey, soy una propiedad estática";

    public static function metodoEstatico() {
        echo "Hey, soy un método estático";
    }

    public static function llamaEstaticas() {
        echo self::$propiedadEstatica;
        echo "<br />";

        echo self::metodoEstatico();
        echo "<br />";
    }
}

echo nombreClase::$propiedadEstatica;
echo "<br />";

nombreClase::metodoEstatico();
echo "<br />";

nombreClase::llamaEstaticas();
echo "<br />";
