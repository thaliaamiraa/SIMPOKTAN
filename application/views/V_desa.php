
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
                  <span><a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a>> </span>DESA
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>

          <section class="content">
              <div class="card">
              <div class="card-body">
              <button class="btn btn-primary mdi mdi-loupe" data-toggle="modal" data-target="#exampleModal"> Tambah Data Desa</button>
              <br>
              <br>
              

          <table class="table-bordered" id="myTable">
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
                            <a href="<?php echo base_url('c_hasilpertanian/detail_hasil/'.$ds->id_desa."/".$ds->nama_desa)?>">
                            <button class="mdi mdi-magnify btn btn-info btn-sm">Detail</button>
                            </a>
                            
                            <!-- Delete Data Desa -->
                            <a href="<?php echo base_url('c_desa/hapus_desa/'.$ds->id_desa."/".$ds->nama_desa)?>">
                            <button class="mdi mdi-delete btn btn-danger btn-sm " onclick="javascript: return confirm('HAPUS DATA DESA ?')">Delete</button>
                            </a>

                            <!-- Edit Data Desa -->
                            <?php echo anchor('c_desa/edit_desa/'.$ds->id_desa,'<button class="mdi mdi-border-color btn btn-warning btn-sm">Edit</button>') ?>
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
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">TAMBAH DATA DESA</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
            <form method="POST" action=" <?php echo base_url(). 'c_desa/tambah_desa' ?>">
              
              <!-- ID DESA OTOMATIS -->
              <div class="form-group">
                <label>ID DESA</label>
                 <input type="text" readonly value="<?= "D".str_pad($id_desa,3 ,"0",STR_PAD_LEFT) ?>" name="id_desa" class="form-control">
              </div>
        
              <div class="form-group">
                <label>NAMA DESA</label>
                 <input type="text" name="nama_desa" class="form-control">
              </div>

              <div class="form-group">
                <label>NAMA KECAMATAN</label>
                <select name="id_kecamatan" class="form-control">
                  
                  <?php foreach ($list_kecamatan as $lk ) { ?>
                    <option value="<?php echo $lk->id_kecamatan ?>"><?php echo $lk->nama_kecamatan ?></option>
                <?php  } ?>
                </select>

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

  