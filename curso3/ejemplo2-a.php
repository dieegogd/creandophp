<?php
$resultado = rand(-1, 1);

switch ($resultado) {
    case -1:
        $comentario = "insatisfactorio";
        break;
    case 0:
        $comentario = "neutral";
        break;
    case 1:
        $comentario = "positivo";
        break;
    default:
        $comentario = "no existe esta opción";
        break;
}
print $comentario;
