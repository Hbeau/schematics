<?php

/**
 * Created by PhpStorm.
 * User: hugo
 * Date: 15/05/2016
 * Time: 20:30
 */

    class UserModel extends CI_Model
    {

        public function insert($username, $password, $mail,$avatar,$ran)
        {
            $data = array(
                "id" => null,
                "username" => $username,
                "password" => $password,
                "mail" => $mail,
                "grade" => "guest",
                "avatar"=>$avatar,
                "confirmation"=>$ran
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



        public function loadImages(){
            $this->load->helper('directory');
            $map = directory_map('./assets/img/avatar',true,true);
            return $map;
        }


            public function validateAccout($id,$ran){
                $nb=$this->db
                    ->select("*")
                    ->from("user")
                    ->where('confirmation')
                    ->limit(1)
                    ->get()
                    ->row_count();
                if($nb=$ran) {
                    $this->db->set('grade', 'new');
                    $this->db->where('id', $id);
                    $this->db->update('user');
                    return true;
                }
                return false;
            }


        public function getIdByUsername($usr){
            $query = $this->db
                ->select("id")
                ->from("user")
                ->where('username',$usr)
                ->limit(1)
                ->get()
                ->result();
            var_dump($query[0]->id);
            return $query[0]->id;
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

