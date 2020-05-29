<?php
// Clases Finales
final class SoyUnaClaseFinal {
    final public function soyUnMetodoFinal() {
        echo "Jajajaja, nadie me puede redefinir y dominaré el mundo";
    }
}

$final = new SoyUnaClaseFinal();
$final->soyUnMetodoFinal();
