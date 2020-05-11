<?php
	class C_login extends CI_Controller{

		public function index (){

			$sesi_username = $this->session->userdata('username');

			if (isset($sesi_username)) {
				
				redirect('C_login/dashboard');
			}

			$this->load->view('V_link');
			$this->load->view('V_login');
		
		}
		public function proses_login (){
			$username = $_POST ['username'];
			$password = $_POST ['password'];
			
			$where    = "username='$username' AND password='$password'";
			$data 	  = $this->M_data->get_where("login",$where);

			if (count($data) > 0) {
				
				if ($data[0]->level == "admin") {
					$array  = array(
						'username' => $username,
						'level'    => $data[0]->level
					);

					$this->session->set_userdata($array);

					redirect('C_login/dashboard');

				}else if($data[0]->level == "user"){
					$array  = array(
						'username_user' => $username,
						'level'    => $data[0]->level
					);

					$this->session->set_userdata($array);
					redirect('C_user/dashboard');
				}
				
			}else{
				redirect('C_login/');
				
			}
		
		}

		public function dashboard(){
			$sesi_username = $this->session->userdata('username');

			if (isset($sesi_username)) {
				

				$this->load->view('V_link');
				$this->load->view('V_navbar');
				$this->load->view('V_dashboard');


			}else{
				redirect('C_login/');

			}

		}



		public function logout(){
			session_destroy();
				redirect('C_login');

		}
	}
?>