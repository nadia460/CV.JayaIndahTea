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
            <small>Direktur</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Laporan</li>
        </ol>
        
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            
            <div class="col-lg-12 col-xs-12">
                <div class="box box-solid box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Laporan</h3>
                </div>
                        <div class="box-body">
                        
                        <!-- Tabel  -->

    <table class="table table-bordered"s>
        <thead>
            <tr>
                <th>ID</th>
                <th>Periode</th>
                <th>Petugas Admin</th>
                <th>Penyetuju</th>     
                <th>Aksi</th>                                
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dataLP->result() as $record) : ?>
            <tr>
                <!-- Memanggil Value pada Tabel Users -->
                <td><?php echo $record->id_laporan;?></td>
                <td><?php echo $record->periode;?></td>
                <td><?php echo $record->petugas_admin;?></td>
                <td><?php echo $record->penyetuju;?></td> 
                <td class="col-lg-2"> 
                    <a href="<?php echo site_url('direktur/report/read/'. $record->id_laporan) ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                    <a href="<?php echo site_url('LaporanController/get_download/'. $record->id_laporan) ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-download"></span></a>                                      
                    <button data-toggle="modal" data-target = "#delete-modal " class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                </td>                    
            </tr>                      
            <?php endforeach; ?>  
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