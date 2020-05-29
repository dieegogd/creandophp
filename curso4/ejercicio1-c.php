<?php
// Clases Abstractas
abstract class SoyUnaClaseAbstracta {
    abstract protected function soyUnMetodoAbstracto();
}

class hija extends SoyUnaClaseAbstracta {
    function soyUnMetodoAbstracto() {
        echo "metodo abstracto";
    }
}

$hija = new hija();
$hija->soyUnMetodoAbstracto();
