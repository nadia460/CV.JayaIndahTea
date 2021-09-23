<!DOCTYPE html>
<html>
<head>
       <!-- CSS -->
       <style>
            #table {
                font-family: "Times New Roman";
                border-collapse: collapse;
                width: 100%;
            }
            
            #table td, #table th {
                border: 1px solid #aaa;
                padding: 7px;
            }

            #table tr:nth-child(even){background-color: #ffffff;}

            #table th {
                padding-top: 5px;
                padding-bottom: 5px;
                text-align: left;
                background-color: #ffffff;
                color: black;
            }

            #letterhead th {
                padding: 3px;
                text-align: left;
                font-family: "Times New Roman";  
            }

            #letterhead p {
                font-weight: normal;
            }  
           
        </style>



</head>

<body>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <B>Laporan Arus Kas</B> 
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Laporan</li>
            <li class="active">Lihat</li>
        </ol>

       
        
        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                        <div class="box-body">
                        <a href="<?php echo site_url('LaporanController');?>" class="btn btn-default">
                            <span class="fa fa-home"></span> &nbsp; Kembali 
                        </a> &nbsp;
                        <a href="<?php echo site_url('LaporanController/get_download');?>" class="btn btn-success">
                            <span class="fa fa-download"></span> &nbsp; Unduh PDF
                        </a> &nbsp;
                        
                        <?php $this->load->view('templates/flash'); ?>     
                        <!-- Tabel  -->
                        
    <table id="letterhead">
        <th width="230px">
            <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="200">
        </th> 
        <th>
            <br>
            <div>LAPORAN ARUS KAS
                <p> JL. Surakerta, Nengkelan RT 001 RW 006 Ciwidey, Kabupaten Bandung (Kode Pos : 40973)<br>
                    E-mail: harissusanto573@gmail.com 
                </p>
            </div>
        </th>
        
    </table> 

    <hr style ="border-top: 3px solid black;">
    <p> 
        ID Laporan : LP-XXXXXX-XXX
        Periode :
    </p>

    <!-- Tabel Akun Users -->
    <table id="table">


        <tbody>
            <tr>
                <th></th>
                <th> Nominal </th>
            </tr>
            <tr>
                <th>Pemasukan Kas (+)</th>
                <td>  </td>
                
            </tr>
            <tr>
                <td>Pembelian Barang</td>
                <td>  </td>
            </tr>
            <tr>
                <th>Pengeluaran Kas (-)</th>
                <td>  </td>
                
            </tr>
            <tr>
                <td>Pembelian Barang</td>
                <td>  </td>
            </tr>
            <tr>
                <td>Biaya Gaji</td>  
                <td>  </td>                   
            </tr>                      
            <tr>
                <td>Biaya Listrik dan Air</td>  
                <td>  </td>                   
            </tr> 
            <tr>
                <td>Biaya Telepon</td>  
                <td>  </td>                   
            </tr> 
            <tr>
                <td>Biaya Alat Tulis Kantor</td>  
                <td>  </td>                   
            </tr> 
            <tr>
                <td>Biaya Penyusutab</td>  
                <td>  </td>                   
            </tr> 
             <tr>
                <td>Biaya Transportasi</td>  
                <td>  </td>                   
            </tr> 
            <tr>
                <th>Total</th>
                <th>00000</th>  
            </tr>
        </tbody>

    </table> 

    
                        <script>
                            //Date picker
                            $('#reservationdate').datetimepicker({
                                format: 'L'
                            });
                        </script> 
                        <script>
                            //Date picker
                            $('#datepicker').datepicker({
                                format: 'MM yyyy',
                                viewMode: "months",
                                minViewMode: true
                            });
                        </script> 



                    </div>
                </div>
            </div>
        </div>
    </section>
</div> 
</body>

</html>