<?php

class KategoriModel extends CI_Model {

    

    function get_KategoriPemasukan(){
        return $this->db->get("tb_kategori_pemasukan");
    }

    function get_KategoriPengeluaran(){
        return $this->db->get("tb_kategori_pengeluaran");
    }

    function get_KategoriById($id){
        $kode_jenis = substr($id, 0,4);
        if($kode_jenis=="K-PK"){
            $this->db->where("id_kategori",$id);
            $query =  $this->db->get("tb_kategori_pengeluaran");
            
        }else{
            $this->db->where("id_kategori",$id);
            $query =  $this->db->get("tb_kategori_pemasukan");
        }
        return $query;
    }

    function get_idmax(){
        if($this->input->post("kategori")=="Pemasukan Kas"){
            $this->db->select_max("id_kategori");
            $this->db->from("tb_kategori_pemasukan");
            $query = $this->db->get();    
        }else{
            $this->db->select_max("id_kategori");
            $this->db->from("tb_kategori_pengeluaran");
            $query = $this->db->get();
        }  
        return $query;    
    }
    function insert_Kategori($data){
        if($this->input->post("kategori")=="Pemasukan Kas"){
            $query = $this->db->insert("tb_kategori_pemasukan",$data);       
        }else{
            $query = $this->db->insert("tb_kategori_pengeluaran",$data);
        }
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

    function update_Kategori($id,$data){
        $kode_jenis = substr($id, 0,4);
        if($kode_jenis=="K-PK"){
            $this->db->where('id_kategori',$id);
            $query = $this->db->update('tb_kategori_pengeluaran',$data);       
        }else{
            $this->db->where('id_kategori',$id);
            $query = $this->db->update('tb_kategori_pemasukan',$data);
        }
        return $query;
    }

    function delete_Kategori($id){
        $kode_jenis = substr($id, 0,4);
        if($kode_jenis=="K-PK"){
            $this->db->where('id_kategori',$id);
            $query = $this->db->delete('tb_kategori_pengeluaran');       
        }else{
            $this->db->where('id_kategori',$id);
            $query = $this->db->delete('tb_kategori_pemasukan');
        }
        return $query;
    }
}