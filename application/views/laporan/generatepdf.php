<!DOCTYPE html>
<html>
<head> 
    <!-- CSS -->
    <style>
            #table {
                font-family: "Times New Roman";
                font-size: 11;
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
            <div> LAPORAN ARUS KAS
            <p> Periode </p>
            </div>
        </th>
    </table> 

    <hr style ="border-top: 3px solid black;"><br>
   

    <!-- Tabel Akun Users -->
    <table id="table">


        <tbody>
            <tr>
                <th></th>
                <th> Nominal </th>
            </tr>
            <tr>
                <th>Pemasukan Kas</th>
                <td>  </td>
                
            </tr>
            <tr>
                <td>Pembelian Barang</td>
                <td>  </td>
            </tr>
            <tr>
                <th>Pengeluaran Kas</th>
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
                <td>Biaya Penyusutan</td>  
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
    <table id="notafoot">
        <th>
            <div> 
                <p> Bandung, <?php echo tanggal() ?></p>
                <br>
                <p> <?php echo $this->session->user->name ?><br>
                <?php echo $this->session->user->role ?></p>
            </div>
        </th>
    </table> 
</body>

</html>