<?php
class postmodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
    //product
    public function category_post($table){
        $sql = "SELECT * FROM $table ORDER BY id_post DESC";
        return $this->db->select($sql);

    } 
    public function  postbyid($table,$cond){
          $sql = "SELECT * FROM $table WHERE $cond";
    
        return $this->db->select($sql);
    }

    public function insertpost($table,$data){
        return $this -> db->insert($table,$data);

    }

    
    public function post($tbl_post_flw,$tbl_post){
        $sql = "SELECT * FROM $tbl_post_flw,$tbl_post WHERE $tbl_post_flw.id_post = $tbl_post.id_post ORDER BY $tbl_post_flw.id_post DESC";
        return $this->db->select($sql);
    }

    public function updatepost($table,$data,$cond){
        return $this->db->update($table,$data,$cond);
    }
    
    public function deletepost($table,$cond){
        return $this->db->delete($table,$cond);
    }
    

    
    
}
