<?php

class UsersModel extends CI_Model {

    public $_table = 'tb_users';

    public function attemptLogin($email,$password)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('tb_users.email',$email);
        $this->db->where('tb_users.password',$password);
        $query = $this->db->get();
        $result = $query->row();
        return $result;     
    }


    function login(){
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        return $this->db->get("tb_users");
    }

    function get_Users(){
        return $this->db->get("tb_users");
    }

    function get_UsersById($id){
        $this->db->where("id_users",$id);
        return $this->db->get("tb_users");
    }
    
    function get_UsersPegawai($id){
        $this->db->where("id_pegawai",$id);
        return $this->db->get("tb_users");
    }

    function get_Email($email){
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('tb_users.email',$email);
        $query = $this->db->get();
        $result = $query->row();
        return $result;     
    }

    

    function get_idmax(){
        $this->db->select_max("id_users");
        $this->db->from("tb_users");
        $query = $this->db->get();
        return $query;
    }

    function get_newid($auto_id){

        $tambah = (int)$auto_id + 1;
        return $tambah;;
    }

    function insert_User($data){
        return $this->db->insert("tb_users",$data);
    }

    function update_Users($id,$data){
        $this->db->where("id_users",$id);
        return $this->db->update('tb_users',$data);
    }

    /** Mencari users pada db berdasarkan id */
    function delete_Users($id){
        $this->db->where("id_users",$id);
        return $this->db->delete("tb_users");
    }

}