<?php

class MUrtujab extends CI_Model{

    // Mendapatkan semuda data pada suatu tabel
    public function get_all_data($tabel){
        $q=$this->db->get($tabel);
        return $q;
    }

    // Mencari nama jabatan sesuai dengan id
    public function getdata_jabatan($id_role)
    {
        $this->db->select('*');
        $this->db->from('user_role');  
        $this->db->where('id_role', $id_role); 
        $query = $this->db->get();
        // var_dump($query);
        return $query;
    }
    
    // Menghitung jumlah data pada tabel Tugas
    public function count($id_role)
    {
        $query = $this->db->count_all('tugas');
        

        $this->db->select('*');
        $this->db->from('tugas');
        $this->db->join('user_role','user_role.id_role = tugas.id_role');      
        $this->db->where('tugas.id_role', $id_role); 
        $query = $this->db->count_all_results();
        var_dump($query);
        return $query;
    }

    

    // Mencari nama jabatan sesuai dengan id
    public function getdata_tugas($id_role)
    {
        $this->db->select('*');
        $this->db->from('tugas');  
        $this->db->where('id_role', $id_role); 
        $query = $this->db->get();
        // var_dump($query);
        return $query;
    }

    
    
}

?>