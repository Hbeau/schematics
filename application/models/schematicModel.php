<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 16/05/2016
 * Time: 20:12
 */
class schematicModel extends CI_Model
{
    public function getShematics(){
        $result=$this->db->select("*")
                ->from("schematic")
                ->get()
                ->result_array();
    return $result;
    }
    public function getImages($id){
        $images=$this->db->select("*")
            ->from("image")
            ->where("idSchema",$id)
            ->get()
            ->result_array();
        return $images;
    }
    public function getInfos(){
        $data=$this->getShematics();
        $i=0;
        foreach ($data as $row){
            $images=$this->getImages($row['id']);
            $data[$i]['images']=$images;
            $i++;
        }
        return $data;
    }
}