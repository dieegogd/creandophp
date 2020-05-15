<html>
<head> <title>Ejemplo 5</title></head>
<body>
 <h1> Ejemplo de PHP </h1>

<?php

 #forma explícita
 $a[0] = "abc";
 $a[1] = "def";
 $b["foo"] = 13;

 #Añadiendo valores al array
 $a[] = "hola"; // $a[2] == "hola"
 $a[] = "mundo"; // $a[3] == "mundo"

 #mostramos los resultados
 print "a= $a[0] , $a[1] , $a[2] , $a[3] <br>\n";
 print "b[foo]=".$b["foo"]."<br>\n";

?>

</body>
</html>