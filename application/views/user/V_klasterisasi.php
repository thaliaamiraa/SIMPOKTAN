
<div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-chart-scatterplot-hexbin"></i>                 
              </span>KLASTERISASI
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span><a href="<?php echo base_url('c_user/dasboard')?>">SIMPOKTAN </a> > KLASTERISASI</a></span>
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                 
                </li>
              </ul>
            </nav>
          </div>
  <section class="content">
      <div class="card">
      <div class="card-body">
      
              <br>
        
      
    <form action="<?= base_url('C_klasterisasi_user/klusterisasi') ?>" method="GET">
      <br>

          <div class="form-group">
                      <label for="exampleInputUsername1">UNGGUL (Id Hasil) </label>
                      <input type="text" id="data_1" name="hasil_1" class="form-control">
                    </div>

          <div class="form-group">
                      <label for="exampleInputUsername3">PERLU PENANGANAN (Id Hasil) : </label>
                      <input type="text" id="data_2" name="hasil_2" class="form-control">
                    </div>
      <button type="submit" class="btn btn-primary">KIRIM</button>
    </form>
<br>
<table class="table table-striped table-bordered" id="myTable">
                <thead>
                  <tr>
                      <th>NO</th>
                      <th>ID HASIL PERTANIAN</th>
                      <th>NAMA DESA</th>
                      <th>PADI</th>
                      <th>JAGUNG</th>
                      <th>KACANG TANAH</th>
                      <th>KEDELAI</th>
                      <th>AKSI</th>
                  </tr>
                </thead>

                <tbody>
                  <?php 
                  $no=1;
                  foreach($hasil_pertanian as $ds){
                   ?>
                      
                  <tr>
                      <td><center><?php echo $no++ ?></center></td>
                      <td><?php echo $ds->id_hasil ?></td>
                      <td><?php echo $ds->nama_desa ?></td>
                       <td><?php echo $ds->padi?></td>
                       <td><?php echo $ds->jagung?></td>
                       <td><?php echo $ds->kacang_tanah?></td>
                       <td><?php echo $ds->kedelai?></td>
                       <td><button class="btn btn-primary btn-sm mdi mdi-loupe" onClick="pilih_centroid('<?= $ds->id_hasil?>')"></button></td>
    
                        
                  </tr>
                  <?php } ?>
                </tbody>
          </table>

  </div>
  </div>
  </section>

<!-- Modal Boostrap Form Tambah Data Kecamatan-->
<div class="modal fade" id="pilih" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pilih Kelas Centroid Acak</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6 text-center">
                <button class="btn btn-success" onclick="push_data_1()">Unggul</button>
            </div>
            <div class="col-md-6 text-center">
                <button class="btn btn-danger" onclick="push_data_2()">Perlupenanganan</button>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
var tmp_data = "";
  function pilih_centroid(id_hasil){
    tmp_data = id_hasil;
    $('#pilih').modal('show');
  }

  function push_data_1(hasil){
      $('#data_1').val(tmp_data)
    $('#pilih').modal('hide');

  }
  function push_data_2(id){
      $('#data_2').val(tmp_data);
    $('#pilih').modal('hide');

  }
</script>



 <!-- JS BUAT PAGINATION DLL -->
  <script type="text/javascript">
    $('.edit').click(function(){
      $('#exampleModal').modal();
      var hasil = $(this).attr('id_hasil')
      $('#hasil').val(hasil)
    })

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