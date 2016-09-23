<?php
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' ); //for both mysql or mariaDB
$valor = $_GET['cambiara'];

$regadera = R::load('salidas',1);
$regadera->valor = $valor;
R::store($regadera);
header("location: index.php");
