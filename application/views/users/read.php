

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Detail Akun Users</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Akun Users</li>
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
                                <td><?php echo ($record->id_users) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Nama Pegawai</th>
                                <td><?php echo ($record->nama_pegawai) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Email</th>
                                <td><?php echo ($record->email) ?></td>
                            </tr>
                            
                            <tr>
                                <th width="300px">Foto Profil</th>
                                <td><img src="<?php echo $record->foto_profil?>" width="90"> </td>
                            </tr>
                            <tr>
                                <th width="300px">QR Code</th>
                                <td><img src="<?php echo $record->qr_code?>" width="100"> </td>
                            </tr>
                            <tr>
                                <th width="300px">Hak Akses</th>
                                <td><?php echo ($record->hak_akses) ?></td>
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
                    
                    <a href="<?php echo site_url('users') ?>" class="btn btn-default float-right">Kembali</a>
                    
                    </div>
                    

                    
                </div>

            </div>
        </div>
    </section>
</div> 
</body>

