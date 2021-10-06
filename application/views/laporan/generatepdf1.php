<!DOCTYPE html>
<html>
<head> 
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/libs/bootstrap/css/bootstrap.min.css') ?>">
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
    <table id="letterhead">
        <th width="380px">
           <div class="text-right">
                <img src="<?php echo base_url('assets/images/LOGO.jpg')?>" width="200"> 
            </div>
        </th> 
         <th>
            <div class="text-left"> LAPORAN ARUS KAS  
                <p>Periode <?php echo $laporan->periode; ?><br></p>
            </div>
        </th>  
    </table>

    <hr style ="border-top: 3px solid black;">
    <p name='id_laporan'> 
        ID Laporan &emsp;: <?php echo $laporan->id_laporan; ?>
    </p>

    <!-- Tabel Akun Users -->
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
            <?php foreach ($laporanPK->result() as $record2) : ?>
            <tr>       
                <td><?php echo $record2->kategori_pengeluaran;?></td>
                <td><?php echo $record2->nominal_pengeluaran;?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <th>Total</th>
                <th><?php echo $laporan->total;?></th>  
            </tr>
        </tbody>
    </table><br>
    <table id="letterhead">
        <th width="350px">
            <div> Bagian Administrasi<br>
                <img src="<?php echo $admin->qr_code?>" width="90"><br>
                <?php echo $admin->nama_pegawai; ?><br>
                <?php echo $laporan->petugas_admin; ?>
            </div>
        </th> 
        <th>
            <div>Direktur<br> 
            </div>
        </th>            
    </table>  
</body>

</html>