<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<?php
class Product_Model extends CI_Model
{

  public function getAllCategory(){
     $query = $this->db->get('tbl_product_category');
     return $query->result();
}

public function getAllSubCategory($product_category_id){

  $query = $this->db->get_where('tbl_product_subcategory', array('product_category_id' => $product_category_id));
  return $query->result();

 
}

}
?>