<?php
//Nos conectamos a la BD
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' );

//Preparo las variables que envio el usuario

$id = $_GET['id'];

//cargo el objeto alarma
$alarma = R::load('alarma',$id);
$active = $alarma->active;
if ($active == 0) $active = 1;
else $active = 0;
$alarma->active = $active;

R::store($alarma);
header("location:index.php");
exit;
