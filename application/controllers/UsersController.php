<?php
/** 
 * Ket :
 *  
 * 
*/

class UsersController extends CI_Controller{
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
            }
            else{
                $this->load->view('templates/header_directur');
            }
        }
        $this->load->model("UsersModel","",TRUE);
    }

    function index()
    {
        $data['users'] = $this->UsersModel->getUsers();
        $this->load->view("users/list_account", $data);
        $this->load->view('templates/footer'); 
    }

    /** 
     * Method untuk memanggil tampilan view List Akun
     * Pada menu Admin pada Dashboard
     */
    public function list()
    {           
        $data['users'] = $this->UsersModel->getUsers();
        $this->load->view("users/list_account", $data);
        $this->load->view('templates/footer'); 
    }

    protected function setValidationRules()
	{
		$this->form_validation->set_rules('name', 'Nama', 'trim|required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('retypepassword', 'Retype Password', 'trim|required|max_length[20]');

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

    function formcreate()
    {
        
        $this->load->view('users/create');
        $this->load->view('templates/footer'); 
    }

    function create() 
    {    
        $user = array(
            "email" => $this->input->post("email"),
            "password" => $this->input->post("password"),
            "name" => $this->input->post("name")
        );

        $password = $this->input->post("password");
        $retypepassword = $this->input->post("retypepassword");
        $email = $this->input->post('email');
        $this->setValidationRules();

        if ($this->form_validation->run()) {

            // Cek email apakah sudah digunakan?
            if($this->UsersModel->getemail($email))
            {    
                $this->session->set_flashdata("error", "Email sudah digunakan!");
                redirect(site_url("UsersController/formcreate")); 
            } else {
                // Cek apakah inputan password dan retype password sama atau beda?
                if($password == $retypepassword)
                {
                    if($this->UsersModel->insertUser($user)){  
                        $this->session->set_flashdata("success", "Registrasi Akun Berhasil!");
                        redirect(site_url("UsersController"));
                    }else{
                        redirect(site_url("UsersController/formcreate"));
                    }
                } else {
                    $this->session->set_flashdata("error", "Password Salah!");
                    redirect(site_url("UsersController/formcreate"));
                }
            }          

		}else{
            $this->load->view("users/create");
        }     
    }

    /** Method untuk hapus data Users berdasarkan id */
    public function hapus($id)
    {
        $this->UsersModel->hapus_users($id);
        $this->session->set_flashdata("info", "Akun Users Berhasil Dihapus!");
        redirect(site_url("UsersController")); 
    }

    /** 
     * Method untuk menyimpan data Users dalam bentuk pdf
     * Menggunakan plugin DOMPDF
     */
    function get_download()
    {
        $this->load->library('pdf');
        $data['users'] = $this->UsersModel->getUsers();
        $html = $this->load->view('users/generatepdf', $data, true);
        
        $this->pdf->createPDF($html, 'laporan akun', false);
    }
   
    /** Melepaskan Session Users Login untuk keluar */
    public function logout() 
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
}
?>