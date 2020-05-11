<?php
class M_data extends CI_Model{

	//get = semua data yang diambil dari db tersebut
	public function get($nama_table){
		return $this->db->get($nama_table)->result();
	}

	//get_where = tampil data dengan spesifikasi tertentu. 
	public function get_where($nama_table,$where){
		return $this->db->get_where($nama_table,$where)->result();
	}

	//menyambungkan controller deangan view untuk tambah data
	public function input_data($nama_table,$data) {
		$this->db->insert($nama_table,$data);
		return $this->db->affected_rows();
	}

	//menyambungkan controller deangan view untuk hapus data
	public function hapus_data($table,$where){
		$this->db->where($where);
		$this->db->delete($table);
	}

	//menyambungkan controller deangan view untuk edit data
	public function edit_data($table,$set,$where){
		return $this->db->update($table,$set,$where);

	}

							//KECAMATAN
	public function tampil_data(){
			return $this->db->get('kecamatan');
	}

							//DESA
	public function tampil_desa(){
		return $this->db->get_where('desa,kecamatan','desa.id_kecamatan=kecamatan.id_kecamatan');
	}

							//HASIL PERTANIAN
	public function tampil_hasil(){
		return $this->db->get_where('hasil_pertanian,desa','hasil_pertanian.id_desa=desa.id_desa');
	}

	// hanya menampilkan desa yang belum terisi data hasil pertaniannya
	public function get_desa_unik($arr){
		$this->db->where_not_in('id_desa', $arr);
		return $this->db->get('desa')->result();
	}

							// KLASTERISASI
	function get_arr($nama_table){
		return $this->db->get($nama_table)->result_array();
	}
	function get_where_arr($nama_table,$where){
		return $this->db->get_where($nama_table,$where)->result_array();
	}


	public function get_max_kecamatan(){

		return $this->db->get('kecamatan')->num_rows();
	}

	public function get_max_desa(){

		return $this->db->get('desa')->num_rows();
	}
	public function get_desc_kecamatan(){
		$this->db->order_by('id_kecamatan','desc');
		return $this->db->get('kecamatan')->result();
	}

	public function get_select($select,$nama_table){
		$this->db->select($select);
		return $this->db->get($nama_table)->result();
	}


}
 ?>
