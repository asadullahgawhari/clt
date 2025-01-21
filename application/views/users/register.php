<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ثبت نام | کنترول پینل</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/bootstrap-theme.css">
  <!-- Bootstrap rtl -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/rtl.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition register-page">
<div class="register-box">

  <div class="register-box-body">
    <h2 class="login-box-msg" style="font-family:b nazanin;">ثبت نام یوزر جدید</h2>

    <?php echo validation_errors(); ?>
    <?php echo form_open_multipart('users/register'); ?>

      <div class="form-group has-feedback">
        <input type="text"  name="name" class="form-control" placeholder="اسم ">
        <span class="fa fa-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="last_name" class="form-control" placeholder="تخلص ">
        <span class="fa fa-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="ایمیل آدرس">
        <span class="fa fa-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="task" class="form-control" placeholder="وظیفه ">
        <span class="fa fa-suitcase form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="اسم یوزر ">
        <span class="fa fa-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="پسورد ">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password2" class="form-control" placeholder="تکرار پسورد ">
        <span class="fa fa-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input عکس type="file" name="userfile" class="form-control">
        <span class="fa fa-photo form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> من <a href="#">قوانین و شرایط</a> را قبول میکنم.
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">ثبت نام</button>
        </div>
        <!-- /.col -->
      </div>
    <?php echo form_close(); ?>

    <div class="social-auth-links text-center">
      <br>
      <a href="<?php echo base_url(); ?>users/login" class="text-center"><b>من قبلا ثبت نام کرده ام</b></a>
    </div>

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
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
