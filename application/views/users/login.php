<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin/AdminLTE.min.css') ?>">

</head>
<body class="hold-transition login-page" >

<div class="login-box mx-auto">
  
  <!-- /.login-logo -->
  <div class="login-box-body">
  
    <div class="text-center">
      <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="200"> 
    </div>
    <br>

      <form action="<?php echo site_url('loginController/prosesLogin'); ?>" method="post">
      
      <?php $this->load->view('templates/flash'); ?>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

				<br>
				<input type="submit" class="btn btn-primary btn-block btn-flat" value="Login">
      </form>

      <br>
      
	</div>
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


</script>
<script src="<?php echo base_url('assets/admin/js/adminlte.min.js') ?>"></script>
</body>
</html>
