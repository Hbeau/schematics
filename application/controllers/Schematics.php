<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 11/05/2016
 * Time: 15:22
 */
class Schematics extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('assets');
        $this->load->helper('form');


        $this->load->library('form_validation');
        $this->load->library('parser');

        $this->load->model('schematicModel');
        $this->load->model('imageModel');



    }

    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('home', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
       $this->listSchema();
    }
    public function acceuil()
{

    $data=array();
    $data["nom"]="jean kevin";
    $this->load->view('vue',$data);
}
    public function test($pseudo='')
    {
        echo 'hello '.$pseudo;

    }

    public function listSchema(){
        $this->load->model('schematicModel','schema');

        $data=$this->schema->getInfos();
        $info= array("data"=>$data);
     
        $this->load->view("schema",$info);
    }

    public function insert(){


        $this->form_validation->set_rules('name', '"Nom du schema"', 'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('description',    '"Mot de passe"',       'trim|required|min_length[5]|max_length[40]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('size',    '"taille"',       'trim|required|min_length[1]|max_length[3]|numeric|encode_php_tags');



        if($this->form_validation->run()){

            $name = $this->security->xss_clean($this->input->post('name'));
            $description=md5($this->security->xss_clean($this->input->post('description')));
            $size=$this->security->xss_clean($this->input->post('size'));

            $this->schematicModel->insert($name,$description,$size);

            $this->load->this->listSchema;
        }
        else{
            $this->load->view('formSchema');
        }
        
    }
}