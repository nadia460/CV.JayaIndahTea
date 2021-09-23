<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengeluaranController extends CI_Controller {
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
            }
            else{
                $this->load->view('templates/header_directur');
            }
        }
        $this->load->model("PengeluaranModel","",TRUE);
    }

    /**
     * Show admin dashboard
     */
	function index()
    {
        $data['dataPK'] = $this->PengeluaranModel->get_Pengeluaran_Pembelian();
        $this->load->view("pengeluaran/list", $data);
        $this->load->view('templates/footer'); 
    }

    protected function setValidationRules()
	{
		$this->form_validation->set_rules('id_pemasukan', 'ID Pemasukan', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
		$this->form_validation->set_rules('tujuan_kirim', 'tujuan_kirim', 'trim|required');
		$this->form_validation->set_rules('berat', 'Berat Barang', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('harga_per_kg', 'Nominal', 'trim|required|max_length[20]');

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

    function main_page_pembelian()
    {
        $data['dataPK'] = $this->PengeluaranModel->get_Pengeluaran_Pembelian();
        $data['dataDetail'] = $this->PengeluaranModel->get_Detail_Pembelian();
        $this->load->view("pengeluaran/pembelian/main_page", $data);
        $this->load->view('templates/footer'); 
    }

    function main_page_lainnya()
    {
        $data['dataPK'] = $this->PengeluaranModel->get_Pengeluaran_Lainnya();
        $this->load->view("pengeluaran/lainnya/main_page", $data);
        $this->load->view('templates/footer');
    }

    function formcreate_pembelian()
    {
        $data['new_id'] = $this->setIdPengeluaran();
        $this->load->view('pengeluaran/pembelian/create',$data);
        $this->load->view('templates/footer'); 
    }

    public function processCreate_Pembelian()
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
			//Form validation success. Insert Record into database
            $harga = $this->input->post("harga_per_kg");
            $berat = $this->input->post("berat");
            $nominal_pengeluaran = $harga * $berat;

            $dataPK = array(
                "id_pengeluaran" => $this->input->post("id_pemasukan"),
                "jenis_pengeluaran" => 'Pembelian Barang',
                "nominal_pengeluaran" => $nominal_pengeluaran,
                "nama_pegawai" => $this->session->user->nama_pegawai
            );

            $dataDetail = array(
                "id_pemasukan" => $this->input->post("id_pemasukan"),
                "nama_produk" => $this->input->post("nama_produk"),
                "asal_kirim" => $this->input->post("asal_kirim"),
                "berat" => $this->input->post("berat"),
                "harga_per_kg" => $this->input->post("harga_per_kg")
            );
            
			$dataPK['created_at'] = date('Y-m-d H:i:s');
            if (($this->PengeluaranModel->insert_Pengeluaran($dataPK)) && ($this->PengeluaranModel->insert_Detail($dataDetail))){  
                //$this->addtoKas();
                $this->session->set_flashdata('success', 'Data Pemasukan berhasil ditambahkan');
                redirect(site_url("PengeluaranController/main_page_pembelian"));
            }else{
                redirect(site_url("PengeluaranController/formcreate"));
            }
		}else{
            $data['new_id'] = $this->setIdPemasukan();
            $this->load->view('pengeluaran/pembelian/create',$data);
            $this->load->view('templates/footer'); 
        }
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
}
