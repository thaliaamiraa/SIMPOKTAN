
<body>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-barley"></i>                 
              </span>
              HASIL PERTANIAN
            </h3>

             <!-- BREADCRUMB SAMPING KANAN  -->
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span><a href="<?php echo base_url('c_user/dasboard')?>">SIMPOKTAN </a>> </span>HASIL PERTANIAN
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <section class="content">
              <div class="card">
              <div class="card-body">
              <br>
              <br>

          <table class="table-bordered table-striped" id="myTable">
                <thead>
                  <tr>
                      <th><center>No</center></th>
                      <th><center>NAMA DESA</center></th>
                      <th><center>PADI</center></th>
                      <th><center>JAGUNG</center></th>
                      <th><center>KACANG TANAH</center></th>
                      <th><center>KEDELAI</center></th>
                  </tr>
                </thead>

                <tbody>
                         <?php 
                         $no = 1;
                         foreach ($hasil_pertanian as $hsl) :
                         ?>
                  <tr>
                        <td><center><?php echo $no++ ?></center></td>
                        <td><?php echo $hsl->nama_desa ?></td>
                        <td><center><?php echo $hsl->padi ?></center></td>
                        <td><center><?php echo $hsl->jagung ?></center></td>
                        <td><center><?php echo $hsl->kacang_tanah ?></center></td>
                        <td><center><?php echo $hsl->kedelai ?></center></td>
                        
                  </tr>
                        <?php endforeach; ?>
                </tbody>
          </table>
        </section>
      </div>
    </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- JS BUAT PAGINATION DLL -->
  <script type="text/javascript">
   $(document).ready( function () {
    $('#myTable').DataTable();

} );
  </script>

  