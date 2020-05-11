<div class="content-wrapper">
	<div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home-modern"></i>                 
              </span>EDIT DATA DESA
            
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span>
                  	<a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a>>
                  	<a href="<?php echo base_url('c_desa')?>">DESA</a> > Edit Data Desa
                  </span>
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                 
                </li>
              </ul>
            </nav>
          </div>

	<section class="content">
		<?php foreach ($desa as $ds){ ?>
			<div class="card">
			<div class="card-body">
				
			
		<form action="<?php echo base_url().'c_desa/simpan_edit/'.$ds->id_desa; ?>"
			method="POST">
			<br>
					
					<div class="form-group">
                      <label for="exampleInputUsername2">ID DESA : </label>
                      <input type="text" readonly name="id_desa" class="form-contol" value="<?php echo $ds->id_desa ?>" id="exampleInputUsername2" placeholder="Id Desa">
                    </div>

 					<div class="form-group">
                      <label for="exampleInputUsername1">NAMA DESA : </label>
                      <input type="text" name="nama_desa" class="form-control" value="<?php echo $ds->nama_desa ?>" id="exampleInputUsername1" placeholder="Username">
                    </div>
                   

	              <div class="form-group">
	                <label>NAMA KECAMATAN</label>
	                <select name="id_kecamatan" class="form-control" value="<?php echo $ds->id_kecamatan ?>">
	                <?php foreach ($kecamatan as $ld ) { ?>
	                    <option value="<?php echo $ld->id_kecamatan ?>" <?= ($ld->id_kecamatan == $ds->id_kecamatan ? "selected":"") ?>><?php echo $ld->nama_kecamatan ?></option>
	                <?php  } ?>
	              </select>
	              </div>

			<a href="<?php echo base_url('c_desa')?>">
				<button type="button" class="btn btn-danger">CANCEL</button>
			</a>
			<button type="submit" class="btn btn-primary">SIMPAN</button>
		</form>

		<?php } ?>
	</div>
	</div>
	</section>
	
</div>