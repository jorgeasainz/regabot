<?php
//Nos conectamos a la BD
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' );

$reloj = date("H:i");
$regadera = R::load('salidas',1);

//vamos a validar encendido
$encendido = R::findOne('alarma'," `on` = '$reloj:00' AND active = 1");
$apagado = R::findOne('alarma'," `off` = '$reloj:00' AND active = 1");

if($apagado)
{
    echo "$reloj - apagando\n";
    $regadera->valor = 0;
    R::store($regadera);
}
else if($encendido)
{
    echo "$reloj - encendiendo\n";
    $regadera->valor = 1;
    R::store($regadera);
}

exit;
