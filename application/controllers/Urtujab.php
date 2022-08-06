<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Urtujab extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MProfil');
		$this->load->model('MUrtujab');
	}


	// Menampilkan view Urtujab KTU
	public function index()
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Data URTUJAB";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
        $data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result(); 
        $data['jabatan'] = $this->MUrtujab->get_all_data('user_role')->result(); 
		$this->template->load('layout_admin', 'urtujab/urtujab', $data);
		//echo "Selamat anda berhasil login";
	}

	// Menampilkan Halaman Tambah Tugas Jabatan
	public function tambahTugas($id_role)
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Data URTUJAB";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
        $data['jabatan'] = $this->MUrtujab->getdata_jabatan($id_role)->row_array();
		$data['count'] = $this->MUrtujab->count($id_role); 
        $data['tugas'] = $this->MUrtujab->getdata_tugas($id_role)->result();
		$this->template->load('layout_admin', 'urtujab/formTambahTugasJabatan', $data);
		//echo "Selamat anda berhasil login";
	}

}
