

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Edit Produk</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Produk</li>
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
                        <?php echo form_open_multipart(site_url('ProdukController/processUpdate/'.$record->id_produk)) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group row ">
                                    <label for="inputIDProduk" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_produk' readonly value="<?php echo $record->id_produk; ?>" >    
                                    </div>       
                                </div>  
                                <div class="form-group row <?php echo (form_error('nama_produk')) ? ' has-error' : ''; ?>">
                                    <label for="inputnama_produk" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama_produk' placeholder="Nama Produk" value="<?php echo $record->nama_produk; ?>">
                                    <?php echo form_error('nama_produk', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('foto_produk')) ? ' has-error' : ''; ?>">
                                    <label for="inputfoto_produk" class="col-sm-2 col-form-label">Foto Produk</label>
                                    <div class="col-sm-10">
                                    <input type="file" name="foto_produk" class="form-control" id="foto_produk" set_value="<?php echo $record->foto_produk?>"/>
                                    Format file jpg, jpeg, gif dan png<br><br><img src="<?php echo $record->foto_produk?>" width="100">
                                    <?php echo form_error('foto_produk', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="<?php echo site_url('products') ?>" class="btn btn-default float-right">Batal</a>
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

