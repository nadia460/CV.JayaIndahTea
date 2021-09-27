

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Pemasukan Kas</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pemasukan</li>>
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
                        <form  action="<?php echo site_url('PemasukanController/processUpdate/'.$record->id_pemasukan) ?>" method="POST" id="form0">
                            <div class="form-group row ">
                                <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name='id_pemasukan' readonly value="<?php echo $record->id_pemasukan; ?>" >    
                                </div>       
                            </div>
                            <div id="inputKategoriPemasukan" class="form-group row <?php echo (form_error('kategori_pemasukan')) ? ' has-error' : ''; ?>">
                                <label for="inputKategoriPemasukan" class="col-sm-2 col-form-label">Kategori Pemasukan</label>
                                <div class="col-sm-10">      
                                <input type="text" class="form-control" name='kategori_pemasukan' id="selectKategori" readonly value="<?php echo $record->kategori_pemasukan; ?>">                          
                                
                                <?php echo form_error('kategori_produk', '<span class="help-block">', '</span>') ?>
                                </div>
                            </div>
                        
                            <hr/>

                            <div id="form2">
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
                                    <label for="inputtujuan_kirim" class="col-sm-2 col-form-label">Tujuan Kirim</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='tujuan_kirim' value="<?php echo $record->tujuan_kirim; ?>">
                                    <?php echo form_error('tujuan_kirim', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('berat')) ? ' has-error' : ''; ?>">
                                    <label for="inputBeratBarang" class="col-sm-2 col-form-label">Berat Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='berat' value="<?php echo $record->berat; ?>">
                                    <?php echo form_error('berat', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                                <div class="form-group row <?php echo (form_error('harga_per_kg')) ? ' has-error' : ''; ?>">
                                    <label for="inputHargaPerKG" class="col-sm-2 col-form-label">Harga Per-kilogram</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='harga_per_kg' value="<?php echo $record->harga_per_kg; ?>">
                                    <?php echo form_error('harga_per_kg', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                                
                            </div>
                        </form>

                        <br>
                        <a href="<?php echo site_url('income') ?>" class="btn btn-default float-right">&ensp;Batal&ensp;</a>
                        
                            <!-- /.card-footer -->
                        
                    </div>
                </div>
            </div>
        </div>     
    </section>
</div> 
</body>

