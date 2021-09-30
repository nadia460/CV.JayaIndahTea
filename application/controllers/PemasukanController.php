<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemasukanController extends CI_Controller {
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
    
        $this->load->model("PemasukanModel","",TRUE);
        $this->load->model("ProdukModel","",TRUE);
        $this->load->model("KasModel","",TRUE);
        $this->load->model("KategoriModel","",TRUE);
    }

    /**
     * Show 
     */
	function index()
    {
        $data['dataPM'] = $this->PemasukanModel->get_Pemasukan();
        $this->load->view("pemasukan/main_page", $data);
        $this->load->view('templates/footer');
    }

    /**
	 * Set common validation rules for products form.
	 */
	protected function setValidationRules()
	{
		if($this->input->post("kategori_pemasukan") == "Penjualan Produk")
        {  
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
            $this->form_validation->set_rules('tujuan_kirim', 'Tujuan Kirim', 'trim|required');
            $this->form_validation->set_rules('berat', 'Berat Barang', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('harga_per_kg', 'Nominal', 'trim|required|max_length[20]');

        } else {

            $this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
            $this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
        }

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

    function formCreate()
    {
        $data['new_id'] = $this->setIdPemasukan();
        $data['nama_produk'] = $this->ProdukModel->get_NameProduct();
        $data['jenis'] = $this->KategoriModel->get_KategoriPemasukan()->result();
        $this->load->view('pemasukan/create',$data);
        $this->load->view('templates/footer'); 
        
    }
 
	public function processCreate()
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
			//Form validation success. Insert Record into database
            if($this->input->post("kategori_pemasukan") == "Penjualan Produk"){
                $harga = $this->input->post("harga_per_kg");
                $berat = $this->input->post("berat");
                $nominal_pemasukan = $harga * $berat;
    
                $dataPM = array(
                    "id_pemasukan" => $this->input->post("id_pemasukan"),
                    "nama_produk" => $this->input->post("nama_produk"),
                    "tujuan_kirim" => $this->input->post("tujuan_kirim"),
                    "kategori_pemasukan" => $this->input->post("kategori_pemasukan"),
                    "berat" => $this->input->post("berat"),
                    "harga_per_kg" => $this->input->post("harga_per_kg"),
                    "nominal_pemasukan" => $nominal_pemasukan,
                    "nama_pegawai" => $this->session->user->nama_pegawai
                );   
            } else {
                $dataPM = array(
                    "id_pemasukan" => $this->input->post("id_pemasukan"),
                    "keterangan" => $this->input->post("keterangan"),
                    "kategori_pemasukan" => $this->input->post("kategori_pemasukan"),
                    "nominal_pemasukan" => $this->input->post("nominal"),
                    "nama_pegawai" => $this->session->user->nama_pegawai
                );  
            }
            
            
			$data['created_at'] = date('Y-m-d H:i:s');
            if($this->PemasukanModel->insert_Pemasukan($dataPM)){  
                //$this->addtoKas();
                $this->session->set_flashdata('success', 'Data Pemasukan berhasil ditambahkan');
                redirect(site_url("income"));
            }else{
                
                redirect(site_url("income/formcreate"));
            }
		}else{
            $data['new_id'] = $this->setIdPemasukan();
            $data['nama_produk'] = $this->ProdukModel->get_NameProduct();
            $data['jenis'] = $this->KategoriModel->get_KategoriPemasukan()->result();
            $this->load->view('pemasukan/create',$data);
            $this->load->view('templates/footer'); 
        }
    }

    public function formUpdate($id){
        $record = $this->PemasukanModel->get_PemasukanById($id)->row();
        $data['nama_produk'] = $this->ProdukModel->get_NameProduct();
        $data['record'] = $record;
        if($record->kategori_pemasukan == "Penjualan Produk"){
            $this->load->view('pemasukan/update1',$data);
            $this->load->view('templates/footer');
        }else{
            $this->load->view('pemasukan/update2',$data);
            $this->load->view('templates/footer');
        }    
    }

    public function processUpdate($id)
	{   
		$this->setValidationRules();	
		if ($this->form_validation->run()) {
			//Form validation success. Insert Record into database
            
            if($this->input->post("kategori_pemasukan") == "Penjualan Produk"){
                $harga = $this->input->post("harga_per_kg");
                $berat = $this->input->post("berat");
                $nominal_pemasukan = $harga * $berat;
    
                $dataPM = array(
                    "id_pemasukan" => $this->input->post("id_pemasukan"),
                    "nama_produk" => $this->input->post("nama_produk"),
                    "tujuan_kirim" => $this->input->post("tujuan_kirim"),
                    "kategori_pemasukan" => $this->input->post("kategori_pemasukan"),
                    "berat" => $this->input->post("berat"),
                    "harga_per_kg" => $this->input->post("harga_per_kg"),
                    "nominal_pemasukan" => $nominal_pemasukan,
                    "nama_pegawai" => $this->session->user->nama_pegawai
                );   
            } else {
                $dataPM = array(
                    "id_pemasukan" => $this->input->post("id_pemasukan"),
                    "keterangan" => $this->input->post("keterangan"),
                    "kategori_pemasukan" => $this->input->post("kategori_pemasukan"),
                    "nominal_pemasukan" => $this->input->post("nominal"),
                    "nama_pegawai" => $this->session->user->nama_pegawai
                );  
            }

			$dataPM['updated_at'] = date('Y-m-d H:i:s');
            if($this->PemasukanModel->update_Pemasukan($id,$dataPM))
            {  
                //$this->KasModel->delete_Kas($id);
                //$this->addtoKas();
                $this->session->set_flashdata('success', 'Data Pemasukan berhasil diedit');
                redirect(site_url("income"));
            }else{
                redirect(site_url("income/formupdate"));
            }
		}else{
            $record = $this->PemasukanModel->get_PemasukanById($id)->row();
            $data['nama_produk'] = $this->ProdukModel->get_NameProduct();
            $data['record'] = $record;
            if($record->kategori_pemasukan == "Penjualan Produk"){
                $this->load->view('pemasukan/update1',$data);
                $this->load->view('templates/footer');
            }else{
                $this->load->view('pemasukan/update2',$data);
                $this->load->view('templates/footer');
            }
        }
    }

    public function readbyid($id){
        $record = $this->PemasukanModel->get_PemasukanById($id)->row();
		$data['record'] = $record; 
        if($record->kategori_pemasukan == 'Penjualan Produk'){
            $this->load->view('pemasukan/read1',$data);
            $this->load->view('templates/footer'); 
        }else{
            $this->load->view('pemasukan/read2',$data);
            $this->load->view('templates/footer'); 
        }
    }
    
    public function setIdPemasukan(){
        
        $new_id = $this->PemasukanModel->get_idmax()->result();
        if($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_pemasukan;
            }
            return $id_pemasukan = $this->PemasukanModel->get_newid($auto_id,'PM-');
        } 
    } 

     /** 
     * Method untuk menyimpan data Pemasukan berdasarkan id dalam bentuk pdf
     * Menggunakan plugin DOMPDF
     */
    function get_download_byid($id)
    {
        
		$data['record'] = $this->PemasukanModel->get_PemasukanById($id)->row();;
        $this->load->library('pdf');   
        $html = $this->load->view('pemasukan/generatepdf_byid', $data, true);
        $this->pdf->createPDF($html, 'Tanda Bukti Pembayaran - '.$id, false);
    }
 
    public function addtoKas()
	{  
        if($this->input->post("kategori_pemasukan") == "Penjualan Produk")
        {
            $harga = $this->input->post("harga_per_kg");
            $berat = $this->input->post("berat");
            $nominal_pemasukan = $harga * $berat;  
        } else {
            $nominal_pemasukan = $this->input->post("nominal"); 
        }

        //menghitung saldo
        $last_saldo = $this->KasModel->get_lastSaldo()->result();
        if($last_saldo > 0) {
            foreach ($last_saldo as $key) {
                $new_saldo = $key->saldo + $nominal_pemasukan;
            }
        }   

		$dataKas = array(
            "id_pemasukan" => $this->input->post("id_pemasukan"),
            "nominal_pemasukan" => $nominal_pemasukan,
            "saldo" => $new_saldo
        );
        $this->KasModel->insert_Kas($dataKas);
    }

    public function processDelete($id){
        $this->PemasukanModel->delete_Pemasukan($id);
        $this->session->set_flashdata("info", "Data Pemasukan Berhasil Dihapus!");
        redirect(site_url("income"));
    }
}
