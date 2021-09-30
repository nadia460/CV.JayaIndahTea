

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Email</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Akun Users</li>
            <li class="active">Edit</li>
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
                        <?php echo form_open_multipart(site_url('UsersController/processUpdate_Email/'.$record->id_users)) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDUsers" class="col-sm-2 col-form-label">ID User</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_users' readonly value="<?php echo $record->id_users; ?>" >    
                                    </div>       
                                </div>
                                                              
                                <div class="form-group row <?php echo (form_error('email')) ? ' has-error' : ''; ?>">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email Baru</label>
                                    <div class="col-sm-10">
                                    <input type="email" class="form-control" name='email' placeholder="example21@email.com">
                                    <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
                                    </div>   
                                </div>
                                <div class="form-group row <?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name='password' placeholder="inputkaan password">
                                    <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                                    </div>        
                                </div>
                                
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="<?php echo site_url('users') ?>" class="btn btn-default float-right">Batal</a>
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

