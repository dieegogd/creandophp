<?php
// Ejemplo de continue
$i = 1;
while ($i < 20) {
    if (($i % 2) == 0) {
        $i++;
        continue;
    } else {
        echo $i.'<br>';
        $i++;
    }
}
