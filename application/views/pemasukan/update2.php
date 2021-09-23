<style>
    
	
</style>

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
                        
                            <div id="form1">
                                <div class="form-group row <?php echo (form_error('keterangan')) ? ' has-error' : ''; ?>">
                                    <label for="inputtujuan_kirim" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name='keterangan' value="<?php echo $record->keterangan; ?>"><?php echo $record->keterangan; ?></textarea>
                                    <?php echo form_error('keterangan', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('nominal')) ? ' has-error' : ''; ?>">
                                    <label for="inputNominal" class="col-sm-2 col-form-label">Nominal</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nominal' value="<?php echo $record->nominal_pemasukan; ?>">
                                    <?php echo form_error('nominal', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                </div>
                                <!-- /.card-footer -->        
                            </div>

                            
                        </form>

                        <br>
                        <a href="<?php echo site_url('PemasukanController') ?>" class="btn btn-default float-right">&ensp;Batal&ensp;</a>
                        
                            <!-- /.card-footer -->
                        
                    </div>
                </div>
            </div>
        </div>     
    </section>
</div> 
</body>

