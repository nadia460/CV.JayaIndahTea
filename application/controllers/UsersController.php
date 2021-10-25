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
        
        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
        $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');
	}

    protected function setValidationImage($type = 'add')
	{
        if (empty($_FILES['foto_profil']['name']) && $type == 'add') {
			$this->form_validation->set_rules('foto_profil', 'Foto Profil', 'required');
		}

        if (empty($_FILES['qr_code']['name']) && $type == 'add') {
			$this->form_validation->set_rules('qr_code', 'QR CODE', 'required');
		}

        $this->form_validation->set_message('required','Kosong. Inputkan %s!');
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
        $this->setValidationImage();
        if ($this->form_validation->run()) 
        {
            $password = $this->input->post("password");
            $retypepassword = $this->input->post("retypepassword");
            $email = $this->input->post('email');
            $id_pegawai = $this->input->post('identitas_pegawai');
            $record = $this->PegawaiModel->get_PegawaiById($id_pegawai)->row();

            $DataUser = array(
                "id_users" => $this->input->post("id_users"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
                "hak_akses" => $this->input->post("hak_akses"),
                "id_pegawai" => $this->input->post("identitas_pegawai"),
                "nama_pegawai" => $record->nama_pegawai
            );
            $DataUser['created_at'] = date('Y-m-d H:i:s');
    
            $config['upload_path'] = './assets/images/users/';
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
                    // Melakukan pengecekan upload image Foto Profil
                    if (!($this->upload->do_upload('foto_profil'))){
                        $this->session->set_flashdata('error', 'File Foto Profil yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg atau png');
                        redirect(site_url("users/formcreate"));
                    } else {
                        $upload_data = $this->upload->data();
                        $DataUser['foto_profil'] = base_url("assets/images/users/").$upload_data['file_name']; //input image ke db
                    } 

                    // Melakukan pengecekan upload image QR Code
                    if (!($this->upload->do_upload('qr_code'))){
                        $this->session->set_flashdata('error', 'File QR Code yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg atau png');
                        redirect(site_url("users/formcreate"));
                    } else {
                        $upload_data = $this->upload->data();      
                        $DataUser['qr_code'] = base_url("assets/images/users/").$upload_data['file_name'];  //input image ke db      
                    } 
                    
                    //Melakukan insert data user ke database
                    if($this->UsersModel->insert_User($DataUser)){  
                        $this->session->set_flashdata('success', 'Data Akun Users berhasil ditambahkan.');
                        redirect(site_url("users"));
                    }else{
                        redirect(site_url("users/formcreate"));
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

    function formUpdate($id)
    {
        $data['record'] = $this->UsersModel->get_UsersById($id)->row();
        $data['pegawai'] = $this->PegawaiModel->get_Pegawai()->result();
        $this->load->view('users/update',$data);
        $this->load->view('templates/footer'); 
    }

    function processUpdate($id) 
    { 
        $this->setValidationRules();
        if ($this->form_validation->run()) 
        {
            $password = $this->input->post("password");
            $retypepassword = $this->input->post("retypepassword");
            $email = $this->input->post('email');
            $id_pegawai = $this->input->post('identitas_pegawai');
            $record = $this->PegawaiModel->get_PegawaiById($id_pegawai)->row();

            $DataUser = array(
                "id_users" => $this->input->post("id_users"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("password"),
                "hak_akses" => $this->input->post("hak_akses"),
                "id_pegawai" => $this->input->post("identitas_pegawai"),
                "nama_pegawai" => $record->nama_pegawai
            );
            $DataUser['updated_at'] = date('Y-m-d H:i:s');
    
            $config['upload_path'] = './assets/images/users/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            
            $this->load->library('upload', $config);

            
            // Cek apakah inputan password dan retype password sama atau beda?
            if($password == $retypepassword)
            {
                $this->setValidationImage();
                if ( !empty($_FILES['foto_profil']['name']) && !empty($_FILES['qr_code']['name'])) {
                    //
                    // Melakukan pengecekan upload image Foto Profil
                    if (!($this->upload->do_upload('foto_profil'))){
                        $this->session->set_flashdata('error', 'File Foto Profil yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg atau png');
                        redirect(site_url('users/formupdate/'.$id));
                    } else {
                        $upload_data = $this->upload->data();
                        $DataUser['foto_profil'] = base_url("assets/images/users/").$upload_data['file_name']; //input image ke db
                    } 

                    // Melakukan pengecekan upload image QR Code
                    if (!($this->upload->do_upload('qr_code'))){
                        $this->session->set_flashdata('error', 'File QR Code yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg atau png');
                        redirect(site_url('users/formupdate/'.$id));
                    } else {
                        $upload_data = $this->upload->data();      
                        $DataUser['qr_code'] = base_url("assets/images/users/").$upload_data['file_name'];  //input image ke db      
                    }
                } elseif ( !empty($_FILES['foto_profil']['name']) && empty($_FILES['qr_code']['name'])) {

                    // Melakukan pengecekan upload image Foto Profil
                    if (!($this->upload->do_upload('foto_profil'))){
                        $this->session->set_flashdata('error', 'File Foto Profil yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg atau png');
                        redirect(site_url('users/formupdate/'.$id));
                    } else {
                        $upload_data = $this->upload->data();
                        $DataUser['foto_profil'] = base_url("assets/images/users/").$upload_data['file_name']; //input image ke db
                    }  

                    
                } elseif ( empty($_FILES['foto_profil']['name']) && !empty($_FILES['qr_code']['name'])) {

                    // Melakukan pengecekan upload image QR Code
                    if (!($this->upload->do_upload('qr_code'))){
                        $this->session->set_flashdata('error', 'File QR Code yang dinputkan tidak sesuai. Masukan file dengan format jpeg, jpg atau png');
                        redirect(site_url('users/formupdate/'.$id));
                    } else {
                        $upload_data = $this->upload->data();      
                        $DataUser['qr_code'] = base_url("assets/images/users/").$upload_data['file_name'];  //input image ke db      
                    }
                    
                } else {}

                //Melakukan insert data user ke database
                    if($this->UsersModel->update_Users($id, $DataUser)){  
                        $this->session->set_flashdata('success', 'Data Akun Users berhasil diedit.');
                        redirect(site_url("users"));
                    }else{
                        redirect(site_url('users/formupdate/'.$id));
                    }
                    
            } else {
                $this->session->set_flashdata("error", "Password Salah! Terdapat ketidak samaan, periksa kembali.");
                redirect(site_url('users/formupdate/'.$id));
            }
                      
		}else{
            $data['record'] = $this->UsersModel->get_UsersById($id)->row();
            $data['pegawai'] = $this->PegawaiModel->get_Pegawai()->result();
            $this->load->view('users/update',$data);
            $this->load->view('templates/footer'); 
        }
    }

    function formUpdate_Email($id)
    {
        $data['record'] = $this->UsersModel->get_UsersById($id)->row();
        //$data['pegawai'] = $this->PegawaiModel->get_Pegawai()->result();
        $this->load->view('users/update_email',$data);
        $this->load->view('templates/footer'); 
    }

    function formUpdate_Pass($id)
    {
        $data['record'] = $this->UsersModel->get_UsersById($id)->row();
        //$data['pegawai'] = $this->PegawaiModel->get_Pegawai()->result();
        $this->load->view('users/update_password',$data);
        $this->load->view('templates/footer'); 
    }

    public function processUpdate_Email($id){
        //if($this->input->post("email")){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_message('required','Kosong. Inputkan %s!');
            $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');

            if ($this->form_validation->run()) 
            {
                
                $email = $this->input->post("email");
                $password = $this->input->post("password");
                $record = $this->UsersModel->get_UsersById($id)->row();;

                // Cek email apakah sudah digunakan?
                if($this->UsersModel->get_Email($email))
                { 
                    $this->session->set_flashdata("error", "Email sudah digunakan! Silahkan inputkan email lainnya.");
                    redirect(site_url('users/formupdate/email/'.$id));
                    
                } else {
                    // Memeriksa password apakah sesuai, berdasarkan id user
                    if($record->password == $password){
                        $DataUser['email'] =$this->input->post("email");

                        //Melakukan insert data user ke database
                        if($this->UsersModel->update_Users($id, $DataUser)){  
                            $this->session->set_flashdata('success', 'Email berhasil diedit.');
                            redirect(site_url('users/formupdate/'.$id));
                        }else{
                            redirect(site_url('users/formupdate/'.$id));
                        }
                    } else {
                        $this->session->set_flashdata("error", "Password Salah! Periksa kembali.");
                        redirect(site_url('users/formupdate/email/'.$id));
                    }
                    
                }
                
            } else {
                $data['record'] = $this->UsersModel->get_UsersById($id)->row();
                $this->load->view('users/update_email',$data);
                $this->load->view('templates/footer');
            }
    }

    public function processUpdate_Pass($id){
        //if($this->input->post("email")){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_message('required','Kosong. Inputkan %s!');
            $this->form_validation->set_message('max_length','Nilai %s melebihi batas.');

            if ($this->form_validation->run()) 
            {
                
                $email = $this->input->post("email");
                $password = $this->input->post("password");
                $retypepassword = $this->input->post("retypepassword");
                $record = $this->UsersModel->get_UsersById($id)->row();

                // Cek email apakah sudah digunakan?
                if($record->email == $email)
                { 
                    // Memeriksa kesesuaian password akun yang dimiliki
                    if($password == $retypepassword){
                        $DataUser['password'] = $password;

                        //Melakukan insert data user ke database
                        if($this->UsersModel->update_Users($id, $DataUser)){  
                            $this->session->set_flashdata('success', 'Password berhasil diedit.');
                            redirect(site_url('users/formupdate/'.$id));
                        }else{
                            redirect(site_url('users/formupdate/'.$id));
                        }
                    } else {
                        $this->session->set_flashdata("error", "Password Salah! Periksa kembali.");
                        redirect(site_url('users/formupdate/pass/'.$id));
                    }
                    
                } else {
                    
                    $this->session->set_flashdata("error", "Email Salah! Periksa kembali.");
                    redirect(site_url('users/formupdate/pass/'.$id));
                }
                
            } else {
                $data['record'] = $this->UsersModel->get_UsersById($id)->row();
                $this->load->view('users/update_email',$data);
                $this->load->view('templates/footer');
            }
    }

    public function readbyid($id){
        $data['record'] = $this->UsersModel->get_UsersById($id)->row();
        $this->load->view('users/read',$data);
        $this->load->view('templates/footer'); 
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