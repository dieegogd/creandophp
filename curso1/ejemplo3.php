<html>
<body>
<?php
    $un_bool = true; // FALSE, true, false
    if ($un_bool == true) { // sin comparación / == / === / != / !==
        print "verdadero";
    } else {
        echo "falso";
    }

    if ($un_bool == true): // sin comparación / == / === / != / !==
        print "verdadero";
    else:
        echo "falso";
    endif;

    if ($un_bool):
        echo "mi salida nueva";
    endif;

    if ($un_bool) {
        echo "aslkdf jaslk jañsld j";
        echo "mi salida nueva";
    }
    echo "otra linea";

?>
<br />
<?php
    echo $un_string = "brazos"; # esta linea hay que mejorar
    $un_string = 'piernas'; /* string con comilla simple */
?>
<br />
<?php
    print $un_string;
    $un_integer = 12;
    $un_float = 1.234;
    $fecha = date("d/m/Y");
?>
</body>
</html>