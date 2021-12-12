<?php

class PemasukanModel extends CI_Model {

    function get_Pemasukan(){
        return $this->db->get("tb_pemasukan");
    }

    function get_PemasukanById($id){
        $this->db->where("id_pemasukan",$id);
        return $this->db->get("tb_pemasukan");
    }

    
    
    function get_idmax(){
        $date=date('ymd'); 
        $this->db->like("id_pemasukan",$date);
        $this->db->select_max("id_pemasukan");
        $this->db->from("tb_pemasukan");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id, $prefix){

        $date=date('ymd-');      
        $newId = substr($auto_id, -3);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1 ){
            $id_pemasukan = $prefix.$date."00" .$tambah;
        }
        else if (strlen($tambah) == 2 ){
            $id_pemasukan = $prefix.$date."0" .$tambah;
        }
        else if (strlen($tambah) == 3 ){
            $id_pemasukan = $prefix.$date.$tambah;
        }
        return $id_pemasukan;
    }
    
    function insert_Pemasukan($data){

        return $this->db->insert("tb_pemasukan",$data);
    }

    function update_Pemasukan($id,$data){
        $this->db->where("id_pemasukan",$id);
        return $this->db->update('tb_pemasukan',$data);
    }

    function delete_Pemasukan($id){
        $dataPM = array(
            "id" => $id,
            "nama_pegawai" => $this->session->user->nama_pegawai
        );
        $this->db->insert("tb_arsip_hapus",$dataPM);
        $this->db->where('id_pemasukan',$id);
        $this->db->delete('tb_pemasukan');
    }

    public function count_Pemasukan(){
        $date=date('Y'); 
        $this->db->like("created_at",$date);
        $this->db->select_sum('nominal_pemasukan');
        $query = $this->db->get('tb_pemasukan');
        return $query->row()->nominal_pemasukan;
        
    }
   
}