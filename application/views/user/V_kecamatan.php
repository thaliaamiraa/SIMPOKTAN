
<body>

      <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">  

          <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home-modern"></i>
                </span>
                  KECAMATAN
              </h3>

               <!-- BREADCRUMB SAMPING KANAN  -->
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span><a href="<?php echo base_url('c_user/dasboard')?>">SIMPOKTAN </a>> </span>KECAMATAN
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
          </div>

      <section class="content">
              <div class="card">
              <div class="card-body">
              <br>

          <table class="table-bordered table-striped" id="myTable">
                <thead>
                  <tr>
                      <th><center>No</center></th>
                      <th><center>ID KECAMATAN</center></th>
                      <th><center>NAMA KECAMATAN</center></th>
                      <th><center>JUMLAH DESA</center></th>
                      <th><center>AKSI</center></th>
                  </tr>
                </thead>

                <tbody>
                         <?php 
                         $no = 1;
                         foreach ($kecamatan as $kc) :
                         ?>
                    <tr>
                        <td><center><?php echo $no++ ?></center></td>
                        <td><?php echo $kc->id_kecamatan ?></td>
                        <td><?php echo $kc->nama_kecamatan ?></td>
                        <td><center><?php echo $kc->jumlah_desa ?></center></td>
                        
                        <td><center>
                            <!-- Detail Kecamatan -->
                            <a href="<?php echo base_url('c_user/detail_desa/'.$kc->id_kecamatan."/".$kc->nama_kecamatan)?>">
                            <button class="mdi mdi-magnify btn btn-info btn-sm">Detail</button>
                            </a>

                        </center></td>  
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