<!DOCTYPE html>
<html>
<head> 
    <!-- CSS -->
    <style>

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

            #notabody th {
                text-align: left;
                font-family: "Times New Roman";
                font-weight: normal;
                font-size: 11;
            }  

            #notahead{
                font-family: "Times New Roman";
                width: 100%;
                text-align: left;
                text-align: center;
                font-size: 14;
                border: 1px solid black;
                padding-top: 5px;
                padding-bottom: 5px;
            }

            #notafoot{
                padding-left: 500px;
                width: 100%;   
            }

            #notafoot th {
                
                text-align: center;
                font-weight: normal;
                font-size: 11;
            }   
            
        </style>
</head>

<body>
    <table id="letterhead">
        <th width="230px">
            <img src="assets/images/LOGO.jpg" width="230"> 
        </th> 
        <th>
            <div> 
            <p> JL. Surakerta, Nengkelan RT 001 RW 006 Ciwidey, Kabupaten Bandung (Kode Pos : 40973)
                <br> E-mail: harissusanto573@gmail.com </p>
            </div>
        </th>
    </table> 

    <hr style ="border-top: 3px solid black;">
   

    <table id="notahead"> 
        <th>
            <div> TANDA BUKTI PEMBAYARAN </div>
        </th>
    </table> 

    <p> No : <?php echo $record->id_pemasukan; ?></p>  

    <!--  --> 
    <table id="notabody">
        <th width="150px">
            <p> Nama Barang </p>
            <p> Dari </p>
            <p> Kepada </p>
            <p> Berat Barang </p>
            <p> Harga per-kilogram </p>
            <p> Nominal Pembayaran</p>
        </th> 
        <th> 
            <p> : <?php echo $record->nama_produk; ?></p>
            <p> : CV. Jaya Indah Tea </p>
            <p> : <?php echo $record->tujuan_kirim; ?></p>
            <p> : <?php echo $record->berat; ?> Kg </p>
            <p> : <?php echo "Rp. ".number_format($record->harga_per_kg, 0, ".", ".")?></p>
            <p> : <?php echo "Rp. ".number_format($record->nominal_pemasukan, 0, ".", ".")?></p>
        </th>
    </table> 
    <hr style ="border-top: 3px solid black;">


    <table id="notafoot">
        <th>
            <div> 
                <p> Bandung, <?php echo tanggal() ?></p>
                <p><br> 
                <img src="<?php echo $this->session->user->qr_code?>" width="100">
                <br> 
                <?php echo $this->session->user->nama_pegawai ?><br>       
                <?php echo $this->session->user->hak_akses ?></p>
            </div>
        </th>
    </table>
</body>

</html>