<!DOCTYPE html>
<html>
<head>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/font-awesome/css/font-awesome.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/skin-black.min.css') ?>">
    <!-- jQuery 3 -->
    <script src="<?php echo base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    
</head>

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                        <div class="box-body">
                        <table class = "table">
                            <th><div class= "text-center"><br>
                                <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="250"> 
                                </div>
                            </th> 
                            <th><div class="col-lg-10 col-xs-10 text-center"><h2> Laporan (Jenis Report) </h2>
                                <p> JL. Surakerta, Nengkelan RT 001 RW 006 Ciwidey, Kb. Bandung (Kode Pos : 40973)</p>
                                <p> E-mail: harissusanto573@gmail.com </p>
                                </div>
                            </th>
                        </table> 
                        <hr style ="border-top: 3px solid black;">
                        <!-- Tabel Akun Users -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Dibuat Pada</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users->result() as $r) : ?>
                                <tr>
                                    <!-- Memanggil Value pada Tabel Users -->
                                    <td><?php echo $r->id;?></td>
                                    <td><?php echo $r->name;?></td>
                                    <td><?php echo $r->email;?></td>
                                    <td><?php echo $r->created_at;?></td>
                                    
                                </tr>
                                    
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Dibuat Pada</th>
                                    
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