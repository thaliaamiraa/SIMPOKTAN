<body>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-barley"></i>                 
              </span>DATA HASIL PERTANIAN
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">                
                  <span>
                    <a href="<?php echo base_url('c_user/dasboard')?>">SIMPOKTAN </a>>
                    <a href="<?php echo base_url('c_user/desa')?>">DESA <a href="<?= site_url('c_user/desa') ?>"><?= $nama_desa ?></a> > Data Hasil Pertanian</span>
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>

                </li>
              </ul>
            </nav>
          </div>

        <section class="content">
            <div class="card">
            <div class="card-body">
                
          <!-- Baris -->
          <div class="row"> 

              <!-- Kolom 2 dengan lebar 6 -->
              <div class="col-md-6">
              <!-- Isi Kolom 2 DATA HASIL PERTANIAN DESA-->
              <h4>DESA <?= $nama_desa ?></h4>
              <br>
              <table class="table table-bordered table-striped" >
                    <tbody>
                         <?php 
                         foreach ($hasil_pertanian as $hsl) :
                         ?>
                        <tr><td><b>PADI</b></td><td><?php echo $hsl->padi ?></td></tr>
                        <tr><td><b>JAGUNG</b></td><td><?php echo $hsl->jagung ?></td></tr>
                        <tr><td><b>KACANG TANAH</b></td><td><?php echo $hsl->kacang_tanah ?></td></tr>
                        <tr><td><b>KEDELAI</b></td><td><?php echo $hsl->kedelai ?></td></tr>
                        <?php endforeach; ?>                        
                   </tbody>
              </table>  
            </div>
          </div>
          <!-- Akhir dari baris -->

          </div>
          </div>
          </div>
        </section>
      </div>
    

    <script type="text/javascript">
   $(document).ready( function () {
    $('#myTable').DataTable();
} );
  </script>

