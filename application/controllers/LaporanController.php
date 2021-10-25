<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanController extends CI_Controller {
    /**
     * LaporanController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->logged_in){
            redirect(site_url("logincontroller/login"));
            exit;
        }else{
            if ($this->session->user->hak_akses == "Admin"){
                $this->load->view('templates/header_admin');
            }
            else{
                $this->load->view('templates/header_directur');
            }
        }
        $this->load->library('pdf');
        $this->load->model("LaporanModel","",TRUE);
        $this->load->model("UsersModel","",TRUE);
    }

   
	function index()
    {
        $data['dataLP'] = $this->LaporanModel->get_Laporan();
        if ($this->session->user->hak_akses == "Admin"){
            $this->load->view('laporan/admin/main_page', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->load->view('laporan/direktur/main_page', $data);
            $this->load->view('templates/footer');
        } 
    }

    function reportMonth()
    {
        $this->form_validation->set_rules('periode_bulan', 'Periode Bulan', 'required|max_length[7]');

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');

		if ($this->form_validation->run()) 
        {
            $data['new_id'] = $this->setIdLaporan();
            $periode = $this->input->post("periode_bulan");
            $data['periode'] = $this->input->post("periode_bulan");
            $data['laporanPM'] = $this->LaporanModel->get_LaporanPemasukan($periode);
            $data['laporanPK'] = $this->LaporanModel->get_LaporanPengeluaran($periode);
            $countPM = $this->LaporanModel->get_CountPemasukan($periode);
            $countPK = $this->LaporanModel->get_CountPengeluaran($periode);
            $data['countFinal'] = $countPM - $countPK;
            $this->load->view('laporan/admin/create', $data);
            $this->load->view('templates/footer'); 
        } else {
            $data['dataLP'] = $this->LaporanModel->get_Laporan();
            $this->load->view('laporan/admin/main_page', $data);
            $this->load->view('templates/footer');
        }    
    }

    function reportYear()
    {
        $this->form_validation->set_rules('periode_tahun', 'Periode Tahun', 'required|max_length[5]');

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
        
		if ($this->form_validation->run()) 
        {
            $data['new_id'] = $this->setIdLaporan();
            $periode = $this->input->post("periode_bulan");
            $data['periode'] = $this->input->post("periode_tahun");
            $data['laporanPM'] = $this->LaporanModel->get_LaporanPemasukan($periode);
            $data['laporanPK'] = $this->LaporanModel->get_LaporanPengeluaran($periode);
            $countPM = $this->LaporanModel->get_CountPemasukan($periode);
            $countPK = $this->LaporanModel->get_CountPengeluaran($periode);
            $data['countFinal'] = $countPM - $countPK;
            $this->load->view('laporan/admin/create', $data);
            $this->load->view('templates/footer'); 
        } else {
            $data['dataLP'] = $this->LaporanModel->get_Laporan();
            $this->load->view('laporan/admin/main_page', $data);
            $this->load->view('templates/footer');
        }       
    }

    public function processCreate()
	{
        $id_laporan['id_laporan'] = $this->input->post("id_laporan");
        $periode = $this->input->post("periode");

        $dataLP = array(
            "id_laporan" => $this->input->post("id_laporan"),
            "periode" => $this->input->post("periode"),  
            "total" => $this->input->post("total"),
            "petugas_admin" => $this->session->user->id_pegawai
        );  
            
        $this->LaporanModel->insert_Laporan($dataLP);
        $this->LaporanModel->insert_DetailLaporan($periode, $id_laporan);

        $this->session->set_flashdata('success', 'Data Laporans berhasil ditambahkan');
        redirect(site_url("admin/report"));
    }

    public function readbyid($id){
        $data['laporan'] = $this->LaporanModel->get_LaporanById($id)->row();
        $data['laporanPM'] = $this->LaporanModel->get_Detail_LaporanPemasukan($id);
        $data['laporanPK'] = $this->LaporanModel->get_Detail_LaporanPengeluaran($id);
        $get_laporan = $this->LaporanModel->get_LaporanById($id)->result();
        $lp = $this->LaporanModel->get_LaporanById($id)->row();

        if ($this->session->user->hak_akses == "Admin"){
            
            if($get_laporan > 0) {
                if($lp->penyetuju == NULL){
                    foreach ($get_laporan as $record) {
                        $admin = $record->petugas_admin;
                    } 
                    $data['admin'] = $this->UsersModel->get_UsersPegawai($admin)->row();
                    $this->load->view('laporan/admin/read1', $data);
                    $this->load->view('templates/footer');
                } else {
                    foreach ($get_laporan as $record) {
                        $admin = $record->petugas_admin;
                        $direktur = $record->penyetuju;
                    } 
                    $data['admin'] = $this->UsersModel->get_UsersPegawai($admin)->row();
                    $data['direktur'] = $this->UsersModel->get_UsersPegawai($direktur)->row();
                    $this->load->view('laporan/admin/read2', $data);
                    $this->load->view('templates/footer');
                }
                    
            }  
        }
        else{
            if($get_laporan > 0) {
                if($lp->penyetuju == NULL){
                foreach ($get_laporan as $record) {
                        $admin = $record->petugas_admin;
                    } 
                    $data['admin'] = $this->UsersModel->get_UsersPegawai($admin)->row();
                    $this->load->view('laporan/direktur/read1', $data);
                    $this->load->view('templates/footer');
                } else {
                    foreach ($get_laporan as $record) {
                        $admin = $record->petugas_admin;
                        $direktur = $record->penyetuju;
                    } 
                    $data['admin'] = $this->UsersModel->get_UsersPegawai($admin)->row();
                    $data['direktur'] = $this->UsersModel->get_UsersPegawai($direktur)->row();
                    $this->load->view('laporan/direktur/read2', $data);
                    $this->load->view('templates/footer');
                }
                    
            } 
        }
         
    }

    public function processAccepted($id)
	{      
        $data['penyetuju'] = $this->session->user->id_pegawai;
        $this->LaporanModel->update_Laporan($id, $data);

        $this->session->set_flashdata('success', 'Data Laporans berhasil disetujui');
        redirect(site_url('director/report'));
    }

    public function setIdLaporan()
    {    
        $new_id = $this->LaporanModel->get_idmax()->result();
        if($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_laporan;
            }
            return $id_Laporan = $this->LaporanModel->get_newid($auto_id,'LP-');
        } 
    }
  
    

    function get_download($id)
    {
        $data['laporan'] = $this->LaporanModel->get_LaporanById($id)->row();
        $data['laporanPM'] = $this->LaporanModel->get_Detail_LaporanPemasukan($id);
        $data['laporanPK'] = $this->LaporanModel->get_Detail_LaporanPengeluaran($id);

        $get_laporan = $this->LaporanModel->get_LaporanById($id)->result();
        $lp = $this->LaporanModel->get_LaporanById($id)->row();
        if($get_laporan > 0) {
            if($lp->penyetuju == NULL){
               foreach ($get_laporan as $record) {
                    $admin = $record->petugas_admin;
                } 
                $data['admin'] = $this->UsersModel->get_UsersPegawai($admin)->row();
                $html = $this->load->view('laporan/generatepdf1', $data, true);
                $this->pdf->createPDF($html, 'Laporan Arus Kas - '.$id, false);
            } else {
                foreach ($get_laporan as $record) {
                    $admin = $record->petugas_admin;
                    $direktur = $record->penyetuju;
                } 
                $data['admin'] = $this->UsersModel->get_UsersPegawai($admin)->row();
                $data['direktur'] = $this->UsersModel->get_UsersPegawai($direktur)->row();
                $html = $this->load->view('laporan/generatepdf2', $data, true);
                $this->pdf->createPDF($html, 'Laporan Arus Kas - '.$id, false);
            }       
        }        
    } 
    
    function processDelete($id)
    {
        $this->LaporanModel->delete_Laporan($id);
        $this->session->set_flashdata("info", "Data Laporan Berhasil Dihapus!");
        redirect(site_url("LaporanController"));
    }
}
