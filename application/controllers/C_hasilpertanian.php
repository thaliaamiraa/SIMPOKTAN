<?php 
	class C_hasilpertanian extends CI_Controller{

		public function index(){

			$hasil_pertanian =$this->M_data->tampil_hasil()->result();

			//LIST DATA DESA
			//$data['list_desa'] = $this->M_data->get('desa');

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
				$this->load->view('V_navbar');
				$this->load->view('V_hasilpertanian',$data);
			}

		public function tambah_hasil(){
			$id 	= $this->input->post('id_hasil');
			$idds	= $this->input->post('id_desa');
			$pd		= $this->input->post('padi');
			$jg		= $this->input->post('jagung');
			$kt		= $this->input->post('kacang_tanah');
			$kd		= $this->input->post('kedelai');

				//DATA NAMA DESA SUDAH ADA ?. Cek duplikate nama desa
			
			$hasil_pertanian = $this->M_data->get_where('hasil_pertanian',array('id_desa'=>$idds));
			if (count($hasil_pertanian)>0){

			//MENAMPILKAN PERINGATAN NAMA DESA SUDAH ADA
				$this->session->set_flashdata('warning',"Data Desa Hasil Pertanian Sudah Ada");
			}else{
				$data = array(
					'id_hasil'		=> $id,
					'id_desa'		=> $idds,
					'padi'			=> $pd,
					'jagung'		=> $jg,
					'kacang_tanah'	=> $kt,
					'kedelai'		=> $kd,
				
			);

					$this->M_data->input_data('hasil_pertanian', $data);
			}
				
			redirect('C_hasilpertanian');
			
		}

		public function hapus_hasil ($id_hasil){
				$where = array ('id_hasil' => $id_hasil);
				$this->M_data->hapus_data('hasil_pertanian',$where);
				redirect ('C_hasilpertanian
					');
		}

		public function detail_hasil($id_desa,$nama_desa){
			$where = array('id_desa' => $id_desa);
			$data['hasil_pertanian'] = $this->M_data->get_where('hasil_pertanian',$where);
			$data['desa'] = $this->M_data->get_where('desa',$where);
			$data['nama_desa'] = $nama_desa;
				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_detailhasil',$data);
		}



		public function edit_hasil($id_hasil){
				$where = array('id_hasil' => $id_hasil);
				$data['hasil_pertanian'] = $this->M_data->get_where('hasil_pertanian',$where);
				$data['desa'] = $this->M_data->get('desa');

				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_edithasil',$data);
		}

		public function simpan_edit($id_hasil){

			$nama_desa=$_POST['nama_desa'];
			$where = array('id_hasil' => $id_hasil);
			$set = array(
				'padi'			=> $_POST['padi'],
				'jagung'		=> $_POST['jagung'],
				'kacang_tanah'	=> $_POST['kacang_tanah'],
				'kedelai'		=> $_POST['kedelai'],
			);

				$this->M_data->edit_data('hasil_pertanian',$set,$where);
			redirect('C_hasilpertanian');

		}
	
}

 ?>