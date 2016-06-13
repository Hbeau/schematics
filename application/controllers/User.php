<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 09:03
 */
class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('security');
        $this->load->helper('url');

        $this->load->model('UserModel');
    }
public function index(){
    $this->register();
}

    public function register(){


        $this->form_validation->set_rules('username', '"Nom d\'utilisateur"', 'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('password',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('passwordConfirmation',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags|matches[password]');
        $this->form_validation->set_rules('mail',    '"eMail"',       'trim|required|min_length[5]|max_length[40]|encode_php_tags|valid_email');

        if($this->form_validation->run()){

            $username = $this->security->xss_clean($this->input->post('username'));
            $password=md5($this->security->xss_clean($this->input->post('password')));
            $mail=$this->security->xss_clean($this->input->post('mail'));
            $avatar=$this->security->xss_clean($this->input->post("avatar"));

            $this->UserModel->insert($username,$password,$mail,$avatar);
            redirect('/schematics/', 'refresh');

        }
        else{
            $map =$this->loadImages();
            $data = array("map"=>$map);
            $this->load->view('registery',$data);
        }
    }


    private function loadImages(){
        $this->load->helper('directory');
        $map = directory_map('./assets/img/avatar',true,true);
        return $map;
    }
   public function login()
   {

       $this->form_validation->set_rules('username', '"nom d\'utilisateur"', 'trim|required|max_length[40]|alpha_dash|encode_php_tags');
       $this->form_validation->set_rules('password', '"mot de passe"', 'trim|required|max_length[40]|alpha_dash|encode_php_tags');
       if ($this->form_validation->run()) {
           //Field validation failed.  User redirected to login page
           $this->check_database();
           $session_data=$this->session->userdata('logged_in');
           $data['username']=$session_data['username'];
           redirect('/schematics/', 'refresh');

       } else {
           redirect('/schematics/', 'refresh');
       }
   }
       public function check_database(){

           $username=$this->input->post('username');
           $password=$this->input->post('password');

           $result = $this->UserModel->login($username,$password);
           if($result){
               foreach ($result as $row){
                   $sess_array= array(
                     'id'=>$row->id,
                       'username'=>$row->username,
                       'avatar'=>$row->avatar
                   );
                   var_dump($sess_array);
                   $this->session->set_userdata('logged_in',$sess_array);
               }

               return true;
           }
           else{

               return false;
           }
       }
    public function disconect(){
        $this->session->sess_destroy();
        redirect('/schematics/', 'refresh');
    }

}