<html><body>

<?php
// ARRAY CON INDICE NUMERICO
$colores = ["rojo", "azul", "verde"];
#[0 => "rojo", 1 => "azul", 2 => "verde"]
?>

<?php for ($i = 0; $i < count($colores); $i++): ?>
    <div><?=$colores[$i]?></div>
<?php endfor; ?>

<?php
// ARRAY ASOCIATIVO
$tiempo = [
    "m" => "mañana",
    "t" => "tarde",
    "n" => "noche"
];
$keys = array_keys($tiempo);
#[0 => "m", 1 => "t", 2 => "n"]
?>

<?php for ($i = 0; $i < count($keys); $i++): ?>
    <div><?=$tiempo[$keys[$i]]?></div>
<?php endfor; ?>

</body></html>
