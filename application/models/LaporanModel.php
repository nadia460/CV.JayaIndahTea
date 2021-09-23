<?php

class LaporanModel extends CI_Model {

    function getKas(){
        return $this->db->get("tb_kas");
    }
    
    function get_LaporanPemasukan($periode){
        $this->db->like("created_at",$periode);
        $this->db->select('distinct(kategori_pemasukan)');
        $this->db->select_sum('nominal_pemasukan');
        $this->db->group_by('kategori_pemasukan');
        $this->db->from("tb_pemasukan");
        $query = $this->db->get();
        return $query;
    }

    function get_LaporanPengeluaran($periode){
        $this->db->like("created_at",$periode);
        $this->db->select('distinct(kategori_pengeluaran)');
        $this->db->select_sum('nominal_pengeluaran');
        $this->db->group_by('kategori_pengeluaran');
        $this->db->from("tb_pengeluaran");
        $query = $this->db->get();
        return $query;
    }

    function get_CountPemasukan($periode){
        $this->db->like("created_at",$periode);
        $this->db->select_sum('nominal_pemasukan');
        $this->db->from("tb_pemasukan");
        $query = $this->db->get();
        return $query->row()->nominal_pemasukan;
    }

    function get_CountPengeluaran($periode){
        $this->db->like("created_at",$periode);
        $this->db->select_sum('nominal_pengeluaran');
        $this->db->from("tb_pengeluaran");
        $query = $this->db->get();       
        return $query->row()->nominal_pengeluaran;
    }
    
    function get_idmax(){
        $date=date('ymd'); 
        $this->db->like("id_laporan",$date);
        $this->db->select_max("id_laporan");
        $this->db->from("tb_laporan");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id, $prefix){

        $date=date('ymd-');      
        $newId = substr($auto_id, -3);
        $tambah = (int)$newId + 1;

        if (strlen($tambah) == 1 ){
            $id_laporan = $prefix.$date."00" .$tambah;
        }
        else if (strlen($tambah) == 2 ){
            $id_laporan = $prefix.$date."0" .$tambah;
        }
        else if (strlen($tambah) == 3 ){
            $id_laporan = $prefix.$date.$tambah;
        }
        return $id_laporan;
    }

    function insert_Laporan($dataLP){

        return $this->db->insert("tb_laporan",$dataLP);
    }
}