<html><body>

<?php
// ARRAY CON INDICE NUMERICO
$colores = array("rojo", "azul", "verde");
#[0 => "rojo", 1 => "azul", 2 => "verde"]
?>

<?php foreach ($colores as $value): ?>
    <div><?=$value?></div>
<?php endforeach; ?>

<?php
// ARRAY ASOCIATIVO
$tiempo = array(
    "m" => "mañana",
    "t" => "tarde",
    "n" => "noche"
);
#["m" => "mañana", "t" => "tarde", "n" => "noche"]
?>

<?php foreach ($tiempo as $key => $value): ?>
    <div><?=$key?> => <?=$value?></div>
<?php endforeach; ?>

</body></html>
