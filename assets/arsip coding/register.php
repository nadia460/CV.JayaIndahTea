<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi</title>
    
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin/AdminLTE.min.css') ?>">
    
</head>
<body class="hold-transition register-page" >

<div class="register-box mx-auto">
  
  <!-- /.login-logo -->
  <div class="register-box-body">
    
    <div class="text-center">
      <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="200"> 
    </div>
    <br>
    
      <form action="<?php echo site_url('UsersController/ProsesRegister'); ?>" method="post" enctype="multipart/form-data">

      <?php $this->load->view('templates/flash'); ?>

      <div class="form-group has-feedback<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
        <input type="text" name="name" class="form-control" placeholder="Nama" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
      </div>

      <div class="form-group has-feedback<?php echo (form_error('email')) ? ' has-error' : ''; ?>">
        <input type="text" name="email" class="form-control" placeholder="Email" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
      </div>

      <div class="form-group has-feedback<?php echo (form_error('password')) ? ' has-error' : ''; ?>">
        <input type="password" name="password" class="form-control" placeholder="Password"> 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
      </div>

      <div class="form-group has-feedback<?php echo (form_error('retypepassword')) ? ' has-error' : ''; ?>">
        <input type="password" name="retypepassword" class="form-control" placeholder="Ulangi Password"> 
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <?php echo form_error('retypepassword', '<span class="help-block">', '</span>') ?>
      </div>
      
				<br>
				<input type="submit" class="btn btn-primary btn-block btn-flat" value="Registrasi">
      </form>
      <br>
      <div class="card-footer text-center">Sudah Memiliki Akun?
		<br><a href="<?php echo site_url('UsersController/Login') ?>">Login</a>
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
