<?php 
	class C_klasterisasi extends CI_Controller{

		public function index(){
			$hasil_pertanian = $this->M_data->tampil_hasil()->result();
			$datah['hasil_pertanian']= $hasil_pertanian;
		
				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_klasterisasi',$datah);
			}
		function klusterisasi(){
			$id_hasil_1 		= $_GET['hasil_1'];
			$id_hasil_2 		= $_GET['hasil_2'];

			
if(isset($id_hasil_1) AND isset($id_hasil_2)){

    // ====================== CORE DATA =======================
   
    // Klaster
    $klaster         = $this->M_data->get_arr('klaster');
 
    // ===================== Iterate Table ====================
    $data_iterasi    = array();

    $hasil_pertanian = $this->M_data->get_arr('hasil_pertanian');

    // Centroid 
    $centroid        = $klaster;
    $arr_data        = array();
    // data 
    $desa_id         = array();
    $desa_id[0]      = $id_hasil_1;
    $desa_id[1]      = $id_hasil_2;

        // tmp index
        $i =    0;
        // mencari centroid
        foreach ($centroid as $k) {
            // 
            $id_desa = $desa_id[$i];
            // Get Random Records 
            $random_data  = $this->M_data->get_where_arr('hasil_pertanian',
            				array('id_hasil' => $id_desa));
            $buil_arr     = array_merge($k,$random_data[0]);
            $arr_data[$i] = $buil_arr;
            $i++;
        }
       
        // Uji Centroid Acak
        // Nilai Unggul dan Perlu penanganan
        $data_centroid_acak = array();
        $x = 0;
        // Nilai Centroid Baru
        $nilai_centroid = $klaster;
        // Cari Centroid Data 
        $padi_cbu           = 0;
        $jagung_cbu         = 0;
        $kacang_tanah_cbu   = 0;
        $kedelai_cbu        = 0;

        // Cari Centroid Data 
        $padi_cbp           = 0;
        $jagung_cbp         = 0;
        $kacang_tanah_cbp   = 0;
        $kedelai_cbp        = 0;

        $jumlah_k1         = 0;
        $jumlah_k2         = 0;

        foreach ($hasil_pertanian as $k) {
            $tmp_centroid   = $arr_data;
            $i              = 0;
            $padi           = $this->convert_nomor($k['padi']);
            $jagung         = $this->convert_nomor($k['jagung']);
            $kacang_tanah   = $this->convert_nomor($k['kacang_tanah']);
            $kedelai        = $this->convert_nomor($k['kedelai']);
            $tmp_data       = $k;
            foreach ($tmp_centroid as $y) {
            $padi_c       = $y['padi'];
            $jagung_c     = $y['jagung'];
            $kc_c         = $y['kacang_tanah'];
            $kedelai_c    = $y['kedelai'];
            $tmp_data[$y['nama_klaster']] = $this->convert_nomor(abs(($padi-$padi_c)+($jagung-$jagung_c)+($kacang_tanah-$kc_c)+($kedelai-$kedelai_c)));
            $i++;
            }

            if ($tmp_data['Unggul'] < $tmp_data['Perlupenanganan'] ) {
                $tmp_data['kluster'] = "K1";
                $jumlah_k1 ++;
                $padi_cbu           += $this->convert_nomor($k['padi']);
                $jagung_cbu         += $this->convert_nomor($k['jagung']);
                $kacang_tanah_cbu   += $this->convert_nomor($k['kacang_tanah']);
                $kedelai_cbu        += $this->convert_nomor($k['kedelai']);

            }else if ($tmp_data['Perlupenanganan'] <= $tmp_data['Unggul']) {
                $tmp_data['kluster'] = "K2";
                $jumlah_k2 ++;
                $padi_cbp           += $this->convert_nomor($k['padi']);
                $jagung_cbp         += $this->convert_nomor($k['jagung']);
                $kacang_tanah_cbp   += $this->convert_nomor($k['kacang_tanah']);
                $kedelai_cbp        += $this->convert_nomor($k['kedelai']);
            }

            $data_centroid_acak[$x] = $tmp_data;
            $x++;
        }

        // Centroid baru push
        $xx = 0;
        foreach ($nilai_centroid as $m) {
        

            if ($m['jumlah_klaster'] == 1) {

                $nilai_centroid[$xx]['padi']         = $this->convert_nomor(($jumlah_k1 != 0 ? $padi_cbu/$jumlah_k1 : 0)) ;
                $nilai_centroid[$xx]['jagung']       = $this->convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                $nilai_centroid[$xx]['kacang_tanah'] = $this->convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                $nilai_centroid[$xx]['kedelai']      = $this->convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0)); 

            }else if ($m['jumlah_klaster'] == 2) {

                $nilai_centroid[$xx]['padi']         = $this->convert_nomor(($jumlah_k2 != 0 ? $padi_cbp/$jumlah_k2:0));
                $nilai_centroid[$xx]['jagung']       = $this->convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                $nilai_centroid[$xx]['kacang_tanah'] = $this->convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                $nilai_centroid[$xx]['kedelai']      = $this->convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0)); 
            
            }

            $xx++;
        }

        $data_iterasi[count($data_iterasi)] = array(
            'iterasi' => 1,
            'centroid_baru' => $nilai_centroid,
            'uji_centroid_acak' => $data_centroid_acak
        );
    // Starting Iterasi
        $jumlah_kestabilan=1;
        
        $centroid_baru           = $nilai_centroid;
        $data_centroid_acak_baru = $data_centroid_acak; 

        $iterate = 2;
        while ($jumlah_kestabilan != 0) {

            // Uji Centroid Acak
                // NIlai Unggul dan Perlu penanganan
                $data_centroid_acak = array();
                $x = 0;
                // Nilai Centroid Baru
                $nilai_centroid = $klaster;
                // Cari Centroid Data 
                $padi_cbu           = 0;
                $jagung_cbu         = 0;
                $kacang_tanah_cbu   = 0;
                $kedelai_cbu        = 0;

                // Cari Centroid Data 
                $padi_cbp           = 0;
                $jagung_cbp         = 0;
                $kacang_tanah_cbp   = 0;
                $kedelai_cbp        = 0;

                $jumlah_k1         = 0;
                $jumlah_k2         = 0;
                $tmp_i             = 0;

                $jumlah_stabil_sementara = 0;

                foreach ($hasil_pertanian as $k) {
                    $tmp_centroid   = $centroid_baru;
                    $i              = 0;
                    $padi           = $this->convert_nomor($k['padi']);
                    $jagung         = $this->convert_nomor($k['jagung']);
                    $kacang_tanah   = $this->convert_nomor($k['kacang_tanah']);
                    $kedelai        = $this->convert_nomor($k['kedelai']);
                    $tmp_data       = $k;

                    foreach ($tmp_centroid as $y) {
                        $padi_c       = $this->convert_nomor($y['padi']);
                        $jagung_c     = $this->convert_nomor($y['jagung']);
                        $kc_c         = $this->convert_nomor($y['kacang_tanah']);
                        $kedelai_c    = $this->convert_nomor($y['kedelai']);

                        // Pow itu pangkat dan 2 itu nilai dari pangkat sqrt, kyk implementasi di excel
                        $tmp_data[$y['nama_klaster']] = $this->convert_nomor(sqrt((pow($padi-$padi_c,2))+(pow($jagung-$jagung_c,2))+(pow($kacang_tanah-$kc_c,2))+(pow($kedelai-$kedelai_c,2))));
                        $i++;
                    }

                    if ($tmp_data['Unggul'] < $tmp_data['Perlupenanganan'] ) {

                        $tmp_data['kluster'] = "K1";
                        $jumlah_k1 ++;
                        $padi_cbu           += $this->convert_nomor($k['padi']);
                        $jagung_cbu         += $this->convert_nomor($k['jagung']);
                        $kacang_tanah_cbu   += $this->convert_nomor($k['kacang_tanah']);
                        $kedelai_cbu        += $this->convert_nomor($k['kedelai']);

                        
                    }else if ($tmp_data['Perlupenanganan'] <= $tmp_data['Unggul']) {

                        $tmp_data['kluster'] = "K2";
                        $jumlah_k2 ++;
                        $padi_cbp           += $this->convert_nomor($k['padi']);
                        $jagung_cbp         += $this->convert_nomor($k['jagung']);
                        $kacang_tanah_cbp   += $this->convert_nomor($k['kacang_tanah']);
                        $kedelai_cbp        += $this->convert_nomor($k['kedelai']);
                        
                    }

                    // Kestabilan
                    if ($tmp_data['kluster'] == $data_centroid_acak_baru[$tmp_i]['kluster']) {
                        $tmp_data['kestabilan'] = 0;
                    }else{
                        $tmp_data['kestabilan'] = 1;
                        $jumlah_stabil_sementara++;
                    }

                    $data_centroid_acak[$x] = $tmp_data;
                    $x++;
                    $tmp_i++;
                    $jumlah_kestabilan = $jumlah_stabil_sementara;
                }

            
                // Centroid baru push
                $xx = 0;
                foreach ($centroid_baru as $m) {
                    if ($m['jumlah_klaster'] == 1) {

                        $centroid_baru[$xx]['padi']         = $this->convert_nomor(($jumlah_k1 != 0 ? $padi_cbu/$jumlah_k1 : 0)) ;
                        $centroid_baru[$xx]['jagung']       = $this->convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                        $centroid_baru[$xx]['kacang_tanah'] = $this->convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0));
                        $centroid_baru[$xx]['kedelai']      = $this->convert_nomor(($jumlah_k1 != 0 ? $jagung_cbu/$jumlah_k1 : 0)); 

                    }else if ($m['jumlah_klaster'] == 2) {
                        $centroid_baru[$xx]['padi']         = $this->convert_nomor(($jumlah_k2 != 0 ? $padi_cbp/$jumlah_k2:0));
                        $centroid_baru[$xx]['jagung']       = $this->convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                        $centroid_baru[$xx]['kacang_tanah'] = $this->convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0));
                        $centroid_baru[$xx]['kedelai']      = $this->convert_nomor(($jumlah_k2 != 0 ? $jagung_cbp/$jumlah_k2:0)); 
                    }
                    $xx++;
                }

                $data_centroid_acak_baru = $data_centroid_acak;

                $data_iterasi[count($data_iterasi)] = array(
                    'iterasi' => $iterate,
                    'centroid_baru' => $centroid_baru,
                    'uji_centroid_acak' => $data_centroid_acak_baru
                );
                $iterate ++;
		        }
		    }
		    $data['data_iterasi'] = $data_iterasi;
		    $this->load->view('V_link');
				$this->load->view('V_navbar');
		    $this->load->view('V_hasil_klasterisasi',$data);
		}
 		function convert_nomor($foo){

    		return number_format((float)$foo, 2, '.', '');
		} 

    // public function print(){
        // $data['
        // ']
    // }
        
	}

 ?>