<?php
class categorymodel extends DModel{
    public function __construct()
    {
        parent::__construct();
    }
    //product
    public function category($table){
        $sql = "SELECT * FROM $table ORDER BY id_category DESC";
        return $this->db->select($sql);

    } 
    public function category_home($table){
        $sql = "SELECT * FROM $table ORDER BY id_category DESC";
        return $this->db->select($sql);

    } 
    public function categorybyid_home($table,$table_product,$id){
        $sql = "SELECT * FROM $table,$table_product WHERE $table.id_category=$table_product.id_category AND $table_product.id_category='$id' ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);
    }
    public function  categorybyid($table,$cond){
          $sql = "SELECT * FROM $table WHERE $cond";
    
        return $this->db->select($sql);
    }

    public function insertcategory($table_category_product,$data){
        return $this -> db->insert($table_category_product,$data);

    }

    public function updatecategory($table,$data,$cond){
        return $this->db->update($table,$data,$cond);
    }
    public function deletecategory($table,$cond){
        return $this->db->delete($table,$cond);
    }


    
    //post category
    public function insertcategory_post($table,$data){
        return $this -> db->insert($table,$data);
    }

    public function post_category($table){
        $sql = "SELECT * FROM $table ORDER BY id_post DESC";
        return $this->db->select($sql);

    }
    public function categorypost_home($table){
        $sql = "SELECT * FROM $table ORDER BY id_post DESC";
        return $this->db->select($sql);

    }
   
    public function deletecategory_post($table,$cond){
        return $this->db->delete($table,$cond);
    }

    public function  categorybyid_post($table,$cond){
        $sql = "SELECT * FROM $table WHERE $cond";
  
      return $this->db->select($sql);
    }

    public function updatecategory_post($table,$data,$cond){
    return $this->db->update($table,$data,$cond);
    }

    //product
    public function insertproduct($table,$data){
        return $this -> db->insert($table,$data);
    }

    public function product($table_product,$table_category){
        $sql = "SELECT * FROM $table_product,$table_category WHERE $table_product.id_category = $table_category.id_category ORDER BY $table_product.id_product DESC";
        return $this->db->select($sql);

    }

    public function deleteproduct($table,$cond){
        return $this->db->delete($table,$cond);
    }
    
    public function  productbyid($table,$cond){
        $sql = "SELECT * FROM $table WHERE $cond";
  
      return $this->db->select($sql);
    }

    public function updateproduct($table,$data,$cond){
        return $this->db->update($table,$data,$cond);
    }
    
    public function list_product_home($table_product){
        $sql = "SELECT * FROM $table_product ORDER BY $table_product.id_product";
  
        return $this->db->select($sql);
    }

    public function details_product_home($table,$table_product,$cond){
         $sql = "SELECT * FROM $table_product,$table WHERE $cond";
  
        return $this->db->select($sql);
    }
}
