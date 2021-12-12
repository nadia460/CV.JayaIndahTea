<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {
    /**
     * DashboardController constructor.
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
            }elseif ($this->session->user->hak_akses == "Direktur"){
                $this->load->view('templates/header_directur');
            }else{
                $this->load->view('templates/header_asisten_pabrik');
            }
        }
        //Memanggil Model
        $this->load->model("PemasukanModel","",TRUE);
        $this->load->model("PengeluaranModel","",TRUE);
        $this->load->model("LaporanModel","",TRUE);
    }

    //Berisi tampilan utama menu dashboard
	function index()
    {
        $data['Total_Pemasukan'] = $this->get_countPemasukan();
        $data['Total_Pengeluaran'] = $this->get_countPengeluaran();
        $data['Keuntungan'] = $this->get_Keuntungan();
        $data['histori'] = $this->LaporanModel->get_Arsip_Delete();

        if ($this->session->user->hak_akses == "Direktur"){
            $this->load->view('dashboard_direktur', $data);
        }else{
            $this->load->view('dashboard', $data);
        }
        $this->load->view('templates/footer'); 
    }

    //Berisi tampilan utama menu dashboard
    function get_countPemasukan(){
        $count_Pemasukan = $this->PemasukanModel->count_Pemasukan();
        if($count_Pemasukan == NULL) { 
            $count_Pemasukan = 0;  
        } else{
            $count_Pemasukan = $this->PemasukanModel->count_Pemasukan();
        }
        return $count_Pemasukan;
    }

    //Berisi tampilan utama menu dashboard
    function get_countPengeluaran(){
        $count_Pengeluaran = $this->PengeluaranModel->count_Pengeluaran();
        if($count_Pengeluaran == NULL) { 
            $count_Pengeluaran = 0;  
        } else{
            $count_Pengeluaran = $this->PengeluaranModel->count_Pengeluaran();
        }
        return $count_Pengeluaran;
    }

    //Berisi tampilan utama menu dashboard
    function get_Keuntungan(){
        $count_Pemasukan = $this->PemasukanModel->count_Pemasukan();
        $count_Pengeluaran = $this->PengeluaranModel->count_Pengeluaran();
        $keuntungan = $count_Pemasukan - $count_Pengeluaran;
        return $keuntungan;
    }
}
