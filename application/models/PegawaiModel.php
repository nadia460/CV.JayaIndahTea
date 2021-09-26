<?php

class PegawaiModel extends CI_Model {
    function get_Pegawai(){
        return $this->db->get("tb_pegawai");
    }

    function get_NamePegawai($id){
        $this->db->where("id_pegawai",$id);
        //$this->db->select("nama_pegawai");
        return $this->db->get("tb_pegawai");
    }
}
