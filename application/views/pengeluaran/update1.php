

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Pengeluaran Kas</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pengeluaran</li>
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
                        <form  action="<?php echo site_url('PengeluaranController/processUpdate/'.$record->id_pengeluaran) ?>" method="POST"  id="form0">
                            <div class="form-group row ">
                                <label for="inputIDPengeluaran" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name='id_pengeluaran' readonly value="<?php echo $record->id_pengeluaran; ?>" >    
                                </div>       
                            </div>
                            <div id="inputKategoriPengeluaran" class="form-group row <?php echo (form_error('kategori_pengeluaran')) ? ' has-error' : ''; ?>">
                                <label for="inputKategoriPengeluaran" class="col-sm-2 col-form-label">Kategori Pengeluaran</label>
                                <div class="col-sm-10">                                
                                <input type="text" class="form-control" name='kategori_pengeluaran' id="selectKategori" readonly value="<?php echo $record->kategori_pengeluaran; ?>">                          
                                <?php echo form_error('kategori_pengeluaran', '<span class="help-block">', '</span>') ?>
                                </div>
                            </div>
                        
                            <hr/>

                            <div id="form1">
                                <div class="form-group row <?php echo (form_error('nama_barang')) ? ' has-error' : ''; ?>">
                                    <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama_barang' value="<?php echo $record->nama_barang; ?>">
                                    <?php echo form_error('nama_barang', '<span class="help-block">', '</span>') ?>
                                    </div>
                                </div> 
                                <div class="form-group row <?php echo (form_error('asal_kirim')) ? ' has-error' : ''; ?>">
                                    <label for="inputasal_kirim" class="col-sm-2 col-form-label">Asal Kirim</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='asal_kirim' value="<?php echo $record->asal_kirim; ?>">
                                    <?php echo form_error('asal_kirim', '<span class="help-block">', '</span>') ?>
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
                        <a href="<?php echo site_url('PengeluaranController') ?>" class="btn btn-default float-right">&ensp;Batal&ensp;</a>
                        
                        
                    </div>
                </div>
            </div>
        </div>     
    </section>
</div> 
</body>

