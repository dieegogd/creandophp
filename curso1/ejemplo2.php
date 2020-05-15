<html>
<body>
<?php
    echo "Estamos en cuarentena obligatoria<br />\n";
    print "esta es una segunda línea<br />\n";
    echo "todo en uno";
?><br />

<?php
    echo <<<CONSULTASQL
    select *
    from usuarios
    limit 10
CONSULTASQL;
?>

<?="esto es un string abreviado<br />";?>

</body>
</html>