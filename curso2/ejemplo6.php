<html>
<head> <title>Ejemplo 6</title></head>
<body>
 <h1> Ejemplo de PHP </h1>

<?php
$a["foo"]  = $f;

$a[1][0]     = $f;         # bidimensional
$a["foo"][2] = $f;         # se pueden mezclar índices
$a[3]["bar"] = $f;         # numéricos y asociativos

$a["foo"][4]["bar"][0] = $f;
# tetradimensional!
# Los arreglos se declarar utilizando la instrucción array
# y se pueden rellenar también usando =>

# Ejemplo 1:
$a["color"]     = "rojo";
$a["sabor"]     = "dulce";
$a["forma"]     = "redondeada";
$a["nombre"]    = "manzana";
$a[3]           = 4;

# Ejemplo 2:
$a = array(
     "color" => "rojo",
     "sabor" => "dulce",
     "forma" => "redondeada",
     "nombre"  => "manzana",
     3       => 4
);
?>
</body>
</html>