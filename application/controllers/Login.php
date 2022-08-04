<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Mlogin');
	}


	// Menampilkan view login
	public function index()
	{
		$this->form_validation->set_rules('username','Username', 'required|trim');	
		$this->form_validation->set_rules('password','Password', 'required|trim');

		if ($this->form_validation->run()==false){
			$this->load->view('login/form_login');
		}else{
		$this->_login();
		}
	}

	// Login
	public function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user =$this->db->get_where('user', ['username' => $username])->row_Array();
		// var_dump($user);
		// die();
		
		//Pengecekan user login ada atau tidak
		if ($user)
		{
			// Jika user aktif
			if($user['status'] == 1){

				if(md5($password) == $user['password']){
					// Menyimpan data di session
					$data = array(
						'nama_user' => $user['nama_user'],
						'id_user' => $user['id_user'],
						'username' => $user['username'],
						'id_role' => $user['id_role']
					);

					// menyimpan ke dalam session
					$this->session->set_userdata($data);
					redirect('user');
					// if ($user['id_role'] == 1) {
					// 	redirect('user/KTU');
					// } elseif ($user['id_role'] == 3) {
					// 	redirect('user/admin');
					// } else {
					// 	redirect('user/staff');
					// }

				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
					redirect ('login');
				}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak aktif</div>');
				redirect ('login');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar</div>');
			redirect ('login');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('id_role');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Anda berhasil logout</div>');
		redirect('login');
	}
}
