<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userdb extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->database();
    }
    public function setDetails() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'password' => md5($this->input->post('pass'))
        );
        $this->db->insert('info',$data);
    }
    public function getDetails($id = FALSE) {
        if($id === FALSE){
            $query = $this->db->get('info');
            return $query->result_array();
        }
        $query = $this->db->where('id',$id);
        $query = $this->db->get('info');
        return $query->result_array();
    }
    public function delDetail($id){
        return $this->db->delete('info',array('id' => $id));
    }
    public function editDetail($id) {
        $data_update = array(
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile')
        );
        $this->db->where('id',$id);
        return $this->db->update('info',$data_update);

    }
    public function loginDetails($username,$password) {
        $this->db->select('*');
        $this->db->where('email',$username);
        $this->db->where('password',$password);
        $this->db->from('info');
        $query = $this->db->get();
            return $query->row_array();
    }
}