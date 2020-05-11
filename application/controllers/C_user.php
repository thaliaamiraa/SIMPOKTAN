<?php
	class C_user extends CI_Controller{

		public function dashboard(){
			$sesi_username = $this->session->userdata('username_user');

			if (isset($sesi_username)) {
				$this->load->view('V_link');
				$this->load->view('user/V_navbar');
				$this->load->view('user/V_dashboard');


			}else{
				redirect('C_login/');

			}

		}

		public function kecamatan(){
			$kecamatan =  $this->M_data->tampil_data()->result();

			//NAMPILKAN JUMLAH DESA SESUAI DESA YANG SUDAH DIINPUTKAN
			foreach ($kecamatan as $k) {
				$count_data = $this->M_data->get_where('desa',array('id_kecamatan' => $k->id_kecamatan));
				$k->jumlah_desa = count($count_data);
			}
			$data['kecamatan']    =$kecamatan;

			$kecamatan = $kecamatan[count($kecamatan)-1];
			$kecamatan = $kecamatan->id_kecamatan;
			$kecamatan = str_replace("K", "", $kecamatan);
			$kecamatan = (int)$kecamatan;
			$kecamatan ++;

			$data['id_kecamatan'] = $kecamatan;

				$this->load->view('V_link');
				$this->load->view('user/V_navbar');
				$this->load->view('user/V_kecamatan',$data);
		}


		public function desa(){
			$desa = $this->M_data->tampil_desa()->result();
			$data['desa']= $desa;
			//LIST DATA KECAMATAN
			$data['list_kecamatan'] = $this->M_data->get('kecamatan');
			
			// ID DESA OTOMATIS
			$desa = $desa[count($desa)-1];
			$desa = $desa->id_desa;
			$desa = str_replace("D", "", $desa);
			$desa = (int)$desa;
			$desa ++;
			$data['id_desa'] = $desa;
			
				$this->load->view('V_link');
				$this->load->view('user/V_navbar');
				$this->load->view('user/V_desa',$data);
		}


		public function detail_desa($id_kecamatan,$nama_kecamatan){
			$where = array('id_kecamatan' => $id_kecamatan);
			$data['desa'] = $this->M_data->get_where('desa',$where);
			$data['kecamatan'] = $this->M_data->get_where('kecamatan',$where);
			$data['nama_kecamatan'] = $nama_kecamatan;
				$this->load->view('V_link');
				$this->load->view('user/V_navbar');
				$this->load->view('user/V_detaildesa',$data);
		}

		public function hasil_pertanian(){

			$hasil_pertanian =$this->M_data->tampil_hasil()->result();

			//ID HASIL OTOMATIS
			$data['hasil_pertanian'] = $hasil_pertanian;	
			$hasil_pertanian = $hasil_pertanian[count($hasil_pertanian)-1];
			$hasil_pertanian = $hasil_pertanian->id_hasil;
			$hasil_pertanian = str_replace("H", "", $hasil_pertanian);
			$hasil_pertanian = (int)$hasil_pertanian;
			$hasil_pertanian ++;
			$data['id_hasil'] = $hasil_pertanian;	

			//ambil data id desa di tabel desa yang keisi data hasil pertaniannya
			$id_desa = $this->M_data->get_select('id_desa', 'hasil_pertanian');
			$list_id = array();

			foreach ($id_desa as $k) {
				$list_id[count($list_id)] = $k->id_desa;
			}
			

			$data[
				'list_desa'] = $this->M_data->get_desa_unik($list_id);

				$this->load->view('V_link');
				$this->load->view('user/V_navbar');
				$this->load->view('user/V_hasilpertanian',$data);
			}

		public function detail_hasil($id_desa,$nama_desa){
			$where = array('id_desa' => $id_desa);
			$data['hasil_pertanian'] = $this->M_data->get_where('hasil_pertanian',$where);
			$data['desa'] = $this->M_data->get_where('desa',$where);
			$data['nama_desa'] = $nama_desa;
				$this->load->view('V_link');
				$this->load->view('user/V_navbar');
				$this->load->view('user/V_detailhasil',$data);
		}





		public function logout(){
			session_destroy();
				redirect('C_login');

		}
	}
?>