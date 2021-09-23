<!DOCTYPE html>
<html>
<head>
    <!-- datepicker bootstrap -->
    <link rel="stylesheet" href = "<?php echo base_url() ?>assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <script src="<?php echo base_url('assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js');?>"></script>
    <script src="<?php echo base_url('assets/libs/bootstrap-datepicker/js/locales/bootstrap-datepicker.id.min.js');?>" ></script>

</head>

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Kategori</B> 
            
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Kategori</li>
        </ol>
        
        
    </section>

   <!-- Main content -->
<section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                
                <div class="box">
                <div class="box-header with-border">
                    <a href="<?php echo site_url('KategoriController/formCreate');?>" class="btn btn-default">
                            <span class="fa fa-plus"></span> &nbsp; Tambah </a> &nbsp;    
                </div>
                        <div class="box-body">
                        

                        <?php $this->load->view('templates/flash'); ?>     
                        

        <div class="col-lg-6 col-xs-6">
            <div class="box box-solid ">
                <div class="box-header with-border">
                    <p3 class="box-title">Daftar Kategori Pemasukan Kas</p3>   
                </div>
                <div class="box-body">
                  
                <table class="table table-striped table-bordered ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Uraian</th>                               
                            <th>Aksi</th>                                
                         </tr>
                    </thead>
                    <tbody>  
                    <?php foreach ($DataKPM->result() as $record) : ?>                         
                        <tr>
                            <!-- Memanggil Value pada Tabel Users -->
                            <td> <?php echo $record->id_kategori;?></td>
                            <td> <?php echo $record->nama_kategori;?></td>                              
                            <td class="col-lg-3"> 
                                <a href="<?php echo site_url('KategoriController/formUpdate/'.$record->id_kategori) ?>"  class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>    
                                <button data-toggle="modal" data-target = "#delete-modal<?php echo $record->id_kategori ;?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>                    
                        </tr> 
                        <!-- Delete Modal-->
                        <div class="modal modal-danger fade" id="delete-modal<?php echo $record->id_kategori ;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Hapus</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda yakin akan menghapus data?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                                        <?php echo form_open(site_url("KategoriController/processdelete/".$record->id_kategori)) ?>
                                        <button type="submit" class="btn btn-outline">Ya</button>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                            </div>
                        <!-- End Delete Modal -->
                    <?php endforeach; ?>                                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-6">
            <div class="box box-solid ">
                <div class="box-header with-border">
                    <p3 class="box-title">Daftar Kategori Pengeluaran Kas</p3>   
                </div>
                <div class="box-body">
                  
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Uraian</th>                               
                            <th>Aksi</th>                                
                         </tr>
                    </thead>
                    <tbody>    
                    <?php foreach ($DataKPK->result() as $record2) : ?>                     
                        <tr>
                            <!-- Memanggil Value pada Tabel Users -->
                            <td> <?php echo $record2->id_kategori;?></td>
                            <td><?php echo $record2->nama_kategori;?></td>                              
                            <td class="col-lg-3"> 
                                <a href="<?php echo site_url('KategoriController/formupdate/'.$record2->id_kategori) ?>"  class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>    
                                <button data-toggle="modal" data-target = "#delete-modal<?php echo $record2->id_kategori ;?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>                    
                        </tr> 
                        <!-- Delete Modal-->
                        <div class="modal modal-danger fade" id="delete-modal<?php echo $record2->id_kategori ;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Hapus</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda yakin akan menghapus data?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tidak</button>
                                        <?php echo form_open(site_url("KategoriController/processdelete/".$record2->id_kategori)) ?>
                                        <button type="submit" class="btn btn-outline">Ya</button>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>
                            </div>
                        <!-- End Delete Modal -->
                    <?php endforeach; ?>                                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>

                        <!-- End Tabel Akun Users -->
                        <script>
                            $(document).ready(function() {
                                $('#myTable').DataTable();
                            } );
                        </script> 
  
                    </div>
                </div>
            </div>
        </div>
    </section>

</div> 
</body>

</html>