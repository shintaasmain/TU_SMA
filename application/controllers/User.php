<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('Mlogin');
	}


	// Menampilkan view dashboard KTU
	public function index()
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
        $this->template->load('layout_admin', 'user/dashboard', $data);
		//echo "Selamat anda berhasil login";
	}
}
