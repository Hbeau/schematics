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


        $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $this->load->library("upload",$config);
        
        $this->load->library('form_validation');
        $this->load->model('schematicModel');
        $this->load->model('imageModel');

        if($this->session->userdata('logged_in'))
        {

            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $data['avatar']= $session_data['avatar'];

            //   $this->load->view('home', $data);

            $this->load->view("template/header",$data);
            

        }
        else
        {

            $this->load->view("template/header");

        }

    }

    public function index()
    {
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

    public function tumb($idSchema,$like){
        $session_data = $this->session->userdata('logged_in');
        $data['id'] = $session_data['id'];
        $this->load->model('schematicModel','schema');

        if(isset($session_data['id'])){

            $idUser=$session_data['id'];
            if($like=="like"){

                $this->schema->tumb($idUser,$idSchema,1);        
            }
            else if($like=="dislike"){

                $this->schema->tumb($idUser,$idSchema,0);
            }


        }
        $this->index();
    }

    public function insert()
    {


        $this->form_validation->set_rules('name', '"Nom du schema"', 'trim|required|min_length[5]|max_length[40]|encode_php_tags');
        $this->form_validation->set_rules('description', '"description"', 'trim|required|min_length[5]|max_length[350]|encode_php_tags');
        $this->form_validation->set_rules('size', '"taille"', 'trim|required|min_length[1]|max_length[3]|numeric|encode_php_tags');


        if ($this->form_validation->run()) {

            $config['upload_path'] = 'uploads/';
            $config['allowed_types'] = '*';
            $this->load->library("upload",$config);



            $name = $this->security->xss_clean($this->input->post('name'));
            $description = md5($this->security->xss_clean($this->input->post('description')));
            $size = $this->security->xss_clean($this->input->post('size'));


            if ($this->upload->do_upload('fileSchema')) {

                $upload_data = $this->upload->data();
                var_dump($upload_data);
                $fileName = $upload_data['file_name'];

                $source = 'uploads/' . $fileName;

                $this->schematicModel->insert($name, $description, $upload_data);

            }

            if($this->upload->do_upload('fileSchema'))
            {

                $upload_data = $this->upload->data();
                var_dump($upload_data);
                $fileName = $upload_data['file_name'];

                $source = 'uploads/'.$fileName;

                $this->schematicModel->insert($name,$description,$upload_data);

            }

            $this->listSchema();
        } else {
            $this->load->view('formSchema');
        }
    }

    public function uploadImage(){

        
        $config['upload_path'] = 'uploads/schema/';
        $config['allowed_types'] = '*';
        $this->load->library("upload",$config);


        if($this->upload->do_upload('file'))
        {
            
            $this->upload->data();

        }
    }


}