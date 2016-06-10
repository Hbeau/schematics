<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 16/05/2016
 * Time: 20:12
 */
class schematicModel extends CI_Model
{
    public function insert($name,$description,$size,$source){
$data= array(
    "name"=>$name,
    "description"=>$description,
    "size"=>$size
);
        $this->load->library("ftp");
        $config['hostname'] = '176.137.63.1';
        $config['username'] = 'schematics';
        $config['password'] = '123456';
        $config['port']="21012";
        $config['debug']	= TRUE;
        $this->ftp->connect($config);
        $list =$this->ftp->list_files('/home/schematics');
        var_dump($list);
        if(!in_array(str_replace(' ', '_',"/home/schematics/".$name), $list)){

        $this->ftp->mkdir('/home/schematics/' . str_replace(' ', '_', $name), DIR_WRITE_MODE);

    }

        $this->ftp->upload($source,'/home/schematics/' . str_replace(' ', '_', $name)."/test.zip");
        $this->ftp->close();


    }
    public function getShematics(){
        $result=$this->db->select("*")
                ->from("schematic")
                ->get()
                ->result_array();
    return $result;
    }
   
    public function getInfos(){
        $data=$this->getShematics();
        $i=0;
        foreach ($data as $row){
            $images=$this->getImages($row['name']);
            $like=$this->getlike($row['id']);
            $data[$i]['like']=$like;
            $data[$i]['images']=$images;
            $i++;
        }
        return $data;
    }
    public function getImages(){

    }
public function getlike($idSchema){
    $dislike =$this->db->select("*")
        ->from("likedislike")
        ->where("idSchema",$idSchema)
        ->where("like",0)
        ->get()
        ->num_rows();
    $like  =$this->db->select("*")
        ->from("likedislike")
        ->where("idSchema",$idSchema)
        ->where("like",1)
        ->get()
        ->num_rows();

    return array("like"=>$like,"dislike"=>$dislike);
}
    public function tumb($idSchema,$idUser,$up){
     
        $data=array(
            "idSchema"=>$idSchema,
            "idUser"=>$idUser,
            "like"=>$up
        );
        $id= $this->db->select('idUser')
                     ->from("likedislike")
                     ->where("idSchema",$idSchema)
                     ->where("idUser", $idUser)
                     ->get()
                     ->result();
        if(empty($id)){
         $this->db->insert("likedislike",$data);
        }
        
    }

}
