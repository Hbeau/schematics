<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 09:03
 */
class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }
public function index(){
    $this->register();
}

    public function register(){

        $this->load->library('form_validation');
        $this->load->helper('security');
        $this->form_validation->set_rules('username', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('password',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('passwordConfirmation',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags|matches[password]');
        $this->form_validation->set_rules('mail',    '"eMail"',       'trim|required|min_length[5]|max_length[40]|encode_php_tags|valid_email');

        if($this->form_validation->run()){
            
            $username = $this->security->xss_clean($this->input->post('username'));
            $password=md5($this->security->xss_clean($this->input->post('password')));
            $mail=$this->security->xss_clean($this->input->post('mail'));

            var_dump($username);
            $this->load->view('vue');
        }
        else{
            $this->load->view('registery');
        }
    }
}