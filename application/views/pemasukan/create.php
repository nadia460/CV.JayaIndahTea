<style>
    #form1{
        display:none
    }
    #form2{
        display:none
    }	
</style>

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Form Tambah Pemasukan Kas</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pemasukan</li>>
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
                        <form  action="<?php echo site_url('PemasukanController/processCreate') ?>" method="POST"  id="form0">
                            <div class="form-group row ">
                                <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name='id_pemasukan' readonly value="<?php echo $new_id; ?>" >    
                                </div>       
                            </div>
                            <div id="inputKategoriPemasukan" class="form-group row <?php echo (form_error('kategori_pemasukan')) ? ' has-error' : ''; ?>">
                                <label for="inputKategoriPemasukan" class="col-sm-2 col-form-label">Kategori Pemasukan</label>
                                <div class="col-sm-10">                                
                                <select class="form-control custom-select rounded-0" name='kategori_pemasukan' id="selectKategori">                                
                                <option value ="">Pilih Kategori Pemasukan</option>
                                    <?php foreach ($jenis as $record_jenis) : ?>   
                                        <option value="<?php echo $record_jenis->nama_kategori;?>"><?php echo $record_jenis->nama_kategori;?></option>  
                                    <?php endforeach; ?>
                                    <option value ="Kategori Pemasukan Lainnya">Kategori Pemasukan Lainnya</option>
                                </select>
                                <?php echo form_error('kategori_produk', '<span class="help-block">', '</span>') ?>
                                </div>
                            </div>
                         
                            <hr/>

                            <div id="form1">
                                <div class="form-group row <?php echo (form_error('nama_produk')) ? ' has-error' : ''; ?>">     
                                    <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Produk</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='nama_produk'>                                
                                    <option value ="">Pilih Nama Produk</option>
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
                                    <input type="text" class="form-control" name='tujuan_kirim' placeholder="PT. XYZ">
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
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <input type="button" class="btn btn-primary" value="Simpan" onclick="submitForms()" />
                                </div>
                            </div>    
                            <div id="form2">
                                <div class="form-group row <?php echo (form_error('keterangan')) ? ' has-error' : ''; ?>">
                                    <label for="inputtujuan_kirim" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name='keterangan' placeholder="keterangan"></textarea>
                                    <?php echo form_error('keterangan', '<span class="help-block">', '</span>') ?>
                                    </div>  
                                </div>
                                <div class="form-group row <?php echo (form_error('nominal')) ? ' has-error' : ''; ?>">
                                    <label for="inputNominal" class="col-sm-2 col-form-label">Nominal</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nominal' placeholder="17000">
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
                        
                        <script>
                            
                        $(document).ready(function(){
                            

                            $('#selectKategori').change(function(){
                                var formID = $(this).val();
                                var e = document.getElementById('selectKategori');
                                var selectedOption = e.options[e.selectedIndex].value;
                                if(selectedOption == "")
                                {
                                    $('#form1').css('display','none');
                                    $('#form2').css('display','none')  
                                    }    
                                else if (selectedOption == "Penjualan Produk")
                                {
                                    $('#form2').css('display','none');
                                    $('#form1').css('display','block')
                                }
                                else if(selectedOption != "Penjualan Produk")
                                {
                                    $('#form1').css('display','none');
                                    $('#form2').css('display','block')  
                                }
                            }) 

                            submitForms = function(){                    
                                document.forms["form0"].submit();
                                
                            } 
                        });
                        </script>
                    </div>
                </div>
            </div>
        </div>     
    </section>
</div> 
</body>

