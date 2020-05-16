<html>
<head><title>Ejemplo 1</title></head>
<body>

<?php $edad = 18; ?>

<div>
    <?php if ($edad < 18): ?>
        <div><?="Eres menor de edad"?></div>
    <?php elseif ($edad < 70): ?>
        <div><?="Eres un adulto"?></div>
    <?php else: ?>
        <div><?="Eres un anciano"?></div>
    <?php endif; ?>
</div>

</body>
</html>
