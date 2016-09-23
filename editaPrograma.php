<?php
setlocale(LC_ALL, 'es_MX');
date_default_timezone_set('America/Mexico_City');

require 'rb.php';
R::setup( 'mysql:host=localhost;dbname=regabot',
       'root', '12345' );

$alarma = R::load('alarma',$_GET['id']);

function pintarReloj($hora){

    $elementos = explode(":",$hora);

    if ($elementos[0]<12){
        $reloj=$elementos[0].":".$elementos[1]." AM";
    }
    else{
        $elementos[0] -= 12;
        if ($elementos[0] == 0) $elementos[0] = 12;

        $reloj=$elementos[0].":".$elementos[1]." PM";
    }

    return $reloj;

}

 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Coderthemes">

        <!-- App Favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App title -->
        <title>RegaBot</title>

        <!-- Plugins css -->
        <link href="assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
		<link href="assets/plugins/clockpicker/bootstrap-clockpicker.min.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

        <!-- Switchery css -->
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

        <!-- App CSS -->
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />


        <script src="assets/js/modernizr.min.js"></script>


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
                            <div class="col-xs-12">
                                <div class="card-box">
                                    <form action="guardaPrograma.php" method="POST">
                                    <div class="row">
                                        <div class="col-xs-12">
                                        <h4 class="header-title m-t-0">Editar Programa <?= $alarma->id;?></h4>
                                    </div>
                                        <div class="col-sm-6 col-xs-12 col-md-6">
                                            <div class="p-20">
                                                <div class="form-group">
                                                    <label>Hora</label>
                                                    <div class="input-group">
                                                        <input id="timepicker" name = "on" value = "<?= pintarReloj($alarma->on);?>" type="text" class="form-control">
                                                        <span class="input-group-addon"><i class="zmdi zmdi-time"></i></span>
                                                    </div><!-- input-group -->
                                                </div>

											</div>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 col-md-6">
                                            <div class="p-20">
                                                <div class="form-group">
                                                    <label>Duración</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name = "time" id="exampleSelect1">
                                                            <option value = "5"<?php if ($alarma->time == 5) echo " SELECTED";?>>5 minutos</option>
                                                            <option value = "10"<?php if ($alarma->time == 10) echo " SELECTED";?>>10 minutos</option>
                                                            <option value = "20"<?php if ($alarma->time == 20) echo " SELECTED";?>>20 minutos</option>
                                                            <option value = "40"<?php if ($alarma->time == 40) echo " SELECTED";?>>40 minutos</option>
                                                            <option value = "60"<?php if ($alarma->time == 60) echo " SELECTED";?>>60 minutos</option>
                                                        </select>
                                                    </div><!-- input-group -->
                                                </div>

                                            </div>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 col-md-6">
                                            <div class="p-20">
                                                <div class="form-group">
                                                    <label>Activo</label>
                                                    <div class="input-group">
                                                        <select class="form-control" name = "active" id="exampleSelect1">
                                                            <option value = "1"<?php if ($alarma->active == 1) echo " SELECTED";?>>Sí</option>
                                                            <option value = "0"<?php if ($alarma->active == 0) echo " SELECTED";?>>No</option>
                                                        </select>
                                                    </div><!-- input-group -->
                                                </div>

                                            </div>

                                        </div>
                                        <input type="hidden" name="id" value="<?= $alarma->id;?>">

                                    </div>
                                    <div class="col-xs-12">
                                    <a class="button btn btn-warning btn-rounded waves-effect waves-light" href="index.php">Cancelar</a>
                                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">Guardar</button>
                                </div>
                                </form>
                                    <!-- end row -->
                        		</div>
                            </div><!-- end col-->

                        </div>
                        <!-- end row -->


                    </div> <!-- container -->

                </div> <!-- content -->

            </div>
            <!-- End content-page -->


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



            <footer class="footer text-right">
                2016 © Cebra Technologies.
            </footer>


        </div>
        <!-- END wrapper -->


        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
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

        <script src="assets/plugins/moment/moment.js"></script>
     	<script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
     	<script src="assets/plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
     	<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
     	<script src="assets/plugins/clockpicker/bootstrap-clockpicker.js"></script>
     	<script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script src="assets/pages/jquery.form-pickers.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
