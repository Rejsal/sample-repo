<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Userinfohome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->model('userdb');
        $this->load->helper('form');
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
    }
    public function index() {
        $this->userhome();
    }

    public function userhome() {
        $data['title'] = "User form";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[info.email]',
        array('valid_email' => 'Mail not valid',
        'is_unique' => 'Mail id already exists'));
        $this->form_validation->set_rules('mobile','Mobile','required|is_natural|is_unique[info.mobile]|max_length[11]|min_length[10]',
        array(
            'min_length' => 'minimum length should be 10',
            'max_length' => 'maximum length should be 11',
            'is_natural' => 'mobile no. should contain only digits',
            'is_unique' => 'mobile no already exists'
        ));
        $this->form_validation->set_rules('pass','Password','required|min_length[8]',
        array(
            'min_length' => 'Password should contain atleast 8 characters' 
        ));
        if($this->form_validation->run() !== FALSE)  {
            $this->userdb->setDetails();
            redirect('userinfohome/userhome');
        }
        else { 
            $this->load->view('userform',$data);
        }

    }
    public function Userdetails() {
        $data['title'] = "User details";
        $data['user_items'] = $this->userdb->getDetails();
        $this->load->view('userdata',$data);
    }
    public function Userdelete() {
        $id = $this->uri->segment(3);
        $this->userdb->delDetail($id);
        redirect('userinfohome/userdetails');

    }
    public function Userget() {
        $data['title'] = "User edit form";
        $id = $this->uri->segment(3);
        $data['item_by_id'] = $this->userdb->getDetails($id);
        $this->load->view('edituser',$data);
    }
    public function Useredit() {
       // $data['name_by_id'] = $this->userdb->getDetails($id);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[info.email]',
        array('valid_email' => 'Mail not valid',
        'is_unique' => 'Mail id already exists'));
        $this->form_validation->set_rules('mobile','Mobile','required|is_natural|is_unique[info.mobile]|max_length[11]|min_length[10]',
        array(
            'min_length' => 'minimum length should be 10',
            'max_length' => 'maximum length should be 11',
            'is_natural' => 'mobile no. should contain only digits',
            'is_unique' => 'mobile no already exists'
        ));
        if($this->form_validation->run() === FALSE){
            $this->Userget();

        }
        else{
            $id = $this->uri->segment(3);
            $this->userdb->editDetail($id);
            redirect('userinfohome/userdetails');
        }
    }
    public function Userview() {
        $data['title'] = "User info";
        $id = $this->uri->segment(3);
        $data['items'] = $this->userdb->getDetails($id);
        $this->load->view('viewuser',$data);
    }
    public function do_upload() {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 10000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload',$config);
        if(!$this->upload->do_upload('userfile')){
            $error = array('error' => $this->upload->display_errors());
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('upload_success', $data);
        }
    }
    public function Login($msg=NULL) {
        $data['title'] = "Login form";
        $data['msg'] = $msg;
        $this->load->view('loginform',$data);
    }
    public function Loginprocess() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('pass','Password','required');
        if($this->form_validation->run()===FALSE) {
            $this->login();
        }
        else{
            $user = $this->input->post('email');
            $pass = md5($this->input->post('pass'));
            $data = $this->userdb->loginDetails($user,$pass);
            if($data){
                $title['title'] = "Welcome screen";
                $this->session->set_userdata('id',$data['id']);
                $this->session->set_userdata('email',$data['email']);
                $this->load->view('welcomescreen',$title);
            }
            else{
                $msg = '<font color=red>Invalid username and/or password.</font><br />';
                $this->Login($msg);
            }
        }

    }
    public function Logout() {
        $this->session->sess_destroy();
        redirect('userinfohome/login');
    }
}