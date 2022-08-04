<?php

class MProfil extends CI_Model{

	public function get_all_data($tabel){
        $q=$this->db->get($tabel);
        return $q;
    }

    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id)
    {
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id)
    {
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }
    public function delete($where, $table)
    {
        $this->db->where($where);
		$this->db->delete($table);
    }
    
    // Model untuk get data profil sesuai dengan user yang login
    public function getdataprofil($id_user)
	{
		$this->db->select('*, user_role.nama_jabatan');
		$this->db->from('user');
		$this->db->join('user_role','user_role.id_role = user.id_role');
		$this->db->where('id_user', $id_user);
        $query = $this->db->get();
        return $query;
	}


}

?>