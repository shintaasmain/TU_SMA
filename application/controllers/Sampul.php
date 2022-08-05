<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sampul extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MProfil');
	}


	// Menampilkan view sampul
	public function index()
	{
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Download Sampul";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
        $data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();
		$this->template->load('layout_admin', 'sampul/sampul', $data);
		//echo "Selamat anda berhasil login";
	}

	// Digunakan untuk export PDF
	public function pdf()
    {
		if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Sampul";
        $this->load->library('dompdf_gen');
        $data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();;

        $this->load->view('sampul/exportPDF_sampul', $data);

        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Sampul.pdf", array(' Attachment' => 0));
    }

}
