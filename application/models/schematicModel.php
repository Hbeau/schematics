<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 16/05/2016
 * Time: 20:12
 */
class schematicModel extends CI_Model
{
    public function insert($name,$description,$upload_data,$user){

echo "test";
        $date = new DateTime();

$data= array(
    "name"=>$name,
    "description"=>$description,
    "size"=>$upload_data["file_size"],
    "date"=>$date->format('Y-m-d'),
    "idUser"=>$user
);
        var_dump($data);

        $this->db->insert("schematic",$data);
      $this->uploadSchema($name,$upload_data);



    }


    private function uploadSchema($name,$upload_data){


try {
    $this->load->library("ftp");
    $config['hostname'] = '176.137.63.1';
    $config['username'] = 'schematics';
    $config['password'] = '123456';
    $config['port'] = "21012";
    $config['debug'] = TRUE;
    $this->ftp->connect($config);
    $list = $this->ftp->list_files('/home/schematics');
    var_dump($list);
    $ftp_path = '/home/schematics/' . str_replace(' ', '_', $name);
    if (!in_array($ftp_path, $list)) {

        $this->ftp->mkdir($ftp_path, DIR_WRITE_MODE);

    }

    echo "./uploads/temp/" . $upload_data["file_name"];
    $this->ftp->upload("./uploads/temp/" . $upload_data["file_name"], $ftp_path . "/" . $upload_data["file_name"]);
    $this->ftp->close();

}
catch (Exception $e){

}
    }

    public function getShematics($order="date",$offset = 0){
       var_dump($order);
        $result=$this->db->select("*")
                ->from("schematic")
                ->order_by($order, "desc")
                ->limit($offset,30)
                ->get()
                ->result_array();
    return $result;
    }
   public function get_count(){
       $result=$this->db->select("*")
           ->from("schematic")
           ->count_all_results();
       return $result;
   }
    public function getInfos($order="date",$offset = 0){
        $data=$this->getShematics($order,$offset);
        $a=0;
        $i=0;
        foreach ($data as $row){
            $images=$this->getImages($row['name']);
            $like=$this->getlike($row['id']);
            $data[$i]['like']=$like;
            $data[$i]['images']=$images;
            $data[$i]['author']=$this->getAutor($row['idUser']);
            $data[$i]['category']=$this->getCategory($row['id']);
            $i++;
        }
        return $data;
    }
    public function getImages($name){

        $name=str_replace(" ","_",$name);

        $this->load->helper("directory");
        $map = directory_map("./uploads/schema/image/".$name);
        return $map;
    }

    public function getCategory($id){
        return $this->db->select("*")
                            ->from("category")
                            ->join("schemacategory","schemacategory.idCategory=category.id")
                            ->where("schemacategory.idShema",$id)
                            ->get()
                            ->result();
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


    public function  getAutor($id){
        $this->load->model("userModel");
        return $this->userModel->getUserById($id);

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

    public function getfilename($name){
        $this->load->library("ftp");
        $config['hostname'] = '176.137.63.1';
        $config['username'] = 'schematics';
        $config['password'] = '123456';
        $config['port']="21012";
        $config['debug']	= TRUE;
        $this->ftp->connect($config);
        $list =$this->ftp->list_files('/home/schematics'.$name);
    }

}
