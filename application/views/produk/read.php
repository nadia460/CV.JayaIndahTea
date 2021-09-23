

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Detail Produk</B> 
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Produk</li>
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
                                <td><?php echo ($record->id_produk) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Nama Barang</th>
                                <td><?php echo ($record->nama_produk) ?></td>
                            </tr>
                            <tr>
                                <th width="300px">Foto Barang</th>
                                <td><img src="<?php echo $record->foto_produk?>" width="150"> </td>
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
                    
                    <a href="<?php echo site_url('ProdukController') ?>" class="btn btn-default float-right">Kembali</a>
                    
                    </div>
                    

                    
                </div>

            </div>
        </div>
    </section>
</div> 
</body>

