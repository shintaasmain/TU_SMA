<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PembagianTugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MProfil');
		$this->load->model('MPembagianTugas');
	}


	// Menampilkan view halaman upload file
	public function index()
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Upload File";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
        $data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();
		$data['cekfile'] = $this->MPembagianTugas->cekfile();
		$data['file'] = $this->MPembagianTugas->get_all_data('pembagian_tugas')->row_array();
		$this->template->load('layout_admin', 'pembagian_tugas/uploadFile', $data);
		//echo "Selamat anda berhasil login";
	}

	// Upload file pembagian tugas
	public function uploadfile()
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$config['upload_path']  		= './file_pembagiantugas/';
		$config['allowed_types']  		= 'pdf';  
		$config['max_size']             = '0';

		$this->load->library('upload',$config);
		
		//var_dump($this->upload->do_upload('nama_file'));
			if(!$this->upload->do_upload('nama_file')){
				echo "Masukkan gambar dulu ya";
			}else{
				$nama_file= $this->upload->data();
				$nama_file = $nama_file['file_name'];
				$data = array(
					'nama_file' => $nama_file,
				);
				// var_dump($data);
				$this->MPembagianTugas->insert('pembagian_tugas', $data);
				redirect('pembagiantugas/');
			}
	}

	// Update file pembagian tugas
	public function updatefile()
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$id_pembagian_tugas = $this->input->post('id_pembagian_tugas');
		if ($_FILES != null){
			$this->updatefilepembagiantugas($id_pembagian_tugas);
		}
	}

	// Update file pembagian tugas
	public function updatefilepembagiantugas($id_pembagian_tugas)
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$config['upload_path']  		= './file_pembagiantugas/';
		$config['allowed_types']  		= 'pdf';  
		$config['max_size']             = '0';

		$this->load->library('upload',$config);
		//var_dump($this->upload->do_upload('nama_file'));
		if (!empty($_FILES['nama_file']['name'])){
			if($this->upload->do_upload('nama_file')){
				$nama_file= $this->upload->data();
				// replace nama_file lama
				$item = $this->db->where('id_pembagian_tugas', $id_pembagian_tugas)->get('pembagian_tugas')->row();
				unlink(FCPATH . 'file_pembagiantugas/' .$item->nama_file);
				
				$data['nama_file'] = $nama_file['file_name'];

				$this->db->where('id_pembagian_tugas', $id_pembagian_tugas);
				$this->db->update('pembagian_tugas', $data);
				redirect('pembagiantugas/');
		}
		
	}
}

// Menampilkan view halaman download file
public function downloadFile()
{
	if(empty($this->session->userdata('username'))){
		redirect('login');
	}
	$data['title'] = "Download File";
	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
	$data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();
	$data['cekfile'] = $this->MPembagianTugas->cekfile();
	$data['file'] = $this->MPembagianTugas->get_all_data('pembagian_tugas')->row_array();
	$this->template->load('layout_admin', 'pembagian_tugas/downloadFile', $data);
	//echo "Selamat anda berhasil login";
}

// Download File 
public function download($id)
{
	if(empty($this->session->userdata('username'))){
		redirect('login');
	}
	$this->load->helper('download');
    $fileinfo = $this->MPembagianTugas->download($id);
    $file = './file_pembagiantugas/'.$fileinfo['nama_file'];
    force_download($file, NULL);
}


	
}
