

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Akun User</B> 
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
                        <?php echo form_open_multipart(site_url('UsersController/processUpdate/'.$record->id_users)) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDUsers" class="col-sm-2 col-form-label">ID User</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_users' readonly value="<?php echo $record->id_users; ?>" >    
                                    </div>       
                                </div>
                                
                                <div id="inputKategoriPengeluaran" class="form-group row <?php echo (form_error('identitas_pegawai')) ? ' has-error' : ''; ?>">
                                    <label for="inputKategoriPengeluaran" class="col-sm-2 col-form-label">Identitas Pegawai</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='identitas_pegawai'>                                
                                    <option value ="<?php echo $record->id_pegawai;?>"><?php echo $record->id_pegawai;?> / <?php echo $record->nama_pegawai;?></option>
                                        <?php foreach ($pegawai as $record2) : ?>   
                                            <option value="<?php echo $record2->id_pegawai;?>"><?php echo $record2->id_pegawai;?> / <?php echo $record2->nama_pegawai;?></option>  
                                        <?php endforeach; ?>         
                                    </select>
                                    <?php echo form_error('identitas_pegawai', '<span class="help-block">', '</span>') ?>
                                    </div>
                                </div>                               
                                <div class="form-group row <?php echo (form_error('email')) ? ' has-error' : ''; ?>">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                    <input type="email" class="form-control" name='email' readonly value="<?php echo $record->email; ?>">
                                    <?php echo form_error('email', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                    <div class="col-sm-1">
                                    <a href="<?php echo site_url('users/formupdate/email/'.$record->id_users) ?>" class="btn btn-primary float-right">&emsp;Ubah Email&emsp;</a>
                                    </div> 
                                </div>
                                <div class="form-group row <?php echo (form_error('password')) ? ' has-error' : ''; ?>">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                    <input type="password" class="form-control" name='password' readonly value="<?php echo $record->password; ?>">
                                    <?php echo form_error('password', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                    <div class="col-sm-1">
                                    <a href="<?php echo site_url('users/formupdate/pass/'.$record->id_users) ?>" class="btn btn-primary float-right">&ensp;Ubah Password</a>
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
                                    <input type="file" name="foto_profil" class="form-control" /> 
                                    Format file jpg, jpeg dan png <br>
                                    <img src="<?php echo $record->foto_profil?>" width="50">
                                    <?php echo form_error('foto_profil', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('qr_code')) ? ' has-error' : ''; ?>">
                                    <label for="qr_code" class="col-sm-2 col-form-label">QR Code</label>
                                    <div class="col-sm-10">
                                    <input type="file" name="qr_code" class="form-control"/> 
                                    Format file jpg, jpeg dan png <br>
                                    <img src="<?php echo $record->qr_code?>" width="50">
                                    <?php echo form_error('qr_code', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('hak_akses')) ? ' has-error' : ''; ?>">
                                    <label for="inputretypepassword" class="col-sm-2 col-form-label">Hak Akses</label>
                                    <div class="col-sm-9">
                                    <input type="radio" class="form-control-radio" name='hak_akses' value="Admin" <?php echo ($record->hak_akses == "Admin")?'checked':'' ?>> Admin &nbsp;
                                    <input type="radio" class="form-control-radio" name='hak_akses' value="Asisten Pabrik" <?php echo ($record->hak_akses == "Asisten Pabrik")?'checked':'' ?>> Asisten Pabrik &nbsp;
                                    <input type="radio" class="form-control-radio" name='hak_akses' value="Direktur" <?php echo ($record->hak_akses == "Direktur")?'checked':'' ?>>  Direktur
                                    <?php echo form_error('hak_akses', '<span class="help-block">', '</span>') ?>
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

