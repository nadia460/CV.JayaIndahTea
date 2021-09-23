<?php

class KasModel extends CI_Model {

    function get_Kas(){
        return $this->db->get("tb_kas");
    }

    function get_lastSaldo(){
        
        $this->db->order_by('id_kas',"desc");
        $this->db->limit(1);
        return $this->db->get('tb_kas');
    } 

    function insert_Kas($dataKas){
        return $this->db->insert("tb_kas",$dataKas);
    }

    function delete_Kas($id){
        $this->db->where("id_pemasukan",$id);
        $this->db->or_where("id_pengeluaran",$id);  
        return $this->db->delete("tb_kas");
    }
}