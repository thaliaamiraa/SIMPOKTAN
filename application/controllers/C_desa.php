<?php 
	class C_desa extends CI_Controller{

		public function index(){
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
				$this->load->view('V_navbar');
				$this->load->view('V_desa',$data);
		}

		public function tambah_desa(){
			$id 	= $this->input->post('id_desa');
			$nama	= $this->input->post('nama_desa');
			$idkec	= $this->input->post('id_kecamatan');

			
			//DATA NAMA DESA SUDAH ADA ?. Cek duplikate nama desa
			
			$desa = $this->M_data->get_where('desa',array('nama_desa'=>$nama));
			if (count($desa)>0){

				//MENAMPILKAN PERINGATAN NAMA DESA SUDAH ADA
				$this->session->set_flashdata('warning',"Nama Desa Sudah Ada");
			}else{
					$data = array(
						'id_desa'		=> $id,
						'nama_desa'		=> strtoupper($nama),
						'id_kecamatan'	=> $idkec,
					);

					$this->M_data->input_data('desa', $data);
			}
				
			redirect('C_desa');
		}

		public function hapus_desa ($id_desa){
				$where = array ('id_desa' => $id_desa);
				$this->M_data->hapus_data('desa',$where);
				redirect ('C_desa');
		}

		public function edit_desa($id_desa){
				$where = array('id_desa' => $id_desa);
				$data['desa'] = $this->M_data->get_where('desa',$where);
				$data['kecamatan'] = $this->M_data->get('kecamatan');

				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_editdesa',$data);
		}

		public function simpan_edit($id_desa){

			$nama_desa=$_POST['nama_desa'];
			$where = array('id_desa' => $id_desa);
			$set = array('nama_desa' => $nama_desa);
				$data['desa'] = $this->M_data->edit_data('desa',$set,$where);
			redirect('C_desa');

		}

		public function detail_desa($id_kecamatan,$nama_kecamatan){
			$where = array('id_kecamatan' => $id_kecamatan);
			$data['desa'] = $this->M_data->get_where('desa',$where);
			$data['kecamatan'] = $this->M_data->get_where('kecamatan',$where);
			$data['nama_kecamatan'] = $nama_kecamatan;
				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_detaildesa',$data);
		}

		

}

 ?>