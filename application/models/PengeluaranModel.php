<?php

class PengeluaranModel extends CI_Model {

    function get_Pengeluaran(){
        return $this->db->get("tb_pengeluaran");
    }

    function insert_Pengeluaran($data){
        return $this->db->insert("tb_pengeluaran",$data);
    }


    
    function get_PengeluaranById($id){
        $this->db->where("id_pengeluaran",$id);
        return $this->db->get("tb_pengeluaran");
    }

    function get_idmax(){
        $date=date('ymd'); 
        $this->db->like("id_pengeluaran",$date);
        $this->db->select_max("id_pengeluaran");
        $this->db->from("tb_pengeluaran");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id, $prefix){

        $date=date('ymd-');      
        $newId = substr($auto_id, -3);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1 ){
            $id_pengeluaran = $prefix.$date."00" .$tambah;
        }
        else if (strlen($tambah) == 2 ){
            $id_pengeluaran = $prefix.$date."0" .$tambah;
        }
        else if (strlen($tambah) == 3 ){
            $id_pengeluaran = $prefix.$date.$tambah;
        }
        return $id_pengeluaran;
    } 

    function update_Pengeluaran($id, $data){
        $this->db->where("id_pengeluaran",$id);
        return $this->db->update('tb_pengeluaran',$data);
    }

    function delete_Pengeluaran($id){
        $dataPK = array(
            "id" => $id,
            "nama_pegawai" => $this->session->user->nama_pegawai
        );
        $this->db->insert("tb_arsip_hapus",$dataPK);
        $this->db->where('id_pengeluaran',$id);
        $this->db->delete('tb_pengeluaran');
    }

    public function count_Pengeluaran(){
        $date=date('Y'); 
        $this->db->like("created_at",$date);
        $this->db->select_sum('nominal_pengeluaran');
        $query = $this->db->get('tb_pengeluaran');
        return $query->row()->nominal_pengeluaran;
    }
}