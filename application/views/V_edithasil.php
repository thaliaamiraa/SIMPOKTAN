<body>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-barley"></i>                 
              </span>
              EDIT HASIL PERTANIAN
            </h3>

             <!-- BREADCRUMB SAMPING KANAN  -->
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span>
                    <a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a>> 
                    <a href="<?php echo base_url('c_hasilpertanian')?>">HASIL PERTANIAN</a> > Edit Data HasiL Pertanian
                  </span>
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
          </div>

      <section class="content">
        <?php foreach ($hasil_pertanian as $hsl){ ?>
          <div class="card">
          <div class="card-body">
               
        <form action="<?php echo base_url().'c_hasilpertanian/simpan_edit/'.$hsl->id_hasil; ?>"
          method="POST">
          <br>
          <div class="form-group">
                      <label for="exampleInputUsername1">ID HASIL : </label>
                      <input type="text" readonly name="id_hasil" class="form-contol" value="<?php echo $hsl->id_hasil ?>" id="exampleInputUsername1" placeholder="Id Hasil">
                    </div>
          <div class="form-group">
                      <label for="exampleInputUsername2">NAMA DESA : </label>
                      <input type="text" name="id_desa" class="form-control" value="<?php echo $hsl->id_desa ?>" id="exampleInputUsername2" placeholder="Nama Desa">
                    </div>
          <div class="form-group">
                      <label for="exampleInputUsername3">PADI : </label>
                      <input type="number" name="padi" class="form-control" value="<?php echo $hsl->padi ?>" id="exampleInputUsername3" placeholder="Total Poduksi Padi">
                    </div>
          <div class="form-group">
                      <label for="exampleInputUsername4">JAGUNG : </label>
                      <input type="number" name="jagung" class="form-control" value="<?php echo $hsl->jagung ?>" id="exampleInputUsername4" placeholder="Total Poduksi jagung">
                    </div>
          <div class="form-group">
                      <label for="exampleInputUsername5">KACANG TANAH : </label>
                      <input type="number" name="kacang_tanah" class="form-control" value="<?php echo $hsl->kacang_tanah ?>" id="exampleInputUsername5" placeholder="Total Poduksi Kacang Tanah">
                    </div>
          <div class="form-group">
                      <label for="exampleInputUsername6">KEDELAI : </label>
                      <input type="number" name="kedelai" class="form-control" value="<?php echo $hsl->kedelai ?>" id="exampleInputUsername6" placeholder="Total Poduksi Kedelai">
                    </div>

      <a href="<?php echo base_url('c_hasilpertanian')?>">
        <button type="button" class="btn btn-danger">CANCEL</button>
      </a>
      <button type="submit" class="btn btn-primary">SIMPAN</button>
    </form>

    <?php } ?>
  </div>
  </div>
  </section>
  
</div>
