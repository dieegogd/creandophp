<?php
$edad = 18;

if ($edad < 18) {
    $comentario = "Eres menor de edad";
} elseif ($edad < 70) {
    $comentario = "Eres un adulto";
} else {
    $comentario = "Eres un anciano";
}
print $comentario;
