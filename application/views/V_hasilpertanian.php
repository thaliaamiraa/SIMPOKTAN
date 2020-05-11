
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
                  <span><a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a>> </span>HASIL PERTANIAN
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>
          <section class="content">
              <div class="card">
              <div class="card-body">
              <button class="btn btn-primary mdi mdi-loupe" data-toggle="modal" data-target="#exampleModal"> Tambah Data Hasil Pertanian</button>
              <br>
              <br>

          <table class="table-bordered" id="myTable">
                <thead>
                  <tr>
                      <th>No</th>
                      <th>NAMA DESA</th>
                      <th>PADI</th>
                      <th>JAGUNG</th>
                      <th>KACANG TANAH</th>
                      <th>KEDELAI</th>
                      <th><center>AKSI</center></th>
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
                        <td><center>
                            
                            <!-- Delete Data Hasil Pertanian -->
                            <a href="<?php echo base_url('c_hasilpertanian/hapus_hasil/'.$hsl->id_hasil."/".$hsl->nama_desa)?>">
                            <button class="mdi mdi-delete btn btn-danger btn-sm " onclick="javascript: return confirm('HAPUS DATA HASIL PERTANIAN ?')">Delete</button>
                            </a>

                            <!-- Edit Data Desa -->
                            <?php echo anchor('c_hasilpertanian/edit_hasil/'.$hsl->id_hasil,'<button class="mdi mdi-border-color btn btn-warning btn-sm">Edit</button>') ?>
                        </center></td>
                        
                  </tr>
                        <?php endforeach; ?>
                </tbody>
          </table>
        </section>
      </div>
    </div>

    <!-- Modal Boostrap Form Tambah Data Hasil Pertanian-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">TAMBAH DATA HASIL PERTANIAN</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form method="POST" action=" <?php echo base_url(). 'c_hasilpertanian/tambah_hasil' ?>">
              
                <div class="row">
                  
                <div class="col-md-6">
                   <div class="form-group">
                    <label>ID HASIL PERTANIAN</label>
                     <input type="text" readonly value="<?= "H".str_pad($id_hasil,3 ,"0",STR_PAD_LEFT) ?>" name="id_hasil" class="form-control">
                  </div>
          
                  <div class="form-group">
                    <label>NAMA DESA</label>
                    <select type="text" name="id_desa" class="form-control" >

                    <?php foreach ($list_desa as $ld ) { ?>
                        <option value="<?php echo $ld->id_desa ?>"><?php echo $ld->nama_desa ?></option>
                    <?php  } ?>
                  </select>
                  </div>
                  
                  <div class="form-group">
                    <label>PADI </label>
                     <input type="number" name="padi" class="form-control">
                  </div>
                </div>

                  <div class="col-md-6">
                      <div class="form-group">
                        <label>JAGUNG </label>
                         <input type="number" name="jagung" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>KACANG TANAH</label>
                         <input type="number" name="kacang_tanah" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>KEDELAI</label>
                         <input type="number" name="kedelai" class="form-control">
                      </div>
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

  