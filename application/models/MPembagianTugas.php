<?php

class MPembagianTugas extends CI_Model{

    public function get_all_data($tabel){
        $q=$this->db->get($tabel);
        return $q;
    }
    
    public function insert($tabel, $data)
    {
        $this->db->insert($tabel, $data);
    }

    public function cekfile()
    {
        
        $query = $this->db->count_all('pembagian_tugas');;
        // var_dump($query);
        return $query;
    }

    public function download($id_pembagian_tugas){
        $query = $this->db->get_where('pembagian_tugas',array('id_pembagian_tugas'=>$id_pembagian_tugas));
        return $query->row_array();
       }

    

}

?>