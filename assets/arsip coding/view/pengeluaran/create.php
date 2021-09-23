<style>
#MyForm{
	display: none;
}	
</style>

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
                        <?php echo form_open_multipart(site_url('PemasukanController/preprocessCreate')) ?>
                        <form class="form-horizontal" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                
                            </div>     
                        </form>
                        
                        <style>
                            #MyForm{
                                display: none;
                            }
                            form{display:none}	
                        </style>
                        
                    
                        
                       
                        <?php echo form_close() ?>
                        <script>
                        $(document).ready(function(){
                            $('#Mybtn').click(function(){
                                $('#MyForm').toggle(500);
                            });

                            $('#selectForm2').change(function(){
                                var formID = $(this).val();
                                var e = document.getElementById('selectForm2');
                                var selectedOption = e.options[e.selectedIndex].value;
                                if(selectedOption == "")
                                {
                                    $('#form2').css('display','none');
                                    $('#form1').css('display','none')  
                                    }    
                                else if (selectedOption == "Pembelian Bahan Baku")
                                {
                                    $('#form1').css('display','none');
                                    $('#form2').css('display','block')
                                }
                                else if(selectedOption != "Pembelian Bahan Baku")
                                {
                                    $('#form2').css('display','none');
                                    $('#form1').css('display','block')  
                                }
                            })
                            
                            
                        });
                        </script>
                        

                                <div class="form-group row ">
                                    <label for="inputIDPemasukan" class="col-sm-2 col-form-label">ID</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='id_pengeluaran' readonly value="<?php echo $new_id; ?>" >  
                                    </div>                                 
                                </div>
                                <div class="form-group row <?php echo (form_error('nama_produk')) ? ' has-error' : ''; ?>">
                                    <label for="inputNamaBarang" class="col-sm-2 col-form-label">Jenis Pengeluaran</label>
                                    <div class="col-sm-10">                                
                                    <select class="form-control custom-select rounded-0" name='jenis' id="selectForm2">                                
                                    <option value ="">Pilih Jenis Pengeluaran</option>
                                        <?php foreach ($jenis as $record_jenis) : ?>   
                                            <option value="<?php echo $record_jenis->nama_jenis;?>"><?php echo $record_jenis->nama_jenis;?></option>  
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('nama_produk', '<span class="help-block">', '</span>') ?>
                                    </div>
                                </div>
<hr/>

<form  method="post"  name="firstform" id="form1" action="">

                                <div class="form-group row <?php echo (form_error('keterangan_lainnya')) ? ' has-error' : ''; ?>">
                                    <label for="inputketerangan_lainnya" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                    <textarea type="text" class="form-control" name='keterangan_lainnya' placeholder="Keterangan lainya"></textarea>
                                    <?php echo form_error('keterangan_lainnya', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                   
                                    
                                </div>
                                <div class="form-group row <?php echo (form_error('nominal_pengeluaran')) ? ' has-error' : ''; ?>">
                                    <label for="inputNominalPengeluaran" class="col-sm-2 col-form-label">Nominal</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nominal_pengeluaran' placeholder="17000">
                                    <?php echo form_error('nominal_pengeluaran', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                </div>
                                
</form>

<form name="secondform" id="form2" action="">
                                <div class="form-group row <?php echo (form_error('nama_barang')) ? ' has-error' : ''; ?>">
                                    <label for="inputNamaBarang" class="col-sm-2 col-form-label">Nama Barang</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='nama_barang' placeholder="Nama Barang">
                                    <?php echo form_error('nama_barang', '<span class="help-block">', '</span>') ?>
                                    </div>
                                    
                                </div>
                                
                                <div class="form-group row <?php echo (form_error('asal_kirim')) ? ' has-error' : ''; ?>">
                                    <label for="inputasal_kirim" class="col-sm-2 col-form-label">Asal Kirim</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name='asal_kirim' placeholder="Asal kirim dari">
                                    <?php echo form_error('asal_kirim', '<span class="help-block">', '</span>') ?>
                                    </div>
                                    
                                </div>
                                <div class="form-group row <?php echo (form_error('berat')) ? ' has-error' : ''; ?>">
                                    <label for="inputBerat" class="col-sm-2 col-form-label">Berat Barang</label>
                                    <div class="col-sm-9">
                                    <input type="text" class="form-control" name='berat' placeholder="50.2">
                                    <?php echo form_error('berat', '<span class="help-block">', '</span>') ?>
                                    </div> 
                                    <label >Kilogram (Kg)</label>
                                    
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
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                
                                </div>
                                <!-- /.card-footer -->
</form>
<br><a href="<?php echo site_url('PengeluaranController') ?>" class="btn btn-default float-right">&ensp;Batal&ensp;</a>











                    </div>
                </div>
            </div>
        </div>
        
    </section>
</div> 
</body>

