<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>IA Meetings | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>admin_assets/plugins/iCheck/square/blue.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page" style="height: 0px;">
<div class="login-box" style="margin: 8% auto;">

  <!-- /.login-logo -->
  <div class="login-box-body">
    <center><img src="<?php echo base_url(); ?>site_assets/assets/base/img/layout/logos/ia-meetings-logo-website.png" style="width: 100%;"></center>
     <?php if(@$error_message || form_error('adminUsername') || form_error('adminPassword')) {?>
     <p class="login-box-msg" style="padding: 7px 20px 7px 20px; background-color: #bc3c3c; margin-bottom: 9px; color: #fff;"><?php echo @$error_message; ?>
              <?php echo form_error('adminUsername'); ?>
              <?php echo form_error('adminPassword'); ?>
            </p>
    <?php } ?>
    <form action="<?php echo base_url(); ?>Admin/admin_login" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('email'); ?>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password'); ?>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input type="submit" value="Sign In" name="submit" id="submit" class="btn btn-primary btn-block btn-flat">
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>admin_assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>admin_assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>admin_assets/plugins/iCheck/icheck.min.js"></script>
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
