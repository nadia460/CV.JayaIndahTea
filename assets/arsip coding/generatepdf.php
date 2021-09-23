<!DOCTYPE html>
<html>
<head> 
    <!-- CSS -->
    <style>
            #table {
                font-family: "Times New Roman";
                font-size: 10;
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
                font-size: 14;
            }

            #letterhead p {
                font-weight: normal;
                font-size: 11;
            }  


        </style>
</head>

<body>
    <table id="letterhead">
        <th width="230px">
            <br><img src="assets/images/LOGO.jpg" width="230"> 
        </th> 
        <th>
            <div> LAPORAN PEMASUKAN KAS
            <p> JL. Surakerta, Nengkelan RT 001 RW 006 Ciwidey, Kabupaten Bandung (Kode Pos : 40973)
                <br> E-mail: harissusanto573@gmail.com </p>
            </div>
        </th>
    </table> 

    <hr style ="border-top: 3px solid black;">
    <p> Tanggal <tab>: <?php echo tanggal() ?> <br>
        Petugas <tab>: <?php echo $this->session->user->name ?>
    </p>

    <!-- Tabel Akun Users -->
    <table id="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Tujuan Kirim</th>
                <th>Berat (Kg)</th>
                <th>Nominal (Rp.)</th>
                <th>Tanggal</th>                              
            </tr>
        </thead>

        <tbody>
            <?php foreach ($dataPM->result() as $record) : ?>
            <tr>
                <!-- Memanggil Value pada Tabel Users -->
                <td><?php echo $record->id_pemasukan;?></td>
                <td><?php echo $record->nama_barang;?></td>
                <td><?php echo $record->tujuan;?></td>
                <td><?php echo $record->berat_barang_pm;?></td>
                <td><?php echo $record->nominal_pemasukan;?></td>
                <td><?php echo $record->created_at;?></td>                  
            </tr>                      
            <?php endforeach; ?>
        </tbody>

        <tfoot>
            <tr>
                <th>ID</th>
                <th>Nama Barang</th>
                <th>Tujuan Kirim</th>
                <th>Berat (Kg)</th>
                <th>Nominal (Rp.)</th>
                <th>Tanggal</th>                    
            </tr>
        </tfoot>

    </table>
</body>

</html>