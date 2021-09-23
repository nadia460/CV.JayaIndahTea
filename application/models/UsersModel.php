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

    function insertUser($user){
        return $this->db->insert("tb_users",$user);
    }
    function login(){
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $this->db->where("email",$email);
        $this->db->where("password",$password);
        return $this->db->get("tb_users");
    }

    function getUsers(){
        return $this->db->get("tb_users");
    }

    /** Mencari users pada db berdasarkan id */
    function hapus_users($id){
        $this->db->where("id",$id);
        return $this->db->delete("tb_users");
    }

    function getemail($email){
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('tb_users.email',$email);
        $query = $this->db->get();
        $result = $query->row();
        return $result;     
    }
}