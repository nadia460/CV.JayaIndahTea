  <!-- <script src="https://www.chartjs.org/dist/2.9.3/Chart.min.js"></script> -->
  <script src="<?php echo base_url('assets/admin/js/Chart.min.js') ?>"></script>


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
                <?php echo number_format($Keuntungan, 0, ".", ".")  ?></h3>

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
                <?php echo number_format($Total_Pemasukan, 0, ".", ".") ?></h3>
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
              <h3><?php echo number_format($Total_Pengeluaran, 0, ".", ".") ?></h3>
              <p>Pengeluaran Kas Tahun <?php echo date('Y') ?></p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar-minus-o"></i>
            </div>
            
          </div>
        </div> 
      </div>


      <!-- Canvas untuk Grafik
      <div class="col-lg-12 col-xs-12">
        <div class="box">
          <div class="box-body">
 
          </div>
        </div>
      </div>
      -->

    </section>
</div> 

