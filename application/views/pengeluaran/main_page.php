

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Daftar Pengeluaran Kas</B>         
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Pengeluaran</li>
        </ol>  
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <a href="<?php echo site_url('expenditure/formcreate');?>" class="btn btn-default">
                            <span class="fa fa-plus"></span> &nbsp; Tambah </a> &nbsp;    
                    </div>
                    <div class="box-body">
                        <?php $this->load->view('templates/flash'); ?>     
                        <!-- Tabel Akun Users -->
                        <table id="myTable" class="display table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori Pengeluaran</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>          
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php foreach ($dataPK->result() as $record) : ?>
                                <tr>
                                    <!-- Memanggil Value pada Tabel Users -->
                                    <td><?php echo $record->id_pengeluaran;?></td>
                                    <td><?php echo $record->kategori_pengeluaran;?></td> 
                                    <td><?php echo "Rp. ".number_format($record->nominal_pengeluaran, 0, ".", ".")?></td>
                                    <td><?php echo $record->created_at;?></td>
                                    <td>
                                        <!-- Button Aksi (Read and Delete) -->
                                        <a href="<?php echo site_url('expenditure/readbyid/'.$record->id_pengeluaran) ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-eye-open"></span></a>
                                        <a href="<?php echo site_url('expenditure/formupdate/'.$record->id_pengeluaran) ?>" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>
                                        
                                        <button data-toggle="modal" data-target = "#delete-modal<?php echo $record->id_pengeluaran ;?>" class="btn btn-danger btn-sm delete_record"><span class="glyphicon glyphicon-trash"></span></button>
                                    </td>
                                </tr>
                                    <!-- Delete Modal-->
                                    <div class="modal modal-danger fade" id="delete-modal<?php echo $record->id_pengeluaran ;?>">
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
                                                    <?php echo form_open(site_url("PengeluaranController/processdelete/".$record->id_pengeluaran)) ?>
                                                    <button type="submit" class="btn btn-outline">Ya</button>
                                                    <?php echo form_close() ?>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- End Delete Modal -->
                                    </div>     
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Kategori Pengeluaran</th>
                                    <th>Nominal</th>
                                    <th>Tanggal</th>          
                                    <th>Aksi</th>
                                </tr>
                                </tr>
                            </tfoot>
                        </table>
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