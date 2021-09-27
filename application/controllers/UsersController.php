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
        $this->load->model("PegawaiModel","",TRUE);
    }

    function index()
    {
        $data['users'] = $this->UsersModel->get_Users();
        $this->load->view("users/main_page", $data);
        $this->load->view('templates/footer'); 
    }

    protected function setValidationRules($type = 'add')
	{
		$this->form_validation->set_rules('identitas_pegawai', 'Identitas Pegawai', 'required|max_length[128]');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
		$this->form_validation->set_rules('retypepassword', 'Retype Password', 'required|max_length[20]');
        $this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');

        if (empty($_FILES['foto_profil']['name']) && $type == 'add') {
			$this->form_validation->set_rules('foto_profil', 'Foto Profil', 'required');
		}

        if (empty($_FILES['qr_code']['name']) && $type == 'add') {
			$this->form_validation->set_rules('qr_code', 'QR CODE', 'required');
		}

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

    function formCreate()
    {
        $data['new_id'] = $this->setIdUsers();
        $data['pegawai'] = $this->PegawaiModel->get_Pegawai()->result();
        $this->load->view('users/create',$data);
        $this->load->view('templates/footer'); 
    }

    function processCreate() 
    {       
        $this->setValidationRules();
        if ($this->form_validation->run()) 
        {
            $password = $this->input->post("password");
            $retypepassword = $this->input->post("retypepassword");
            $email = $this->input->post('email');
            $id_pegawai = $this->input->post('identitas_pegawai');
            $record = $this->PegawaiModel->get_NamePegawai($id_pegawai)->row();

            $DataUser = array(
                "id_users" => $this->input->post("id_users"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
                "hak_akses" => $this->input->post("hak_akses"),
                "id_pegawai" => $this->input->post("identitas_pegawai"),
                "nama_pegawai" => $record->nama_pegawai
            );
            $DataUser['created_at'] = date('Y-m-d H:i:s');
    
            $config['upload_path'] = './assets/images/users';
            $config['allowed_types'] = 'jpg|png|jpeg';
            
            $this->load->library('upload', $config);

            // Cek email apakah sudah digunakan?
            if($this->UsersModel->get_Email($email))
            {    
                $this->session->set_flashdata("error", "Email sudah digunakan! Silahkan inputkan email lainnya.");
                redirect(site_url("users/formcreate")); 
            } else {
                // Cek apakah inputan password dan retype password sama atau beda?
                if($password == $retypepassword)
                {
                    // Melakukan pengecekan upload image
                    if (!($this->upload->do_upload('foto_profil') && $this->upload->do_upload('qr_code'))){
                        $this->session->set_flashdata('error', 'File yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg, png atau gif.');
                        redirect(site_url("users/formcreate"));
                    } else {
    
                        $upload_data = $this->upload->data();
                        $DataUser['foto_profil'] = base_url("assets/images/users/").$upload_data['file_name'];
                        $DataUser['qr_code'] = base_url("assets/images/users/").$upload_data['file_name'];

                        if($this->UsersModel->insert_User($DataUser)){  
                            $this->session->set_flashdata('success', 'Data Akun Users berhasil ditambahkan.');
                            redirect(site_url("users"));
                        }else{
                            redirect(site_url("users/formcreate"));
                        }
                    }     
                } else {
                    $this->session->set_flashdata("error", "Password Salah! Terdapat ketidak samaan, periksa kembali.");
                    redirect(site_url("users/formcreate"));
                }
            }          
		}else{
            $data['new_id'] = $this->setIdUsers();
            $data['pegawai'] = $this->PegawaiModel->get_Pegawai()->result();
            $this->load->view('users/create',$data);
            $this->load->view('templates/footer'); 
        }     
    }

    public function setIdUsers(){
        
        $new_id = $this->UsersModel->get_idmax()->result();
        if($new_id > 0) {
            foreach ($new_id as $key) {
                $auto_id = $key->id_users;
            }
            return $id_users = $this->UsersModel->get_newid($auto_id);
        } 
    }

    /** Method untuk hapus data Users berdasarkan id */
    public function processDelete($id)
    {
        $this->UsersModel->delete_Users($id);
        $this->session->set_flashdata('info', 'Data Akun Users berhasil dihapus.');
        redirect(site_url("users")); 
    }
   
    /** Melepaskan Session Users Login untuk keluar */
    public function logout() 
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
}
?>