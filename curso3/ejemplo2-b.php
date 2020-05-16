<html><body>

<?php $resultado = rand(-1, 1); ?>

<div>
    <?php
    switch ($resultado):
        case -1:
            ?>
            <div>insatisfactorio</div>
            <?php
            break;
        case 0:
            ?>
            <div>neutral</div>
            <?php
            break;
        case 1:
            ?>
            <div>positivo</div>
            <?php
            break;
        default:
            ?>
            <div>no existe esta opción</div>
            <?php
            break;
    endswitch;
    ?>
</div>

</body></html>
