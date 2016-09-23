<?php
//Nos conectamos a la BD
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' );

//Preparo las variables que envio el usuario

$id = $_POST['id'];
$on = $_POST['on'];
$time = $_POST['time'];
$active = $_POST['active'];

//cargo el objeto alarma
$alarma = R::load('alarma',$id);

$e =explode(":",$on);
$hora = $e[0];
$f =explode(" ",$e[1]);
$minuto = $f[0];
if($f[1]=="PM") $hora += 12;

if($hora==24) $hora=12;
else if($hora==12) $hora=0;

$hoff = $hora;
$moff = $minuto + $time;
if ($moff > 59){
    $moff -= 60;
    $hoff ++;
    if ($hoff>23) $hoff = 0;
}

$on = $hora.":".$minuto.":00";
$off = "$hoff:$moff:00";

$alarma->on = $on;
$alarma->off = $off;
$alarma->time = $time;
$alarma->active = $active;

R::store($alarma);
header("location:index.php");
exit;
