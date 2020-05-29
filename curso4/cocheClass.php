<?php
// Definimos la clase
class Coche {
    // NOTA DE ACCESOS DE PROPIEDADES Y MÉTODOS:
    // public:    donde sea
    // private:   la clase que los definió
    // protected: la misma clase o clases heredadas

    // Atributos
    public $color;
    public $modelo;
    public $velocidad;
    public $aceleracion;

    // Constructor
    public function __construct($color, $modelo, $velocidad, $aceleracion)
    {
        $this->color       = $color;
        $this->modelo      = $modelo;
        $this->velocidad   = $velocidad;
        $this->aceleracion = $aceleracion;
    }

    // Métodos
    public function acelerar() {
        $this->velocidad += $this->aceleracion;
    }

    public function frenar() {
        $this->velocidad -= $this->aceleracion;
    }

    public function print() {
        print "<b>Coche:</b><br />";
        print "Color {$this->color}<br />";
        print "Modelo {$this->modelo}<br />";
        print "Velocidad={$this->velocidad}<br />";
        print "Aceleración={$this->aceleracion}<br /><br />";
    }
}
