<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 20:30
 */

    class UserModel extends CI_Model
    {

        public function insert($username, $password, $mail,$avatar)
        {
            $data = array(
                "id" => null,
                "username" => $username,
                "password" => $password,
                "mail" => $mail,
                "grade" => "guest",
                "avatar"=>$avatar
            );
            $this->db->insert("user", $data);
        }
            public function login($username, $password)
            {
                $query=$this->db->select('id,username,password,avatar')
                         ->from('user')
                         ->where('username',$username)
                         ->where('password',MD5($password))
                         ->limit(1)
                         ->get();
                if($query -> num_rows() == 1)
                {
                    return $query->result();
                }
                else
                {
                    return false;
                }
            }

            public function getUserById($id){

                $query = $this->db
                        ->select("*")
                        ->from("user")
                        ->where('id',$id)
                        ->limit(1)
                        ->get()
                        ->result();
              return $query;
            }


            public function validateAccout($id){
                $this->db->set('grade', 'new', FALSE);
                $this->db->where('id', $id);
                $this->db->update('user');
            }
        
            public function getSchemaByUserId($id){
                $query = $this->db
                    ->select("*")
                    ->from("schematic")
                    ->where('idUser',$id)
                    ->get()
                    ->result_array();
                return $query;
            }
        }

