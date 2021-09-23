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
            <B>Laporan</B> 
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Laporan</li>
        </ol>  
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
         
            <div class="col-lg-3 col-xs-3">
                <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Buat Laporan</h3>
                </div>
                <div class="box-body">
                                     
                    <form  action="<?php echo site_url('LaporanController/reportMonth') ?>" id="form1" method="POST">
                        <div class="form-group ">
                        <label >Periode Bulan: </label>     
                            <div class="input-group date col-sm-12 <?php echo (form_error('periode_bulan')) ? ' has-error' : ''; ?>" >
                                <input type="text" class="form-control" name='periode_bulan' id="datemonths" placeholder="yyyy-mm"/>
                                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                <?php echo form_error('periode_bulan', '<span class="help-block">', '</span>') ?>
                            </div>
                        </div>  
                        <div class="card-footer">
                            <input type="submit" class="btn btn-default col-sm-12" value="Laporan Arus Kas Bulanan">
                        </div>&nbsp;
                    </form>
                    
                    <form  action="<?php echo site_url('LaporanController/reportYear') ?>" method="POST"> 
                        <div class="form-group ">
                        <label >Periode Tahun: </label>
                            <div class="input-group date col-sm-12 <?php echo (form_error('periode_tahun')) ? ' has-error' : ''; ?>" >
                                <input type="text" class="form-control" name='periode_tahun' id="dateyears" placeholder="yyyy"/>
                                <span class="glyphicon glyphicon-calendar form-control-feedback"></span>
                                <?php echo form_error('periode_tahun', '<span class="help-block">', '</span>') ?>
                            </div>  
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-default col-sm-12" value="Laporan Arus Kas Tahunan">
                        </div>&nbsp;
                    </form>
                </div>
                </div>
            </div>

            <div class="col-lg-9 col-xs-9">
                <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Laporan</h3>
                </div>
                <div class="box-body">
                <?php $this->load->view('templates/flash'); ?>         
                <!-- Tabel  -->

                <table class="table table-bordered"s>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Uraian</th>
                            <th>Petugas Admin</th>
                            <th>Penyetuju</th>     
                            <th>Aksi</th>                                
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <!-- Memanggil Value pada Tabel Users -->
                            <td> LP-210827-001</td>
                            <td> Laporan Arus Kas Bulanan </td>
                            <td> Nadia Dwi Puji Lestari</td>
                            <td> Muhamad Faisal</td>  
                            <td class="col-lg-2"> 
                                <a href="<?php echo site_url('LaporanController/readbyid_admin') ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                <a href="<?php echo site_url('LaporanController/readbyid_admin') ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download"></span></a>                                      
                                <button data-toggle="modal" data-target = "#delete-modal " class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                            </td>                    
                        </tr>                         
                    </tbody>
                </table>
                
                <script>
                    //Date picker
                    $('#datemonths').datepicker({
                        format: 'yyyy-mm',
                        startView: "months",
                        minViewMode: "months"
                    });
                    //Date picker
                    $('#dateyears').datepicker({
                        format: 'yyyy',
                        startView: "years",
                        minViewMode: "years"
                    });
                    //
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