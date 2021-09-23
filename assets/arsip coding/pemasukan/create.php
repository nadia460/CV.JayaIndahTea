

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Tambah Penjualan Produk</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pemasukan</li>
            <li class="active">Penjualan</li>
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
                        <?php echo form_open_multipart(site_url('PemasukanController/processCreate')) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_pemasukan' readonly value="<?php echo $new_id; ?>" >    
                                    </div>       
                                </div>
                                
                                <div class="form-group row <?php echo (form_error('nama_produk')) ? ' has-error' : ''; ?>">
                                    <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='nama_produk'>                                
                                    <option value ="">Pilih Nama Produk</option>
                                        <?php foreach ($nama_produk as $record_produk) : ?>   
                                            <option value="<?php echo $record_produk->nama_produk;?>"><?php echo $record_produk->nama_produk;?></option>  
                                        <?php endforeach; ?>
                                        <option value ="Pembelian Bahan Baku">Pembelian Bahan Baku</option>
                                    </select>
                                    <?php echo form_error('nama_produk', '<span class="help-block">', '</span>') ?>
                                    </div>
                                </div>
                                <div class="form-group row <?php echo (form_error('tujuan_kirim')) ? ' has-error' : ''; ?>">
                                    <label for="inputtujuan_kirim" class="col-sm-2 col-form-label">Tujuan Kirim</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='tujuan_kirim' placeholder="PT. Indonesia Jaya">
                                    <?php echo form_error('tujuan_kirim', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('berat')) ? ' has-error' : ''; ?>">
                                    <label for="inputBeratBarang" class="col-sm-2 col-form-label">Berat Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='berat' placeholder="30.2 (per-kg)">
                                    <?php echo form_error('berat', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                                <div class="form-group row <?php echo (form_error('harga_per_kg')) ? ' has-error' : ''; ?>">
                                    <label for="inputHargaPerKG" class="col-sm-2 col-form-label">Harga Per-kilogram</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga_per_kg' placeholder="17000">
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

