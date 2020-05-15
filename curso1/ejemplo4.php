<html>
<body>
<?php
/*
$un_array = [1, "A", true];
for ($key = 0; $key < count($un_array); $key++):
    #echo $un_array[$key] . "<br />";
endfor;

$un_array = [1 => 'A', 2 => 'B', 3 => 'C', 4 => 'D'];
foreach ($un_array as $key => $value) {
    #print $un_array[$key] . "<br />";
    #print $key . ": " . $value . "<br />";
}

$un_array = ['a' => 'peligroso', 'b' => 'no peligroso'];
$key = 'a';
while ($key < count($un_array)) {
    #echo $un_array[$key] . "<br />";
    $key++;
}
*/
function calcular($parametro1, $parametro2 = null) {
    if (empty($parametro2)) {
        return "te olvidaste el parámetro 2";
    } else {
        return [
            'parametro1' => $parametro1,
            'parametro2' => $parametro2,
            'total' => $parametro1 * $parametro2
        ];
    }
}
?>

<pre>
<?php
print_r(calcular(2, 4));
?>
</pre>

<?php
var_dump(calcular(2, 4));
?>

<?php
print "<br />";
print_r(calcular(5));
print "<br />";
?>
</body>
</html>