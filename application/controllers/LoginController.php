<?php
/** 
 * Ket :
 *  
 * 
*/

class LoginController extends CI_Controller{
    /**
     * LoginController constructor.
     */ 
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UsersModel","",TRUE);
    }

    function index()
    {
        if($this->session->logged_in)
        {
            redirect(site_url("dashboardcontroller"));
            $this->load->view('templates/footer');   
        } else {
            $this->load->view("users/login");
        }
    }

    /** Method untuk memanggil tampilan view Login */
    function login()
    {
        $this->load->view("users/login");
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


    public function ProsesLogin()
    {  
        if($this->UsersModel->login()->row())
        {           
            $email = $this->input->post('email');
            $password = ($this->input->post('password'));
            $user = $this->UsersModel->attemptLogin($email,$password);
            //Set user session
            $this->setUserSession($user);
            redirect(site_url("logincontroller"));   
        } else { 
            $this->session->set_flashdata("error","Email atau Password Salah");
            redirect(site_url("logincontroller"));
        }
    }

    /** Mengatur session untuk Users setelah Login */
    private function setUserSession($user) 
    {
        $logged_in = array(
            'user'  => $user,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($logged_in);
    }

    /** Melepaskan Session Users Login untuk keluar dari Dashboard */
    public function logout() 
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>