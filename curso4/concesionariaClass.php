<?php
// Definimos la clase
class Concesionaria {

    // Atributos
    public $nombre;
    public $coches;

    // Métodos
    public function __construct($nombre) {
        $this->nombre = $nombre;
        $this->coches = [];
    }

    public function comprar(Coche $coche) {
        $this->coches[] = $coche;
    }

    public function vender(Coche $coche) {
        for ($i = 0; $i < count($this->coches); $i++) {
            if ($coche === $this->coches[$i]) {
                unset($this->coches[$i]);
                continue;
            }
        }
    }

    public function print() {
        print "<b>Concesionaria: {$this->nombre}</b><br /><br />";
        foreach ($this->coches as $coche) {
            $coche->print();
        }
    }
}
