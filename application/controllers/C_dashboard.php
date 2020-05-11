<?php 
	class C_dashboard extends CI_Controller{

		public function index(){
				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_dashboard');
		}

		public function breadcrumb(){
				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_dashboard');
		}
	}
?>