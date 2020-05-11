<?php 
	class C_kecamatan extends CI_Controller{

		public function index(){
			$kecamatan =  $this->M_data->tampil_data()->result();

			//NAMPILKAN JUMLAH DESA SESUAI DESA YANG SUDAH DIINPUTKAN
			foreach ($kecamatan as $k) {
				$count_data = $this->M_data->get_where('desa',array('id_kecamatan' => $k->id_kecamatan));
				$k->jumlah_desa = count($count_data);
			}

			// ID KECAMATAN OTOMATIS 
			$data['kecamatan']    =$kecamatan;

			$kecamatan = $kecamatan[count($kecamatan)-1];
			$kecamatan = $kecamatan->id_kecamatan;
			$kecamatan = str_replace("K", "", $kecamatan);
			$kecamatan = (int)$kecamatan;
			$kecamatan ++;

			$data['id_kecamatan'] = $kecamatan;

				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_kecamatan',$data);
		}

		public function tambah_kecamatan(){
			$id 	= $this->input->post('id_kecamatan');
			$nama	= $this->input->post('nama_kecamatan');
			$jml	= $this->input->post('jumlah_desa');
			$luas	= $this->input->post('luas_area');
			$kode	= $this->input->post('kode_pos');
			$almt	= $this->input->post('alamat');
			$tlp	= $this->input->post('telepon');
			$eml	= $this->input->post('email');
			
			// DATA NAMA KECAMATAN SUDAH ADA ?. Cek duplikate nama kecamatan. 
			$kecamatan = $this->M_data->get_where('kecamatan',array('nama_kecamatan'=> $nama));
			if (count($kecamatan)>0) {

				//MENAMPILKAN PERINGATAN NAMA KECAMATAN SUDAH ADA.
				$this->session->set_flashdata('warning',"Nama Kecamatan Sudah Ada");
			}else{
					$data = array(
						'id_kecamatan'		=> $id,
						'nama_kecamatan'	=> strtoupper($nama),
						'jumlah_desa'		=> $jml,
						'luas_area'			=> $luas,
						'kode_pos'			=> $kode,
						'alamat'			=> $almt,
						'telepon'			=> $tlp,
						'email'				=> $eml,
					); 

					$this->M_data->input_data('kecamatan', $data);
						
			}
				redirect('C_kecamatan');
		}

		public function hapus_kecamatan ($id_kecamatan){
				$where = array ('id_kecamatan' => $id_kecamatan);
				$this->M_data->hapus_data('kecamatan',$where);
				redirect ('c_kecamatan');
		}

		public function edit_kecamatan($id_kecamatan){
				$where = array('id_kecamatan' => $id_kecamatan);
				$data['kecamatan'] = $this->M_data->get_where('kecamatan',$where);

				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_editkecamatan',$data);
		}

		public function simpan_edit($id_kecamatan){

			$nama_kecamatan=$_POST['nama_kecamatan'];
			$jumlah_desa=$_POST['jumlah_desa'];
			$where = array('id_kecamatan' => $id_kecamatan);
			$set = array(
				'nama_kecamatan' => $nama_kecamatan,
				'jumlah_desa'	 => $jumlah_desa,
			);

				$data['kecamatan'] = $this->M_data->edit_data('kecamatan',$set,$where);
			redirect('C_kecamatan');

		}
}

 ?>