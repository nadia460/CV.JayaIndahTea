

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Tambah Akun User</B> 
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
                        <?php echo form_open_multipart(site_url('UsersController/processCreate')) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDUsers" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_users' readonly value="<?php echo $new_id; ?>" >    
                                    </div>       
                                </div>
                                
                                <div id="inputKategoriPengeluaran" class="form-group row <?php echo (form_error('identitas_pegawai')) ? ' has-error' : ''; ?>">
                                    <label for="inputKategoriPengeluaran" class="col-sm-2 col-form-label">Identitas Pegawai</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='identitas_pegawai'>                                
                                    <option value ="">Pilih Identitas Pegawai</option>
                                        <?php foreach ($pegawai as $record) : ?>   
                                            <option value="<?php echo $record->id_pegawai;?>"><?php echo $record->id_pegawai;?> / <?php echo $record->nama_pegawai;?></option>  
                                        <?php endforeach; ?>         
                                    </select>
                                    <?php echo form_error('identitas_pegawai', '<span class="help-block">', '</span>') ?>
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
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name='password' placeholder="buat password">
                                    <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                                    </div>        
                                </div>
                                <div class="form-group row <?php echo (form_error('retypepassword')) ? ' has-error' : ''; ?>">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Ulangi Password</label>
                                    <div class="col-sm-10">
                                    <input type="password" class="form-control" name='retypepassword' placeholder="ketik ulang password">
                                    </div>        
                                </div>
                                <div class="form-group row <?php echo (form_error('foto_profil')) ? ' has-error' : ''; ?>">
                                    <label for="inputfoto_profil" class="col-sm-2 col-form-label">Foto Profil</label>
                                    <div class="col-sm-10">
                                    <input type="file" name="foto_profil" class="form-control" id="foto_produk"/> 
                                    Format file jpg, jpeg dan png
                                    <?php echo form_error('foto_profil', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('qr_code')) ? ' has-error' : ''; ?>">
                                    <label for="qr_code" class="col-sm-2 col-form-label">QR Code</label>
                                    <div class="col-sm-10">
                                    <input type="file" name="qr_code" class="form-control" id="foto_produk"/> 
                                    Format file jpg, jpeg dan png
                                    <?php echo form_error('qr_code', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('hak_akses')) ? ' has-error' : ''; ?>">
                                    <label for="inputretypepassword" class="col-sm-2 col-form-label">Hak Akses</label>
                                    <div class="col-sm-9">
                                    <input type="radio" class="form-control-radio" name='hak_akses' value="Admin" > Admin &nbsp;
                                    <input type="radio" class="form-control-radio" name='hak_akses' value="Direktur">  Direktur
                                    <?php echo form_error('hak_akses', '<span class="help-block">', '</span>') ?>
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

