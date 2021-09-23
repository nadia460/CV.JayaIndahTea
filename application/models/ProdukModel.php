<?php

class ProdukModel extends CI_Model {

    function get_Product(){
        return $this->db->get("tb_produk");
    }

    function get_NameProduct(){
        return $this->db->get("tb_produk")->result();
    }

    function get_ProdukById($id){
        $this->db->where("id_produk",$id);
        return $this->db->get("tb_produk");
    }
    
    function get_idmax(){
        $this->db->select_max("id_produk");
        $this->db->from("tb_produk");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id, $prefix){

        $newId = substr($auto_id, -3);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1 ){
            $id_produk = $prefix."00" .$tambah;
        }
        else if (strlen($tambah) == 2 ){
            $id_produk = $prefix."0" .$tambah;
        }
        else if (strlen($tambah) == 3 ){
            $id_produk = $prefix .$tambah;
        }
        return $id_produk;
    }
    
    function insert_Produk($dataPD){

        return $this->db->insert("tb_produk",$dataPD);
    }

    function update_Produk($id,$dataPD){
        $this->db->where("id_produk",$id);
        return $this->db->update('tb_produk',$dataPD);
    }

    function delete_Produk($id){
        $this->db->where('id_produk',$id);
        $query = $this->db->delete('tb_produk');
        return $query;
    }    
}