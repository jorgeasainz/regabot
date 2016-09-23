<?php
setlocale(LC_ALL, 'es_MX');
date_default_timezone_set('America/Mexico_City');

$fechaHoy = strftime('%e de %b del %G %H:%M');
require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' );

$regadera = R::load('salidas',1);

function pintarReloj($hora){

    $elementos = explode(":",$hora);

    $reloj = "<button type=\"button\" class=\"btn btn-info btn-rounded btn-xs\">
     <span class=\"btn-label\">";

    if ($elementos[0]<12){
        $reloj.="<i class=\"wi wi-day-sunny\"></i>";
    }
    else{
        $reloj.="<i class=\"wi wi-night-clear\"></i>";
    }

    $reloj .= "</span>".$elementos[0].":".$elementos[1]."</button>";
    return $reloj;

}
 ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>Regabot</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- App CSS -->
        <link href="assets/css/style.css?x=1" rel="stylesheet" type="text/css" />

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">
<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">


                        <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-drop pull-xs-right text-muted"></i>
                                    <div id="timer">
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
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                <div class="card-box tilebox-one">
                                    <i class="icon-clock pull-xs-right text-muted"></i>
                                    <h6 class="text-muted text-uppercase m-b-20">
                                        Programaciones
                                    </h6>
                                    <?php
                                        $alarmas = R::findAll("alarma");
                                     ?>
                                    <table class="table table-inverse">
                                        <thead>
                                            <tr>
                                                <th>Encendido</th>
                                                <th>Tiempo</th>
                                                <th>Activo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach($alarmas as $alarma){
                                             ?>
                                            <tr>
                                                <td>
                                                    <a href="editaPrograma.php?id=<?= $alarma->id;?>">

                                                     <?= pintarReloj($alarma->on); ?>
                                                 </a>


                                            </td>
                                                <td><?= $alarma->time; ?> mins</td>

                                            <td>
                                                <a href="flipActive.php?id=<?= $alarma->id?>">
                                                        <button type="button" class="btn btn-info btn-rounded btn-xs">
                                                            <?php if ($alarma->active == 1){?>
                                                            <span class="fa fa-play fs20 text-info-darker"></span>
                                                            <?php } else { ?>
                                                            <span class="fa fa-pause fs20 text-info-darker"></span>
                                                            <?php }  ?>
                                                    </button>
                                                </a>
                                                </td>
                                        </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>


                        </div>
                        <!-- end row -->



                        <!-- end row -->



                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->



            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <footer class="footer text-right">
                2016 © Cebra Technology.
            </footer>


        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->

        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/tether.min.js"></script><!-- Tether for Bootstrap -->
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>


        <!-- Counter Up  -->
        <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
        <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>
        var myVar;

        var myVar = setInterval(getButton, 5000);

        function getButton(){
            $("#timer").load('getButton.php');
            console.log("getting Button");

        }
        </script>

    </body>
</html>
