<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <title>PACE | Sistema de Registro y Administración de Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Sismtema de registro de administacion de cursos" name="description" />
    <meta content="Aro Soluciones | Om@ru" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon-pace.ico">

    <!-- App css -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body class="account-body accountbg">
    <!-- Log In page -->
    <div class="row vh-100 ">
        <div class="col-12 align-self-center">
            <div class="auth-page">
                <div class="card auth-card shadow-lg">
                    <div class="card-body">
                        <div class="px-3">
                            <div class="auth-logo-box">
                                
                                <a href="http://www.pacemd.org/" target="_blank" class="logo logo-admin"><img src="<?php echo base_url(); ?>assets/images/logo.png" height="60" alt="logo" class="auth-logo"></a>
                            </div>
                            <!--end auth-logo-box-->
                            <form class="form-horizontal auth-form my-4" method="POST" action="<?php echo base_url() ?>index.php/login">
                                <div class="form-group">
                                    <label for="username">Usuario</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-user"></i>
                                        </span>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Introduzca su usuario" autocomplete="off">
                                        <?php echo form_error('usuario'); ?>
                                    </div>
                                </div>
                                <!--end form-group-->
                                <div class="form-group">
                                    <label for="password">Contraseña</label>
                                    <div class="input-group mb-3">
                                        <span class="auth-form-icon">
                                            <i class="dripicons-lock"></i>
                                        </span>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Introduzca su contraseña">
                                        <?php echo form_error('contrasena'); ?>
                                    </div>
                                </div>
                                <!--end form-group-->
                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-gradient-primary btn-round btn-block waves-effect waves-light" type="submit">Iniciar Sesión <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end form-group-->
                            </form>
                            <center> <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=dx8iH6ZDzYgozvDJeQOgAriPzVWbY2t6II8I15TTa1sLaJ01Iw6phUJTSwHd"></script></span></center>
                            <?php if (isset($error)) {
                                echo $error;
                            }; ?>
                            <!--end form-->
                        </div>
                        <!--end /div-->
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end auth-page-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
    <!-- End Log In page -->


    <!-- jQuery  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waves.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url(); ?>assets/js/app.js"></script>
    <script>
        $(document).ready(function() {
            document.getElementById("username").onclick = function() {
                document.getElementById("alert_login").style.display = 'none';
            };
            document.getElementById("password").onclick = function() {
                document.getElementById("alert_login").style.display = 'none';
            };
        });
    </script>
</body>

</html>