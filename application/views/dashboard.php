  <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script>
  <script src="https://www.chartjs.org/samples/latest/utils.js"></script>
  <style>
    canvas {
      -moz-user-select: none;
      -webkit-user-select: none;
      -ms-user-select: none;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">

        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
            <h3>
                <?php echo $Keuntungan; ?></h3>

              <p>Keuntungan Tahun <?php echo date('Y') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-check-o"></i>
            </div>
            
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>
                <?php echo $Total_Pemasukan; ?></h3>
              <p>Pemasukan Kas Tahun <?php echo date('Y') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-plus-o"></i>
            </div>
           
          </div>
        </div>
        
        <div class="col-lg-4 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $Total_Pengeluaran; ?></h3>
              <p>Pengeluaran Kas Tahun <?php echo date('Y') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            
          </div>
        </div> 
      </div>

      <div class="col-lg-12 col-xs-12">
        <div class="box">
          <div class="box-body">
            


          <div id="container" style="width: 100%;">
  <canvas id="canvas"></canvas>
 </div>

 <?php 
 //misal ada 3 dealer
 $dealer = 2;
 for($d=1;$d<=$dealer;$d++)
 {
  //kemudian misal data dari bulan 1 hingga bulan 12
  for($b=1;$b<=12;$b++)
  {
   $data[$d][$b] = rand(0,999);
  }
 }

 function random_color()
 {  
   return sprintf('#%06X', mt_rand(0, 0xFFFFFF));
 }
 ?>

 <script>
  var MONTHS = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
  var color = Chart.helpers.color;
  var barChartData = {
   labels: MONTHS,
   datasets: [
   <?php 
   for($d=1;$d<=$dealer;$d++)
   {
    $color = random_color();
   ?>
    {
     label: 'Dealer 1', 
     backgroundColor: color('<?php echo $color;?>').alpha(0.5).rgbString(),
     borderColor: '<?php echo $color;?>',
     borderWidth: 1,
     data: [
      <?php 
      for($b=1;$b<=12;$b++)
      {
       echo $data[$d][$b].",";
      }
      ?>     
     ]
     //data: [12, 19, 3, 23, 2, 3, 12, 19, 3, 23, 2, 3]
    },
   <?php 
   }
   ?>
   ]

  };

  window.onload = function() {
   var ctx = document.getElementById('canvas').getContext('2d');
   window.myBar = new Chart(ctx, {
    type: 'bar',
    data: barChartData,
    options: {
     responsive: true,
     legend: {
      position: 'top',
     },
     title: {
      display: true,
      text: 'Grafik Target Penjualan'
     }
    }
   });

  };

 </script>          




          
          </div>
        </div>
      </div>
    </section>
  
</div> 

