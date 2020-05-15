<html>
<head> <title>Ejemplo 4</title></head>
<body>
 <h1> Ejemplo de PHP </h1>

<?php

 $foo = 1 + "10.5";              // $foo es doble (11.5)
 print "$foo <br>\n";
 $foo = 1 + "-1.3e3";            // $foo es doble (-1299)
 print "$foo <br>\n";
 $foo = 1 + "bob-1.3e3";         // $foo es entero (1)
 print "$foo <br>\n";
 $foo = 1 + "bob3";              // $foo es entero (1)
 print "$foo <br>\n";
 $foo = 1 + "10 Cerditos";     // $foo es entero (11)
 print "$foo <br>\n";
 $foo = 1 + "10 Cerditos"; // $foo es entero (11)
 print "$foo <br>\n";
 $foo = "10.0 cerdos " + 1;        // $foo es entero (11)
 print "$foo <br>\n";
 $foo = "10.0 cerdos " + 1.0;      // $foo es doble (11)
 print "$foo <br>\n";

?>

</body>
</html>