<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sistem Informasi Perjalanan Dinas Kementrian Agama</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" >
        <!-- Font Awesome Icons -->
        <link href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>" rel="stylesheet">  
        <!-- Theme style -->
        <link href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>" rel="stylesheet">        
        <!-- iCheck -->
        <link href="<?php echo base_url('assets/js/plugins/iCheck/square/blue.css'); ?>" rel="stylesheet"> 

    </head>
    <!-- <style>
        
        
         html{
             background: url(<?php base_url() ?>assets/image/backlogin.jpg) no-repeat center center fixed;
	  -webkit-background-size: cover;
	 -moz-background-size: cover;
        -o-background-size: cover;
	  background-size: cover;
	font-family: 'Open Sans', sans-serif;
	font-size:13px;
	//text-shadow: 0px 1px 2px #000;
}
        
        
    </style>
   -->
    <body class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#" ><b>Aplikasi</b> - SPPD</a>
            </div><!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg"></p>
                <form action="<?php echo site_url('login/proses'); ?>" method="post">
                    <?php
                    if (validation_errors() || $this->session->flashdata('result_login')) {
                        ?>
                        <div class="alert alert-error">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <strong>Warning!</strong>
                            <?php echo validation_errors(); ?>
                            <?php echo $this->session->flashdata('result_login'); ?>
                        </div>    
                    <?php } ?>
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class="form-control" placeholder="Username"/>
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-8">    
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Remember Me
                                </label>
                            </div>                        
                        </div><!-- /.col -->
                        <div class="col-xs-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
                        </div><!-- /.col -->
                    </div>
                </form>  
                <!-- /.social-auth-links
                <div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign in using Google+</a>
                </div>

                <a href="#">Hubungi Administrator Jika Lupa Password</a><br>
                <a href="register.html" class="text-center">Register a new membership</a>
 -->
                <a  class="text-center ">V.1.0</a>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <!-- jQuery 2.1.3 -->
        <script src="<?php echo base_url('assets/js/plugins/jQuery/jQuery-2.1.3.min.js'); ?>"></script> 
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/js/plugins/iCheck/icheck.min.js'); ?>"></script>       
        <script>
            $(function () {
                $('input').iCheck({
                    checkboxClass: 'icheckbox_square-blue',
                    radioClass: 'iradio_square-blue',
                    increaseArea: '20%' // optional
                });
            });
        </script>
    </body>
</html>