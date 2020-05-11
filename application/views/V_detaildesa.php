<body>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
                  <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                      <i class="mdi mdi-image-filter-hdr"></i>                 
                    </span>DATA DESA
                  </h3>
                  <!-- BREADCRUMB SAMPING KANAN  -->
                  <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">
                        <span>
                          <a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a>>
                          <a href="<?php echo base_url('c_kecamatan')?>">KECAMATAN <a href="<?= site_url('c_kecamatan') ?>"><?= $nama_kecamatan ?></a> > Data Desa
                        </span>
                        <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>  
                      </li>
                    </ul>
                  </nav>
            </div>

          <section class="content">
              <div class="card">
              <div class="card-body">
                      
                
                <div class="row">
                  <div class="col-md-5">
                    <h4>KECAMATAN <?= $nama_kecamatan ?></h4>
                    <br>
                      <br>
                      <table class="table table-bordered table-striped" >
                            <tbody>
                                 <?php 
                                 foreach ($kecamatan as $kc) :
                                 ?>
                                <tr><td><b>LUAS AREA</b></td><td><?php echo $kc->luas_area ?> km2</td></tr>
                                <tr><td><b>KODE POS</b></td><td><?php echo $kc->kode_pos ?></td></tr>
                                <tr><td><b>ALAMAT</b></td><td><?php echo $kc->alamat ?></td></tr>
                                <tr><td><b>TELEPON</b></td><td><?php echo $kc->telepon ?></td></tr>
                                <tr><td><b>E-MAIL</b></td><td><?php echo $kc->email ?></td></tr>
                                <?php endforeach; ?>                        
                           </tbody>
                      </table>
                                  
                  </div>
          <br> 
          <br> 
          <br>
          
          <div class="col-md-7">
          <h4>DESA KECAMATAN <?= $nama_kecamatan ?></h4>
          <br>
              <table class="table-bordered" id="myTable2">
                <thead>
                  <tr>
                      <th><center>No</center></th>
                      <th>ID DESA</th>
                      <th>NAMA DESA</th>
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
                        
                        
                  </tr>
                        <?php endforeach; ?>

          </table>
          </div>                
          </div>                 
          

        </div>                
                

        </section>
                    
      </div>
    </div>

    <script type="text/javascript">
   $(document).ready( function () {
    $('#myTable').DataTable();
    $('#myTable2').DataTable();
} );
  </script>

