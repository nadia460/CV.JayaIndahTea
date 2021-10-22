<?php

class PegawaiModel extends CI_Model {
    function get_Pegawai(){
        return $this->db->get("tb_pegawai");
    }

    function get_PegawaiById($id){
        $this->db->where("id_pegawai",$id);
        return $this->db->get("tb_pegawai");
    }

    function get_idmax(){
        $this->db->select_max("id_pegawai");
        $this->db->from("tb_pegawai");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id, $prefix){

        $newId = substr($auto_id, -3);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1 ){
            $id_pegawai = $prefix."00" .$tambah;
        }
        else if (strlen($tambah) == 2 ){
            $id_pegawai = $prefix."0" .$tambah;
        }
        else if (strlen($tambah) == 3 ){
            $id_pegawai = $prefix .$tambah;
        }
        return $id_pegawai;
    }

    function insert_Pegawai($data){
        return $this->db->insert("tb_pegawai",$data);
    }

    function update_Pegawai($id,$data){
        $this->db->where("id_pegawai",$id);
        return $this->db->update('tb_pegawai',$data);
    }

    function delete_Pegawai($id){
        $this->db->where('id_pegawai',$id);
        $this->db->delete('tb_users');
        $this->db->where('id_pegawai',$id);
        $this->db->delete('tb_pegawai');
        
    } 
}
