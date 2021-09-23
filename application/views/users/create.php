

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Tambah User</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Akun Users</li>
            <li class="active">Tambah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                        <div class="box-body">
                        
                        <?php $this->load->view('templates/flash'); ?>   
                        <!-- form start -->
                        <br>
                        <?php echo form_open_multipart(site_url('UsersController/Create')) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                
                                
                                <div class="form-group row<?php echo (form_error('name')) ? ' has-error' : ''; ?>">
                                    <label for="inputNama" class="col-sm-2 col-form-label">Nama Pegawai</label>
                                    <div class="col-sm-10">
                                    <input type="name" class="form-control" name='name' placeholder="nama">
                                    <?php echo form_error('name', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('email')) ? ' has-error' : ''; ?>">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name='email' placeholder="example21@email.com">
                                    <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
                                    </div>   
                                </div>
                                <div class="form-group row <?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                    <input type="password" class="form-control" name='password' placeholder="buat password">
                                    <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                                    </div>        
                                </div>
                                <div class="form-group row <?php echo (form_error('retypepassword')) ? ' has-error' : ''; ?>">
                                    <label for="inputretypepassword" class="col-sm-2 col-form-label">Ulangi Password</label>
                                    <div class="col-sm-9">
                                    <input type="password" class="form-control" name='retypepassword' placeholder="ulangi password diatas">
                                    <?php echo form_error('nominal_pemasukan', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('retypepassword')) ? ' has-error' : ''; ?>">
                                    <label for="inputretypepassword" class="col-sm-2 col-form-label">Hak Akses</label>
                                    <div class="col-sm-9">
                                    <input type="radio" class="form-control-radio" name='retypepassword' > Admin &nbsp;
                                    <input type="radio" class="form-control-radio" name='retypepassword'>  Direktur
                                    <?php echo form_error('nominal_pemasukan', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="<?php echo site_url('UsersController') ?>" class="btn btn-default float-right">Batal</a>
                            </div>
                            <!-- /.card-footer -->
                            <?php echo form_close() ?>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
</body>

