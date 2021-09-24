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
            text-align: center;
            font-family: "Times New Roman";  
        }

        #letterhead p {
            text-align: center;
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
            <B> Buat Laporan </B> 
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Laporan</li>
            <li class="active">Buat</li>
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
                        
                        <a  type="button" class="btn btn-success" value="Simpan" onclick="submitForms()">
                            <span class="fa fa-save"></span> &nbsp; Simpan 
                        </a>
                        <?php $this->load->view('templates/flash'); ?>     
                        
                        <form  action="<?php echo site_url('LaporanController/processCreate') ?>" method="POST" id="formLP">
                        <!-- Tabel  -->
                        <table id="letterhead">
                            <th width="550px">
                                <div class="text-right">
                                    <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="200"> 
                                </div>
                            </th> 
                            <th>
                                <br>
                                <div>LAPORAN ARUS KAS
                                    
                                    <p><input type="hidden" name='periode' value="<?php echo $periode; ?>" > Periode <?php echo $periode; ?><br>  
                                         
                                    </p>
                                </div>
                            </th>  
                        </table> 

                        <hr style ="border-top: 3px solid black;">
                        <p name='id_laporan'> 
                            <input type="hidden" name='id_laporan' value="<?php echo $new_id; ?>">ID Laporan &emsp;: <?php echo $new_id; ?>
                        </p>
                        <!-- Tabel  -->
                        <table id="table">
                            <tbody>
                                <tr>
                                    <th>ARUS KAS DARI AKTIVITAS OPERASI</th>
                                    <th> NOMINAL </th>
                                </tr>
                                <tr>
                                    <th>Pemasukan Kas (+)</th>
                                    <td> </td>   
                                </tr>
                                <?php foreach ($laporanPM->result() as $record) : ?>
                                <tr>       
                                    <td><?php echo $record->kategori_pemasukan;?></td>
                                    <td><?php echo $record->nominal_pemasukan;?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th>Pengeluaran Kas (-)</th>
                                    <td>  </td>     
                                </tr>
                                <?php foreach ($laporanPK->result() as $record) : ?>
                                <tr>       
                                    <td><?php echo $record->kategori_pengeluaran;?></td>
                                    <td><?php echo $record->nominal_pengeluaran;?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th>Total</th>
                                    <th><input type="hidden" name='total' value="<?php echo $countFinal;?>" ><?php echo $countFinal;?></th>  
                                </tr>
                            </tbody>
                        </table> 
                        </form>

                        <script>
                            
                        $(document).ready(function(){
                    
                            submitForms = function(){                    
                                document.forms["formLP"].submit();
                                
                            } 
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