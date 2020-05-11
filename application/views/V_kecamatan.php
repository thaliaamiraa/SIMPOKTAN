
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
                    <a href="<?= site_url('C_dashboard/breadcrumb') ?>"><span>SIMPOKTAN > </span></a>KECAMATAN
                    <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
          </div>

      <section class="content">
              <div class="card">
              <div class="card-body">
              <button class="btn btn-primary mdi mdi-loupe" data-toggle="modal" data-target="#exampleModal"> Tambah Data Kecamatan</button>
              <br>
              <br>

          <table class="table-bordered" id="myTable">
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
                            <a href="<?php echo base_url('c_desa/detail_desa/'.$kc->id_kecamatan."/".$kc->nama_kecamatan)?>">
                            <button class="mdi mdi-magnify btn btn-info btn-sm">Detail</button>
                            </a>

                            <!-- Delete Data Kecamatan -->
                            <a href="<?php echo base_url('c_kecamatan/hapus_kecamatan/'.$kc->id_kecamatan."/".$kc->nama_kecamatan)?>">
                            <button class="mdi mdi-delete btn btn-danger btn-sm " onclick="javascript: return confirm('HAPUS DATA KECAMATAN ?')">Delete</button>
                            </a>

                            <!-- Edit Data Kecamatan -->
                            <?php echo anchor('c_kecamatan/edit_kecamatan/'.$kc->id_kecamatan,'<button class="mdi mdi-border-color btn btn-warning btn-sm">Edit</button>') ?>
                        </center></td>  
                    </tr>
                        <?php endforeach; ?>
                </tbody>
          </table>
        </section>
      </div>
    </div>

<!-- Modal Boostrap Form Tambah Data Kecamatan-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">TAMBAH DATA KECAMATAN</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="POST" action=" <?php echo base_url(). 'c_kecamatan/tambah_kecamatan' ?>">
              
              <div class="row">

              <div class="col-md-6">   
              <div class="form-group">
                 <!-- ID KECAMATAN OTOMATIS -->
                <label>ID KECAMATAN</label>
                 <input type="text" readonly value="<?= "K".str_pad($id_kecamatan,2 ,"0",STR_PAD_LEFT) ?>" name="id_kecamatan" class="form-control">
              </div>

              <div class="form-group">
                <label>NAMA KECAMATAN</label>
                 <input type="text" name="nama_kecamatan" class="form-control">
              </div>

              <div class="form-group">
                <label>JUMLAH DESA</label>
                 <input type="int" name="jumlah_desa" class="form-control">
              </div>

              <div class="form-group">
                <label>LUAS AREA (km2)</label>
                 <input type="text" name="luas_area" class="form-control">
              </div>
            </div>

              <div class="col-md-6">
              <div class="form-group">
                <label>KODE POS</label>
                 <input type="text" name="kode_pos" class="form-control">
              </div>

              <div class="form-group">
                <label>ALAMAT</label>
                 <input type="text" name="alamat" class="form-control">
              </div>

              <div class="form-group">
                <label>TELEPON</label>
                 <input type="text" name="telepon" class="form-control">
              </div>

              <div class="form-group">
                <label>E-MAIL</label>
                 <input type="text" name="email" class="form-control">
              </div>
            </div>
      
              <!-- Button Simpan atau Cancel-->
              <button type="reset" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Simpan</button>

            </form>
          </div>
    </div>
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

    // SESI PERINGATAN DATA SUDAH ADA
    <?php $peringatan = $this->session->flashdata('warning');
    if (isset($peringatan)) {
      echo('alert("'.$peringatan.'");');
    }
     ?>
} );
  </script>