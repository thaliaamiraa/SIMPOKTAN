
<body>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-image-filter-hdr"></i>                 
              </span>
              DESA
            </h3>
            
             <!-- BREADCRUMB SAMPING KANAN  -->
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span><a href="<?php echo base_url('c_user/dasboard')?>">SIMPOKTAN </a>> </span>DESA
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
                      <th><center>ID DESA</center></th>
                      <th><center>NAMA DESA</center></th>
                      <th><center>NAMA KECAMATAN</center></th>
                      <th><center>AKSI</center></th>
                  </tr>
                </thead>

                <tbody>
                         <?php 
                         $no = 1;
                         foreach ($desa as $ds) :
                         ?>
                  <tr>
                        <td><center><?php echo $no++ ?></center></td>
                        <td><?php echo $ds->id_desa ?></td>
                        <td><?php echo $ds->nama_desa ?></td>
                        <td><?php echo $ds->nama_kecamatan ?></td>
                        <td><center>
                            <!-- Detail Desa -->
                            <a href="<?php echo base_url('c_user/detail_hasil/'.$ds->id_desa."/".$ds->nama_desa)?>">
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

  