

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Penjualan Produk</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pemasukan</li>
            <li class="active">Penjualan</li>
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
                <?php echo form_open_multipart(site_url('PemasukanController/processUpdate/'.$record->id_pemasukan)) ?>
                <form class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group row <?php echo (form_error('id_pemasukan')) ? ' has-error' : ''; ?>">
                            <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_pemasukan' placeholder="ID" readonly value="<?php echo $record->id_pemasukan; ?>">
                             <?php echo form_error('id_pemasukan', '<span class="help-block">', '</span>') ?>
                            </div>
                            
                        </div>
                        <div class="form-group row <?php echo (form_error('nama_produk')) ? ' has-error' : ''; ?>">
                            <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                <select class="form-control custom-select rounded-0" name='nama_produk' value="<?php echo $record->nama_produk; ?>">  
                                    <option value="<?php echo $record->nama_produk; ?>"><?php echo $record->nama_produk; ?></option>
                                        <?php foreach ($nama_produk as $record_produk) : ?>   
                                            <option value="<?php echo $record_produk->nama_produk;?>"><?php echo $record_produk->nama_produk;?></option>  
                                        <?php endforeach; ?>
                                </select>
                                 <?php echo form_error('nama_produk', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>
                        
                        <div class="form-group row <?php echo (form_error('tujuan_kirim')) ? ' has-error' : ''; ?>">
                            <label for="inputtujuan_kirim" class="col-sm-2 col-form-label">Tujuan</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name='tujuan_kirim' placeholder="PT. Indonesia Jaya" value="<?php echo $record->tujuan_kirim; ?>">
                            <?php echo form_error('tujuan_kirim', '<span class="help-block">', '</span>') ?>
                            </div>
                            
                        </div>
                        <div class="form-group row <?php echo (form_error('berat')) ? ' has-error' : ''; ?>">
                            <label for="inputBeratBarang" class="col-sm-2 col-form-label">Berat Barang</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name='berat' placeholder="50.2" value="<?php echo $record->berat; ?>">
                            <?php echo form_error('berat', '<span class="help-block">', '</span>') ?>
                            </div> 
                            <label >Kilogram (Kg)</label>
                            
                        </div>
                            <div class="form-group row <?php echo (form_error('harga_per_kg')) ? ' has-error' : ''; ?>">
                                    <label for="inputHargaPerKG" class="col-sm-2 col-form-label">Harga Per-kilogram</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga_per_kg' placeholder="17000" value="<?php echo $record->harga_per_kg; ?>">
                                    <?php echo form_error('harga_per_kg', '<span class="help-block">', '</span>') ?>
                                    </div> 
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <a href="<?php echo site_url('PemasukanController') ?>" class="btn btn-default float-right">Batal</a>
                    
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

