<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KategoriController extends CI_Controller {
    /**
     * KategoriController constructor.
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
        $data['DataKPK'] = $this->KategoriModel->get_KategoriPengeluaran();
        $data['DataKPM'] = $this->KategoriModel->get_KategoriPemasukan();
        $this->load->view('kategori/main_page', $data);
        $this->load->view('templates/footer'); 
    }
    
    protected function setValidationRules()
	{
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('nama_kategori', 'Nama Jenis', 'required|max_length[50]');
        
        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
    }

    function formCreate()
    {
        //$data['new_id'] = $this->setIdKategoriPemasukan();
        $this->load->view('kategori/create');
        $this->load->view('templates/footer'); 
    }


    public function processCreate()
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
			//
            $data = array(
                "nama_kategori" => $this->input->post("nama_kategori")
            );
            $data['id_kategori'] = $this->setIdKategori();
            if($this->KategoriModel->insert_Kategori($data)){  
                $this->session->set_flashdata('success', 'Data Kategori berhasil ditambahkan');
                redirect(site_url("category"));
            }else{
                redirect(site_url("category/formcreate"));
            }       
		}else{
            
            $this->load->view('kategori/create');
            $this->load->view('templates/footer'); 
        }
    }

    
    function formUpdate($id)
    {
        $record = $this->KategoriModel->get_KategoriById($id)->row();
		$data['record'] = $record;
        $this->load->view('kategori/update',$data);
        $this->load->view('templates/footer'); 
    }


    public function processUpdate($id)
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
			if($id == "K-PK-001"){
                $this->session->set_flashdata("error", "Maaf data jenis Pembelian Bahan Baku tidak dapat diedit! Silahkan tambah data baru atau edit data lain.");
                redirect(site_url("category"));
            } elseif ($id == "K-PM-001"){
                $this->session->set_flashdata("error", "Maaf data jenis Penjualan Produk tidak dapat diedit! Silahkan tambah data baru atau edit data lain.");
                redirect(site_url("category"));
            }else{
                //
                $data = array(
                    "id_kategori" => $this->input->post("kategori"),
                    "nama_kategori" => $this->input->post("nama_kategori")
                );
                
                if($this->KategoriModel->update_Kategori($id,$data)){  
                    $this->session->set_flashdata('success', 'Data Kategori berhasil diedit');
                    redirect(site_url("category"));
                }else{
                    redirect(site_url("category/formupdate"));
                }       
            } 
            
		}else{
            $record = $this->KategoriModel->get_KategoriById($id)->row();
            $data['record'] = $record;
            $this->load->view('kategori/update',$data);
            $this->load->view('templates/footer'); 
        }
    }


    public function setIdKategori()
    {
        $new_id = $this->KategoriModel->get_idmax()->result();
        if($this->input->post("kategori")=="Pemasukan Kas"){
            
            if($new_id > 0) {
                foreach ($new_id as $key) {
                    $auto_id = $key->id_kategori;
                }
                $id_produk = $this->KategoriModel->get_newid($auto_id,'K-PM-');
            } 
        }else{
            
            if($new_id > 0) {
                foreach ($new_id as $key) {
                    $auto_id = $key->id_kategori;
                }
                $id_produk = $this->KategoriModel->get_newid($auto_id,'K-PK-');
            } 
        }
        return $id_produk;  
    }

    public function processDelete($id){
        if($id == "K-PK-001"){
            $this->session->set_flashdata("error", "Maaf data jenis Pembelian Bahan Baku tidak dapat dihapus! Silahkan tambah data baru atau edit data lain.");
            redirect(site_url("category"));
        } elseif ($id == "K-PM-001"){
            $this->session->set_flashdata("error", "Maaf data jenis Penjualan Produk tidak dapat dihapus! Silahkan tambah data baru atau edit data lain.");
            redirect(site_url("category"));
        }else{
            $this->KategoriModel->delete_Kategori($id);
            $this->session->set_flashdata("info", "Data Jenis Berhasil Dihapus!");
            redirect(site_url("category"));
        } 
    }
}
