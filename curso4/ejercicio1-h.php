<?php
// OPERADORES DE RESOLUCIÓN DE ÁMBITO

# DESDE FUERA DE LA CLASE
class MyClass {
    const CONST_VALUE = 'Un valor constante';
}
$classname = 'MyClass';
echo $classname::CONST_VALUE; // A partir de PHP 5.3.0
echo MyClass::CONST_VALUE;

# DESDE DENTRO DE LA CLASE
class OtherClass extends MyClass
{
    public static $my_static = 'variable estática';
    public static function doubleColon() {
        echo parent::CONST_VALUE . "\n";
        echo self::$my_static . "\n";
    }
}
$classname = 'OtherClass';
$classname::doubleColon(); // A partir de PHP 5.3.0
OtherClass::doubleColon();
