

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Tambah Kategori</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Kategori</li>
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
                        <?php echo form_open_multipart(site_url('category/processcreate')) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                
                                
                                <div class="form-group row <?php echo (form_error('kategori')) ? ' has-error' : ''; ?>">
                                    <label for="inputKategori" class="col-sm-2 col-form-label">Arus Kas</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='kategori'>                                
                                        <option value ="">Pilih Arus Kas</option>
                                        <option value="Pemasukan Kas">Pemasukan Kas</option>
										<option value="Pengeluaran Kas">Pengeluaran Kas</option>
                                    </select>
                                    <?php echo form_error('kategori', '<span class="help-block">', '</span>') ?>
                                    </div>
                                </div>
                               
                                <div class="form-group row <?php echo (form_error('nama_kategori')) ? ' has-error' : ''; ?>">
                                    <label for="inputNamaJenis" class="col-sm-2 col-form-label">Nama Kategori</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama_kategori' placeholder="Biaya .....">
                                    <?php echo form_error('nama_kategori', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                            <input type="submit" class="btn btn-primary" value="Simpan">
                            <a href="<?php echo site_url('category') ?>" class="btn btn-default float-right">Batal</a>
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

