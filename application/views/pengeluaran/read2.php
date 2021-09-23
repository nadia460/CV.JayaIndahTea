

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Detail Pengeluaran Kas</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pengeluaran</li>
            <li class="active">Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    
                    

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th width="300px">ID</th>
                                <td><?php echo ($record->id_pengeluaran) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Kategori Pengeluaran</th>
                                <td><?php echo ($record->kategori_pengeluaran) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Keterangan</th>
                                <td><?php echo ($record->keterangan) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Nominal</th>
                                <td>Rp. <?php echo ($record->nominal_pengeluaran) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Petugas Admin</th>
                                <td> <?php echo ($record->nama_pegawai) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Dibuat pada</th>
                                <td><?php echo ($record->created_at) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Terakhir diedit</th>
                                <td><?php echo ($record->updated_at) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    <br>
                    
                    <a href="<?php echo site_url('PengeluaranController') ?>" class="btn btn-default float-right">Kembali</a>
                    
                    </div>
                    

                    
                </div>

            </div>
        </div>
    </section>
</div> 
</body>

