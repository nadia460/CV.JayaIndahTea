<?php
/** 
 * Ket :
 *  
 * 
*/

class PegawaiController extends CI_Controller{
    /**
     * UsersController constructor.
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
        $this->load->model("PegawaiModel","",TRUE);
    }

    function index()
    {
        $data['pegawai'] = $this->PegawaiModel->get_Pegawai();
        $this->load->view("pegawai/main_page", $data);
        $this->load->view('templates/footer');  
    }

    protected function setValidationRules()
	{
		$this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|max_length[50]');
		$this->form_validation->set_rules('no_tlp', 'No Telepon', 'numeric|required|max_length[12]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[50]');
        
        $this->form_validation->set_message('numeric','Input %s! harus berupa angka');
        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
    }

    function formCreate()
    {
        $data['new_id'] = $this->setIdPegawai();
        $this->load->view('pegawai/create',$data);
        $this->load->view('templates/footer'); 
    }
    
    public function processCreate()
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
            //Form validation success. Insert Record into database
            $data = array(
                "id_pegawai" => $this->input->post("id_pegawai"),
                "nama_pegawai" => $this->input->post("nama_pegawai"),
                "no_tlp" => $this->input->post("no_tlp"),
                "alamat" => $this->input->post("alamat")
            );
            $data['created_at'] = date('Y-m-d H:i:s');

            if($this->PegawaiModel->insert_Pegawai($data)){  
                $this->session->set_flashdata('success', 'Data Pegawai berhasil ditambahkan');
                redirect(site_url("employees"));
            }else{
                redirect(site_url("employees/formcreate"));
            }
        } else {
            $data['new_id'] = $this->setIdPegawai();
            $this->load->view('pegawai/create',$data);
            $this->load->view('templates/footer'); 
        }
    }

    function formUpdate($id)
    {
        $data['record'] = $this->PegawaiModel->get_PegawaiById($id)->row();
        $this->load->view('pegawai/update',$data);
        $this->load->view('templates/footer'); 
    }

    public function processUpdate($id)
	{
		$this->setValidationRules();	
		if ($this->form_validation->run()) 
        {
            //Form validation success. Insert Record into database
            $data = array(
                "id_pegawai" => $this->input->post("id_pegawai"),
                "nama_pegawai" => $this->input->post("nama_pegawai"),
                "no_tlp" => $this->input->post("no_tlp"),
                "alamat" => $this->input->post("alamat")
            );
            $data['created_at'] = date('Y-m-d H:i:s');

            if($this->PegawaiModel->update_Pegawai($id, $data)){  
                $this->session->set_flashdata('success', 'Data Pegawai berhasil diedit');
                redirect(site_url("employees"));
            }else{
                redirect(site_url("employees/formcreate"));
            }
        } else {
            $data['record'] = $this->PegawaiModel->get_PegawaiById($id)->row();
            $this->load->view('pegawai/update',$data);
            $this->load->view('templates/footer'); 
        }
    }

    public function setIdPegawai()
    {        
        $new_id = $this->PegawaiModel->get_idmax()->result();
        if($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_pegawai;
            }
            return $id_pegawai = $this->PegawaiModel->get_newid($auto_id, 'PG-');
        } 
    }

    /** Method untuk hapus data Users berdasarkan id */
    public function processDelete($id)
    {
        $this->PegawaiModel->delete_Pegawai($id);
        $this->session->set_flashdata('info', 'Data Pegawai berhasil dihapus.');
        redirect(site_url("employees")); 
    }
}
?>