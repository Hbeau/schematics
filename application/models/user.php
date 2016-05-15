<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 20:30
 */
class user extends CI_Model
{

    public function insert($username,$password,$mail){
        $data=array(
            "id"=>null,
            "username"=>$username,
            "password"=>$password,
            "mail"=>$mail,
            "grade"=>"nouveau"
        );
        $this->db->insert("user",$data);

    }
}