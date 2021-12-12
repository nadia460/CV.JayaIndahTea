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

        #table th {
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: left;
            color: black;
        } 

        #letterhead {
            font-family: "Times New Roman";
            width: 100%;
        }        

        #letterhead th {
            padding-top: 5px;
            padding-bottom: 5px;
            text-align: center;
            background-color: #ffffff;
            color: black;
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
            <B> Detail Laporan </B> 
            <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard </a></li>
            <li class="active">Laporan</li>
            <li class="active">Detail</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <a href="<?php echo site_url('admin/report');?>" class="btn btn-default">
                            <span class="fa fa-home"></span> &nbsp; Kembali 
                        </a> &nbsp;
                        <a href="#" class="btn btn-success" disabled>
                            <span class="fa fa-check-square-o"></span> &nbsp; Setujui 
                        </a> &nbsp;
     
                        
                        <form  action="<?php echo site_url('LaporanController/processCreate') ?>" method="POST" id="formLP">
                        <!-- Tabel  -->
                        <table id="letterhead">
                            <th width="600px">
                                <div class="text-right">
                                    <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="200"> 
                                </div>
                            </th> 
                            <th>
                                <br>
                                <div class="text-left"> LAPORAN ARUS KAS  
                                    <p>Periode <?php echo $laporan->periode; ?><br></p>
                                </div>
                            </th>  
                        </table> 

                        <hr style ="border-top: 3px solid black;">
                        <p name='id_laporan'> 
                            <input type="hidden" name='id_laporan' >ID Laporan &emsp;: <?php echo $laporan->id_laporan; ?>
                        </p>
                        <!-- Tabel  -->
                        <table id="table">
                            <tbody>
                                <tr>
                                    <th>ARUS KAS DARI AKTIVITAS OPERASI</th>
                                    <th>DEBIT</th>
                                    <th>KREDIT</th>
                                    <th>SALDO</th>
                                </tr>
                                <tr>
                                    <th>Pemasukan Kas (+)</th>
                                    <td> </td>
                                    <td>  </td>
                                    <td>  </td>   
                                </tr>
                                <?php $saldo=0;
                                foreach ($laporanPM->result() as $record) : ?>
                                <tr>       
                                    <td><?php echo $record->kategori_pemasukan;?></td>
                                    <td><?php echo number_format($record->nominal_pemasukan, 0, ".", "."); $saldo=$saldo+$record->nominal_pemasukan;?></td>
                                    <td></td>
                                    <td><?php echo number_format($saldo, 0, ".", ".")?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th>Pengeluaran Kas (-)</th>
                                    <td>  </td> 
                                    <td>  </td>
                                    <td>  </td>    
                                </tr>
                                <?php  
                                    foreach ($laporanPK->result() as $record2) : ?>
                                <tr>       
                                    <td><?php echo $record2->kategori_pengeluaran;?></td>
                                    <td></td>
                                    <td><?php echo number_format($record2->nominal_pengeluaran, 0, ".", "."); $saldo=$saldo-$record2->nominal_pengeluaran;?></td>
                                    <td><?php echo number_format($saldo, 0, ".", ".")?></td>
                                </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <th>Total</th>
                                    <td>  </td>
                                    <td>  </td>
                                    <th><?php echo "Rp. ".number_format($laporan->total, 0, ".", ".")?></th>  
                                </tr>
                            </tbody>
                        </table><br>
                        <table id="letterhead">
                            <th width="600px">
                                <div > Bagian Administrasi<br>
                                    <img src="<?php echo $admin->qr_code?>" width="90"><br>
                                    <?php echo $admin->nama_pegawai; ?><br>
                                    <?php echo $laporan->petugas_admin; ?>
                                </div>
                            </th> 
                            <th>
                                <div class="text-center">Direktur<br> 
                                    <img src="<?php echo $direktur->qr_code?>" width="90"><br>
                                    <?php echo $direktur->nama_pegawai; ?><br>
                                    <?php echo $laporan->penyetuju; ?>
                                </div>
                            </th>            
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