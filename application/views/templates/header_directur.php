<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CV. Jaya Indah Tea | Direktur</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/admin/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/css/skins/skin-black.min.css') ?>">
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/libs/bootstrap/js/bootstrap.min.js') ?>"></script>
    <!-- JQuery Library Online -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
    <!-- JQuery Library Offline -->
    <script src="<?php echo base_url('assets/libs/jquery/js/jquery-3.4.1.min.js');?>"></script>
    <script src="<?php echo base_url('assets/libs/jquery/js/jquery.dataTables.min.js');?>"></script>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url() ?>assets/libs/jquery/css/jquery.dataTables.min.css">


</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="#" class="logo" >
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">JIT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>CV. Jaya Indah Tea</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top " >
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- User Account: style can be found in dropdown.less -->
                    <?php if($this->session->logged_in) :?>
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo base_url() ?>assets/images/icons/icon-user.png" class="header-icon1" alt="ICON">    
                            <?php echo $this->session->user->nama_pegawai ;?>
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header" >
                                <p>
                                    <?php echo $this->session->user->nama_pegawai ?>
                                    <small>Member since <?php echo $this->session->user->created_at ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">         
                              <a href="<?php echo site_url('userscontroller/logout');?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <?php endif; ?>
                    <!-- Control Sidebar Toggle Button -->
                   
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image text-center">
          <img src="<?php echo base_url() ?>assets/images/icons/icon-user.png" class="img-circle elevation-2" alt="User Image">
          <br><a class="d-block">Direktur</a>
        </div>
        <hr style ="border-top: 1px solid grey;">

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="<?php echo ($this->uri->segment(1) == "DashboardController")? " active": ""; ?>">
                    <a href="<?php echo site_url('DashboardController'); ?>">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == "ProdukController")? " active": ""; ?>">
                    <a href="<?php echo site_url('ProdukController'); ?>">
                        <i class="fa fa-cube"></i> <span>Produk</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == " ")? " active": ""; ?>">
                    <a href="<?php echo site_url(' '); ?>">
                        <i class="fa fa-group"></i> <span>Pegawai</span>
                    </a>
                </li>
                <li class="<?php echo ($this->uri->segment(1) == "UsersController")? " active": ""; ?>">
                    <a href="<?php echo site_url('UsersController'); ?>">
                        <i class="fa fa-user"></i> <span>Akun Users</span>
                    </a>
                </li>
                

                <li class="<?php echo ($this->uri->segment(1) == "LaporanController")? " active": ""; ?>">
                    <a href="<?php echo site_url('LaporanController'); ?>">
                        <i class="fa fa-book"></i> <span>Laporan</span>
                    </a>
                </li>
                
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

