<div class="content-wrapper">
          <div class="page-header">
                <h3 class="page-title">
                  <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-home-modern"></i>                 
                  </span>EDIT DATA KECAMATAN
                </h3>
                <!-- BREADCRUMB SAMPING KANAN  -->
                <nav aria-label="breadcrumb">
                  <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      <span><a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a>> <a href="<?php echo base_url('c_kecamatan')?>">KECAMATAN</a> > Edit Data Kecamatan</span>
                      <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                  </ul>
                </nav>
          </div>

	<section class="content">
		<?php foreach ($kecamatan as $kc){ ?>
			<div class="card">
			<div class="card-body">
				
			
		<form action="<?php echo base_url().'c_kecamatan/simpan_edit/'.$kc->id_kecamatan; ?>"
			method="POST">
			<br>
			
 					<div class="form-group">
                      <label for="exampleInputUsername1"><b>ID KECAMATAN : </b></label>
                      <input type="text" readonly name="id_kecamatan" class="form-control" value="<?php echo $kc->id_kecamatan ?>" id="exampleInputUsername1" placeholder="Id Kecamatan">
                    </div>
			
 					<div class="form-group">
                      <label for="exampleInputUsername2"><b>NAMA KECAMATAN : </b></label>
                      <input type="text" name="nama_kecamatan" class="form-control" value="<?php echo $kc->nama_kecamatan ?>" id="exampleInputUsername2" placeholder="Nama Kecamatan">
                    </div>

					<div class="form-group">
                      <label for="exampleInputUsername3"><b>JUMLAH DESA : </b></label>
                      <input type="int" name="jumlah_desa" class="form-control" value="<?php echo $kc->jumlah_desa ?>" id="exampleInputUsername3" placeholder="Jumlah Desa">
                    </div>
			<a href="<?php echo base_url('c_kecamatan')?>">
				<button type="button" class="btn btn-danger">CANCEL</button>
			</a>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>

		<?php } ?>
	</div>
	</div>
	</section>
	
</div>