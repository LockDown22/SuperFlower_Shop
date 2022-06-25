<?php
class categorymodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }

    public function category($table_category_product){
        $sql = "SELECT * FROM $table_category_product";
        return $this->db->select($sql);
        // $sql = "SELECT * FROM tbl_category_product ORDER BY id_category DESC";
        // $query = $this->db->query($sql);
        // $result = $query->fetchAll();
    
        // return $result;
    } 
    public function categorybyid($table_category_product,$id){
          $sql = "SELECT * FROM $table_category_product WHERE id_category=:id";
    
    
        $data = array(':id'=> $id);
        return $this->db->select($sql,$data);
    }

    public function insertcategory($table_category_product,$data){
        return $this -> db->insert($table_category_product,$data);

    }

    public function updatecategory($table_category_product,$data,$cond){
        return $this->db->update($table_category_product,$data,$cond);
    }
    public function deletecategory($table_category_product,$cond){
        return $this->db->delete($table_category_product,$cond);
    }



}
