<?php
setlocale(LC_ALL, 'es_MX');
date_default_timezone_set('America/Mexico_City');

$fechaHoy = strftime('%e de %b del %G %H:%M');
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' );

$regadera = R::load('salidas',1);
 ?>
<h6 class="text-muted text-uppercase m-b-20">
    <?= $fechaHoy;?>
</h6>
<?php if ($regadera->valor==0) {?>

<a href="flipSwitch.php?cambiara=1">
        <button type="button" class="btn btn-dark btn-lg">
        <i class="fa fa-power-off"></i>
    </button>
</a>
<?php } else { ?>
    <a href="flipSwitch.php?cambiara=0">
            <button type="button" class="btn btn-primary btn-lg">
            <i class="fa fa-tint"></i>
        </button>
    </a>
    <?php } ?>
