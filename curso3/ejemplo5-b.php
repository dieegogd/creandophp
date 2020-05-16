<html><body>

<?php
// ARRAY CON INDICE NUMERICO
$colores = ["rojo", "azul", "verde"];
#[0 => "rojo", 1 => "azul", 2 => "verde"]
?>

<?php $i = 0; ?>
<?php while ($i < count($colores)): ?>
    <div><?=$colores[$i]?></div>
    <?php $i++; ?>
<?php endwhile; ?>

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

<?php $i = 0; ?>
<?php while ($i < count($keys)): ?>
    <div><?=$tiempo[$keys[$i]]?></div>
    <?php $i++; ?>
<?php endwhile; ?>

</body></html>
