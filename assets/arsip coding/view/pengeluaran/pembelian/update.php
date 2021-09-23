

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Tambah Pembelian Bahan Baku</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pengeluaran</li>
            <li class="active">Pembelian</li>
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
                        
                        <?php echo form_open_multipart(site_url('Pengeluaran/PembelianController/processUpdate/'.$record->id_pengeluaran)) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_pengeluaran' readonly value="<?php echo $record->id_pengeluaran; ?>" >
                                    
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row <?php echo (form_error('nama_barang')) ? ' has-error' : ''; ?>">
                                    <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama_barang' placeholder="Nama Barang" value="<?php echo $record2->nama_barang; ?>">
                                    <?php echo form_error('nama_barang', '<span class="help-block">', '</span>') ?>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row <?php echo (form_error('asal_kirim')) ? ' has-error' : ''; ?>">
                                    <label for="inputasal_kirim" class="col-sm-2 col-form-label">Asal Kirim</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='asal_kirim' placeholder="Asal kirim dari" value="<?php echo $record2->asal_kirim; ?>">
                                    <?php echo form_error('asal_kirim', '<span class="help-block">', '</span>') ?>
                                    </div>
                                    
                                </div>
                                <div class="form-group row <?php echo (form_error('berat')) ? ' has-error' : ''; ?>">
                                    <label for="inputBerat" class="col-sm-2 col-form-label">Berat Barang</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name='berat' placeholder="50.2" value="<?php echo $record2->berat; ?>">
                                    <?php echo form_error('berat', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                    <label >Kilogram (Kg)</label>
                                    
                                </div>
                                <div class="form-group row <?php echo (form_error('harga_per_kg')) ? ' has-error' : ''; ?>">
                                    <label for="inputHargaPerKG" class="col-sm-2 col-form-label">Harga Per-kilogram</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga_per_kg' placeholder="17000" value="<?php echo $record2->harga_per_kg; ?>">
                                    <?php echo form_error('harga_per_kg', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="<?php echo site_url('Pengeluaran/PembelianController') ?>" class="btn btn-default float-right">Batal</a>
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

