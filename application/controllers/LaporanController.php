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
        $this->load->model("LaporanModel","",TRUE);
        $this->load->model("KategoriModel","",TRUE);
    }

   
	function index()
    {
        $data['dataKas'] = $this->LaporanModel->getKas();
        if ($this->session->user->hak_akses == "Admin"){
            $this->load->view('laporan/admin/main_page', $data);
            $this->load->view('templates/footer');
        }
        else{
            $this->load->view('laporan/direktur/main_page', $data);
            $this->load->view('templates/footer');
        }
        
        
        //$this->load->view('laporan/main_page', $data);
        //$this->load->view('templates/footer'); 
    }

    function reportMonth()
    {
        $this->form_validation->set_rules('periode_bulan', 'Periode Bulan', 'trim|required|max_length[7]');
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
            $this->load->view('laporan/admin/report', $data);
            $this->load->view('templates/footer'); 
        } else {
            $data['dataKas'] = $this->LaporanModel->getKas();
            $this->load->view('laporan/admin/main_page', $data);
            $this->load->view('templates/footer');
        }    
    }

    function reportYear()
    {
        $this->form_validation->set_rules('periode_tahun', 'Periode Tahun', 'trim|required|max_length[7]');
        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
        
		if ($this->form_validation->run()) 
        {
            $periode = $this->input->post("periode_bulan");
            $data['periode'] = $this->input->post("periode_tahun");
            $data['laporanPM'] = $this->LaporanModel->get_LaporanPemasukan($periode);
            $data['laporanPK'] = $this->LaporanModel->get_LaporanPengeluaran($periode);
            $countPM = $this->LaporanModel->get_CountPemasukan($periode);
            $countPK = $this->LaporanModel->get_CountPengeluaran($periode);
            $data['countFinal'] = $countPM - $countPK;
            $this->load->view('laporan/admin/report', $data);
            $this->load->view('templates/footer'); 
        } else {
            $data['dataKas'] = $this->LaporanModel->getKas();
            $this->load->view('laporan/admin/main_page', $data);
            $this->load->view('templates/footer');
        }       
    }

    public function processCreate()
	{
            $periode = $this->input->post("periode");
            $dataLP['uraian'] = $this->LaporanModel->get_LaporanPemasukan($periode);

            $dataLP = array(
                "id_laporan" => $this->input->post("id_laporan"),
                "periode" => $this->input->post("periode"),
                //"uraian" => $this->input->post("uraian"),
                //"nominal_pemasukan" => $this->input->post("nominal"),
                "petugas_admin" => $this->session->user->nama_pegawai
            );  
            
            
            
			//$data['created_at'] = date('Y-m-d H:i:s');
            if($this->LaporanModel->insert_Laporan($dataLP)){  
                //$this->addtoKas();
                $this->session->set_flashdata('success', 'Data Laporans berhasil ditambahkan');
                redirect(site_url("LaporanController"));
            }else{
                
                redirect(site_url("LaporanController/formcreate"));
            }
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
  




    
    function readbyid_admin()
    {
        $this->load->view('laporan/admin/read_report');
        $this->load->view('templates/footer'); 
    }

    function get_download()
    {
        $this->load->library('pdf');
        //$data['users'] = $this->UsersModel->getUsers();
        $html = $this->load->view('laporan/generatepdf', [], true);
        $this->pdf->createPDF($html, 'laporan akun', false);
    }

    
}
