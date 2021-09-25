<?php

class LaporanModel extends CI_Model {

    function get_Laporan(){
        return $this->db->get("tb_laporan");
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

    function insert_DetailLaporan($periode, $id_laporan){

        $query1 = $this->db
                            ->select('distinct(kategori_pemasukan)')
                            ->select_sum('nominal_pemasukan')
                            ->group_by('kategori_pemasukan')
                            ->like("created_at",$periode)
                            ->get('tb_pemasukan')->result();
        
        $query2 = $this->db
                            ->select('distinct(kategori_pengeluaran)')
                            ->select_sum('nominal_pengeluaran')
                            ->group_by('kategori_pengeluaran')
                            ->like("created_at",$periode)
                            ->get('tb_pengeluaran')->result();

        foreach($query1 as $record1){
            $query1 = $this->db->set($id_laporan);
            $this->db->insert('tb_detail_laporan', $record1);
        }
        
        foreach($query2 as $record2){
            $query2 = $this->db->set($id_laporan);
            $this->db->insert('tb_detail_laporan', $record2);
        }
    }

    function insert_Laporan($dataLP){
        return $this->db->insert("tb_laporan", $dataLP);
    }

    function delete_Laporan($id){
        $this->db->where('id_laporan',$id);
        $query = $this->db->delete('tb_detail_laporan');
        $this->db->where('id_laporan',$id);
        $query = $this->db->delete('tb_laporan');
    }
}