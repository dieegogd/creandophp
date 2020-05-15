<html>
<head> <title>Ejemplo 3 </title></head>
<body>
 <h1> Ejemplo de PHP </h1>

<?php
 /* Asignando una hilera de texto. */
 $str = "Esto es una hilera de texto";

 /* Añadiendo a la hilera de texto. */
 $str = $str . " con algo más de texto";

 /* Otra forma de añadir, incluye un carácter de nueva línea  */
 $str .= " Y un carácter de nueva línea al final.\n";
 print "$str <br>\n";

 /* Esta hilera de texto terminará siendo '<p>Número: 9</p>' */
 $num = 9;
 $str = "<p>Número: $num</p>";
 print "$str <br>\n";

 /* Esta será '<p>Número: $num</p>' */
 $num = 9;
 $str = '<p>Número: $num</p>';
 print "$str <br>\n";

 /* Obtener el primer carácter de una hilera de texto  como una vector*/
 $str = 'Esto es una prueba.';
 $first = $str[0];
 print "$str 0->$first <br>\n";

 /* Obtener el último carácter de una hilera de texto. */
 $str = 'Esto es aún una prueba.';
 $last = $str[strlen($str)-1];
 print "$str last->$last <br>\n";
 ?>

</body>
</html>