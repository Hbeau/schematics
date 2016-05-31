<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 24/05/2016
 * Time: 15:13
 */
class imageModel extends CI_Model
{
    public function insert($path,$main,$idSchema){
$data=array(
    "path"=>$path,
    "main"=>$main,
    "idSchema"=>$idSchema
);
        $this->db->insert("image", $data);
    }
    public function getImages($id){
        $images=$this->db->select("*")
            ->from("image")
            ->where("idSchema",$id)
            ->get()
            ->result_array();
        return $images;
    }
}