<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OperasionalController extends CI_Controller {
    /**
     * OperasionalController constructor.
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
        $this->load->model("PengeluaranModel","",TRUE);
        $this->load->model("KasModel","",TRUE);
    }

    
	function index()
    {
        $data['dataPK'] = $this->PengeluaranModel->get_Pengeluaran_Lainnya();
        $this->load->view("pengeluaran/operasional/main_page", $data);
        $this->load->view('templates/footer'); 
    }

    protected function setValidationRules()
	{
		$this->form_validation->set_rules('id_pengeluaran', 'ID Pengeluaran', 'trim|required');
		$this->form_validation->set_rules('jenis_pengeluaran', 'Jenis Pengeluaran', 'trim|required');
		$this->form_validation->set_rules('keterangan_lainnya', 'Keterangan', 'trim|required|max_length[150]');
		$this->form_validation->set_rules('nominal_pengeluaran', 'Nominal', 'trim|required');

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

   
    function formcreate()
    {
        $data['new_id'] = $this->setIdPengeluaran();
        $this->load->view('pengeluaran/operasional/create',$data);
        $this->load->view('templates/footer'); 
    }

    public function processCreate()
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
			//Form validation success. Insert Record into database
            $dataPK = array(
                "id_pengeluaran" => $this->input->post("id_pengeluaran"),
                "keterangan_lainnya" => $this->input->post("keterangan_lainnya"),
                "jenis_pengeluaran" => $this->input->post("jenis_pengeluaran"),
                "nominal_pengeluaran" => $this->input->post("nominal_pengeluaran"),
                "nama_pegawai" => $this->session->user->nama_pegawai
            );
            
			$dataPK['created_at'] = date('Y-m-d H:i:s');
            if ($this->PengeluaranModel->insert_Pengeluaran($dataPK)){  
                $this->addtoKas();
                $this->session->set_flashdata('success', 'Data Pengeluaran berhasil ditambahkan');
                redirect(site_url("Pengeluaran/OperasionalController"));
            }else{
                redirect(site_url("Pengeluaran/OperasionalController/formcreate"));
            }
		}else{
            $data['new_id'] = $this->setIdPengeluaran();
            $this->load->view('pengeluaran/operasional/create',$data);
            $this->load->view('templates/footer'); 
        }
    }

    public function formUpdate($id){
        $record = $this->PengeluaranModel->get_PengeluaranById($id)->row();
		$data['record'] = $record;
        $this->load->view('pengeluaran/operasional/update',$data);
        $this->load->view('templates/footer'); 
    }

    public function processUpdate($id)
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
			//Form validation success. Insert Record into database
            $dataPK = array(
                "id_pengeluaran" => $this->input->post("id_pengeluaran"),
                "keterangan_lainnya" => $this->input->post("keterangan_lainnya"),
                "jenis_pengeluaran" => $this->input->post("jenis_pengeluaran"),
                "nominal_pengeluaran" => $this->input->post("nominal_pengeluaran"),
                "nama_pegawai" => $this->session->user->nama_pegawai
            );
            
			$dataPK['created_at'] = date('Y-m-d H:i:s');
            if ($this->PengeluaranModel->update_Pengeluaran($id, $dataPK)){  
                $this->KasModel->delete_Kas($id);
                $this->addtoKas();
                $this->session->set_flashdata('success', 'Data Pengeluaran berhasil diedit');
                redirect(site_url("Pengeluaran/OperasionalController"));
            }else{
                redirect(site_url("Pengeluaran/OperasionalController/formupdate"));
            }
		}else{
            $record = $this->PengeluaranModel->get_PengeluaranById($id)->row();
            $data['record'] = $record;
            $this->load->view('pengeluaran/operasional/update',$data);
            $this->load->view('templates/footer'); 
        }
    }

    public function readbyid($id){
        $record = $this->PengeluaranModel->get_PengeluaranById($id)->row();  
		$data['record'] = $record;
        $this->load->view('pengeluaran/operasional/read',$data);
        $this->load->view('templates/footer'); 
    }

    public function setIdPengeluaran(){
        
        $new_id = $this->PengeluaranModel->get_idmax()->result();
        if($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_pengeluaran;
            }
            return $id_pengeluaran = $this->PengeluaranModel->get_newid($auto_id,'PK-');
        } 
    }

    public function addtoKas()
	{     
        $nominal_pengeluaran = $this->input->post("nominal_pengeluaran");
        //menghitung saldo
        $last_saldo = $this->KasModel->get_lastSaldo()->result();
        if($last_saldo > 0) {
            foreach ($last_saldo as $key) {
                $new_saldo = $key->saldo - $nominal_pengeluaran;
            }
        }   

		$dataKas = array(
            "id_pengeluaran" => $this->input->post("id_pengeluaran"),
            "jenis_pengeluaran" => $this->input->post("jenis_pengeluaran"),
            "nominal_pengeluaran" => $this->input->post("nominal_pengeluaran"),
            "saldo" => $new_saldo
        );
        $this->KasModel->insert_Kas($dataKas);
    }

    public function processDelete($id){
        $this->PengeluaranModel->delete_Pengeluaran($id);
        $this->session->set_flashdata("info", "Data Pengeluaran Berhasil Dihapus!");
        redirect(site_url("Pengeluaran/OperasionalController"));
    }
}
