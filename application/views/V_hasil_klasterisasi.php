
<script src="<?= base_url('assets/js/jspdf.js') ?>"></script>
 
<div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-chart-scatterplot-hexbin"></i>                 
              </span>HASIL KLASTERISASI
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span><a href="<?= site_url('C_dashboard/breadcrumb') ?>">SIMPOKTAN </a> > <a href="<?php echo base_url('c_klasterisasi')?>">KLASTERISASI</a> > Hasil Klasterisasi</span>
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                 
                </li>
              </ul>
            </nav>
          </div>
  <section class="content">
      <div class="card">
      <div class="card-body">

      <button onclick="HTMLtoPDF()" class="mdi mdi-export btn btn-info btn-md">  EXPORT PDF</button>
     
    <div id="HTMLtoPDF">

  
    <?php
    
    $cnt_data_iterasi = count($data_iterasi);
    $i_puncak = -1;
    foreach ($data_iterasi as $k) { ?>
   
            <h1>Iterasi <?= $k['iterasi'] ?></h1>
            <h4 class="text-center">Centroid</h4>
            <table class="table table-striped table-hover" width="100%">
                <tr>
                    <th>Centroid Cluster</th>
                    <th>Padi</th>
                    <th>Jagung</th>
                    <th>Kacang tanah</th>
                    <th>Kedelai</th>
                </tr>
                <?php 
                foreach ($k['centroid_baru'] as $y) { ?>
                <tr>
                    <td><?= $y['jumlah_klaster'] ?></td>
                    <td><?= $y['padi'] ?></td>
                    <td><?= $y['jagung'] ?></td>
                    <td><?= $y['kacang_tanah'] ?></td>
                    <td><?= $y['kedelai'] ?></td>
                </tr>
               <?php }  ?>
            </table>
       
        <h4 class="text-center">Uji Centroid Acak</h4>
            <table class="table table-striped table-hover">
                <tr>
                    <th>Id Desa</th>
                    <th>Padi</th>
                    <th>Jagung</th>
                    <th>Kacang tanah</th>
                    <th>Kedelai</th>
                    <th>Unggul</th>
                    <th>Perlupenanganan</th>
                    <th>Klaster</th>
                    <th>Klaster Sebelummnya</th>
                    <th>Kestabilan</th>
                </tr>
                <?php $i_acak = 0; $k1 = 0; $k2 = 0; foreach ($k['uji_centroid_acak'] as $y) { ?>
                    <tr>
                        <td><?= $y['id_desa'] ?></td>
                        <td><?= $y['padi'] ?></td>
                        <td><?= $y['jagung'] ?></td>
                        <td><?= $y['kacang_tanah'] ?></td>
                        <td><?= $y['kedelai'] ?></td>
                        <td><?= $y['Unggul'] ?></td>
                        <td><?= $y['Perlupenanganan'] ?></td>
                        <td><?= $y['kluster'] ?></td>
                        <td><?= ($i_puncak == -1 ? "" : $data_iterasi[$i_puncak]['uji_centroid_acak'][$i_acak]['kluster']); ?></td>
                        <td><?= (isset($y['kestabilan']) ? $y['kestabilan'] : "") ?></td>
                    </tr>
               <?php 
                if ($y['kluster'] == "K1") {
                    $k1++;
                }else if ($y['kluster'] == "K2") {
                    $k2++;
                }
                $i_acak++;
            } ?>
            </table>
     <?php if($cnt_data_iterasi == $k['iterasi']): ?>
        <h1>Kesimpulan</h1>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Unggul</th>
                <th>Perlupenanganan</th>
            </tr>
            <tr>
                <td><?= $k1 ?></td>
                <td><?= $k2 ?></td>
            </tr>
        </table>
     <?php endif; ?>
  <?php  
    $i_puncak++;
    }
 ?>
    </div>

  </div>

  </div>
  </div>
  </section>
<script type="text/javascript">
  function HTMLtoPDF(){
var pdf = new jsPDF('p', 'pt', 'letter');
source = $('#HTMLtoPDF')[0];
specialElementHandlers = {
  '#bypassme': function(element, renderer){
    return true
  }
}
margins = {
    top: 10,
    left: 5,
    width: 750
  };
pdf.fromHTML(
    source // HTML string or DOM elem ref.
    , margins.left // x coord
    , margins.top // y coord
    , {
      'width': margins.width // max width of content on PDF
      , 'elementHandlers': specialElementHandlers
    },
    function (dispose) {
      // dispose: object with X, Y of the last line add to the PDF
      //          this allow the insertion of new lines after html
        pdf.save('hasil-klaster.pdf');
      }
  )   
}
</script>