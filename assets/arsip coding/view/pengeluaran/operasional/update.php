

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Pengeluaran Operasional</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pengeluaran</li>
            <li class="active">Operasional</li>
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
                        <?php echo form_open_multipart(site_url('Pengeluaran/OperasionalController/processUpdate/'.$record->id_pengeluaran)) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_pengeluaran' readonly value="<?php echo $record->id_pengeluaran; ?>">
                                    
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row <?php echo (form_error('jenis_pengeluaran')) ? ' has-error' : ''; ?>">
                                    <label for="inputJenisPengeluaran" class="col-sm-2 col-form-label">Jenis Pengeluaran</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='jenis_pengeluaran'>                                
                                        <option value="<?php echo $record->jenis_pengeluaran; ?>"><?php echo $record->jenis_pengeluaran; ?></option>
                                        <option value="Biaya Transportasi">Biaya Transportasi</option>
										<option value="Biaya Listrik dan Air">Biaya Listrik dan Air</option>
                                        <option value="Biaya Telepon dan Wifi">Biaya Telepon dan Wifi</option>
                                        <option value="Biaya Alat Tulis Kantor">Biaya Alat Tulis Kantor</option>
                                        <option value="Biaya Pengeringan">Biaya Pengeringan</option>
                                        <option value="Biaya Gaji">Biaya Gaji</option>
                                    </select>
                                    <?php echo form_error('jenis_pengeluaran', '<span class="help-block">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="form-group row <?php echo (form_error('keterangan_lainnya')) ? ' has-error' : ''; ?>">
                                    <label for="inputketerangan_lainnya" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name='keterangan_lainnya' value="<?php echo $record->keterangan_lainnya; ?>"><?php echo $record->keterangan_lainnya; ?></textarea>
                                    <?php echo form_error('keterangan_lainnya', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                   
                                    
                                </div>
                                <div class="form-group row <?php echo (form_error('nominal_pengeluaran')) ? ' has-error' : ''; ?>">
                                    <label for="inputNominalPengeluaran" class="col-sm-2 col-form-label">Nominal</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nominal_pengeluaran' value="<?php echo $record->nominal_pengeluaran; ?>">
                                    <?php echo form_error('nominal_pengeluaran', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="<?php echo site_url('Pengeluaran/OperasionalController') ?>" class="btn btn-default float-right">Batal</a>
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

