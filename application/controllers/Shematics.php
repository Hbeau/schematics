<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 11/05/2016
 * Time: 15:22
 */
class Shematics extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('assets');
    }

    public function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username'];
            $this->load->view('home_view', $data);
        }
        else
        {
            //If no session, redirect to login page
            redirect('login', 'refresh');
        }
        $this->load->database();
        $result=$this->db->select('id,mail')
                         ->from('user')
                         ->get()
                         ->result();
        var_dump($result);
       $this->redirect('home','refresh');
        
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

    }

    public function insert
}