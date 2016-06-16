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


    /*    $config['upload_path'] = 'uploads/';
        $config['allowed_types'] = '*';
        $this->load->library("upload",$config);*/
        
        $this->load->library('form_validation');
        $this->load->model('schematicModel');
        $this->load->model('UserModel');
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
            $map= $this->UserModel->loadImages();
            $data=array("map"=>$map);
            $this->load->view("template/header",$data);

        }

    }

    public function index()
    {
        $this->listSchema();
    }
    public function listSchema($filter ="",$offset=0){
        $this->load->model('schematicModel','schema');
        

        $data=$this->schema->getInfos($filter,$offset);
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

        if ($this->form_validation->run()) {

            $config['upload_path'] = 'uploads/temp';
            $config['allowed_types'] = '*';
            $this->load->library("upload",$config);



            $name = $this->security->xss_clean($this->input->post('name'));
            $description = md5($this->security->xss_clean($this->input->post('description')));

            if($this->upload->do_upload('fileSchema'))
            {

                $upload_data = $this->upload->data();

                $fileName = $upload_data['file_name'];

                $source = 'uploads/temp'.$fileName;


                $this->schematicModel->insert($name,$description,$upload_data);

                redirect("schematics/insertImage/".str_replace(" ","_",$name),"refresh");
            }

        } else {
            $this->load->view('formSchema');
        }
    }

    public function insertImage($name){


        mkdir("./uploads/schema/image/".$name);
        $this->load->view("uploadImages",array("name"=>$name));
    }

    public function uploadImage($rand){

        
        $config['upload_path'] = 'uploads/schema/image/'.$rand."/";
        $config['allowed_types'] = '*';
        $this->load->library("upload",$config);


        if($this->upload->do_upload('file'))
        {
            
            $this->upload->data();

        }
    }


}