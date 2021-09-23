

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Detail User</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Pemasukan</li>
            <li class="active">Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    
                    <?php echo form_open_multipart(site_url('PemasukanController/Update/'.$record->id_pemasukan)) ?>

                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th width="300px">ID</th>
                                <td><?php echo ($record->id_pemasukan) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Nama Lengkap</th>
                                <td><?php echo ($record->nama_barang) ?></td>
                            </tr>

                            <tr>
                                <th width="300px">Email</th>
                                <td><?php echo ($record->tujuan) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Jabatan</th>
                                <td><?php echo ($record->berat_barang_pm) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Dibuat pada</th>
                                <td><?php echo ($record->nominal_pemasukan) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Terakhir diedit</th>
                                <td><?php echo ($record->updated_at) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    <br>
                    
                    <a href="<?php echo site_url('pemasukancontroller/list') ?>" class="btn btn-default float-right">Kembali</a>
                    
                    </div>
                    <?php echo form_close() ?>

                    
                </div>

            </div>
        </div>
    </section>
</div> 
</body>

