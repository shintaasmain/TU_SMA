<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MProfil');
	}


	// TAMPIL HALAMAN PROFIL
	public function index()
	{
        if(empty($this->session->userdata('username'))){
			redirect('login');
		}
		$data['title'] = "Profilku";
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('nama_user')])-> row_array();
		$data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();
		$this->template->load('layout_admin', 'profil/profil', $data);
	}

	// UBAH PROFIL
    public function ubahProfil()
    {
        if(empty($this->session->userdata('username'))){
			redirect('login');
		}
        $data['title'] = 'Ubah Profil';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();
		

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('nip', 'NIP', 'required|numeric', [
            'required' => 'NIP tidak boleh kosong',
            'numeric' => 'NIP harus angka',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email', [
            'required' => 'Email tidak boleh kosong',
            'valid_email' => 'Email tidak valid',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required', [
            'required' => 'Alamat tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('no_telepon', 'No_telepon', 'required|numeric', [
            'required' => 'No Telepon tidak boleh kosong',
            'numeric' => 'No Telepon harus angka',
        ]);

        if ($this->form_validation->run() == false) {
            $this->template->load('layout_admin', 'profil/edit_profil', $data);
        } else {
            $id_user = $this->input->post('id_user');
            $nama_user = $this->input->post('nama');
            $nip = $this->input->post('nip');
            $email = $this->input->post('email');
            $alamat = $this->input->post('alamat');
            $no_telepon = $this->input->post('no_telepon');

			  // Cek jika ada gambar yang ingin di upload
			  $upload_image = $_FILES['foto'];
			//   var_dump($upload_image);
			//   die;
			  if ($upload_image) {
				  $config['allowed_types'] = 'gif|jpg|png';
				  $config['max_size'] = '2048';
				  $config['upload_path'] = './foto_profil/';
  
				  $this->load->library('upload', $config);
  
				  if ($this->upload->do_upload('foto')) {
					  // Supaya gambar lama tidak terhapus
					  $old_image = $data['user']['foto'];
					  if ($old_image != 'default.jpg') {
						  unlink(FCPATH . 'foto_profil/' . $old_image);
					  }
					  $new_image = $this->upload->data('file_name');
					  $this->db->set('foto', $new_image);
				  } else {
					  echo $this->upload->display_errors();
				  }
			  }
  
			
            $this->db->set('nama_user', $nama_user);
            $this->db->set('nip', $nip);
            $this->db->set('email', $email);
            $this->db->set('alamat', $alamat);
            $this->db->set('no_telepon', $no_telepon);
            $this->db->where('id_user', $id_user);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Berhasil diupdate</div>');
            redirect('profil/');
        }
    }


	// UBAH PASSWORD
    public function ubahPassword()
    {
        if(empty($this->session->userdata('username'))){
			redirect('login');
		}
        $data['title'] = 'Ubah Password';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
		$data['profil'] = $this->MProfil->getdataprofil($this->session->userdata('id_user'))->result();
		
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim', ['required' => 'Password lama tidak boleh kosong!']);
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[3]|matches[konfirmasi_password]', ['required' => 'Password baru tidak boleh kosong!', 'min_length' => 'Password baru tidak boleh kurang dari 3 Karakter!', 'matches' => 'Password baru tidak sama dengan konfirmasi password!']);
        $this->form_validation->set_rules('konfirmasi_password', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password_baru]', ['required' => 'Konfirmasi Password tidak boleh kosong!', 'min_length' => 'Konfirmasi password tidak boleh kurang dari 3 Karakter!', 'matches' => 'Konfirmasi password tidak sama dengan password baru  !']);

        if ($this->form_validation->run() == false) {
            $this->template->load('layout_admin', 'profil/edit_password', $data);
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');

            if ((md5($password_lama) != $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password lama salah!</div>');
                redirect('profil/ubahPassword');
            } else {
                if ($password_lama == $password_baru) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Password baru tidak boleh sama dengan password lama!!</div>');
                    redirect('profil/ubahPassword');
                } else {
                    // password sudah oke
                    $password_md5 = md5($password_baru);

                    $this->db->set('password', $password_md5);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Ubah password berhasil</div>');
                    redirect('profil/ubahPassword');
                }
            }
        }
    }

}
