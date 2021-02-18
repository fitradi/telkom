<?php

class Overview_model extends CI_Model
{
  public function view(){
    return $this->db->get('sales')->result(); 
  }

  public function dashboard(){
    
    return $this->db->query("SELECT * FROM `lop` JOIN sales WHERE sales.id=lop.id_sales;")->result();
    
  }
  public function hitungJumlahAsset(){   
    $query = $this->db->get('tb_asset');
    if($query->num_rows()>0)
    {
      return $query->num_rows();
    }
    else
    {
      return 0;
    }
  }
  // GET ALL PRODUCT
  function get_products(){
    $query = $this->db->get('sales');
    return $query;
  }

//GET PRODUCT BY PACKAGE ID
function get_product_by_package($package_id){
    $this->db->select('*');
    $this->db->from('sales');
    $this->db->join('detail', 'detail_product_id=id');
    $this->db->join('package', 'package_id=detail_package_id');
    $this->db->where('package_id',$package_id);
    $query = $this->db->get();
    return $query;
}

//READ
function get_packages(){
    $this->db->select('package.*,COUNT(id) AS item_product');
    $this->db->from('package');
    $this->db->join('detail', 'package_id=detail_package_id');
    $this->db->join('sales', 'detail_product_id=id');
    $this->db->group_by('package_id');
    $query = $this->db->get();
    return $query;
}

// CREATE
function create_package($package,$product){
    $this->db->trans_start();
        //INSERT TO PACKAGE
        date_default_timezone_set("Asia/Bangkok");
        $data  = array(
            'package_name' => $package,
            'package_created_at' => date('Y-m-d H:i:s') 
        );
        $this->db->insert('package', $data);
        //GET ID PACKAGE
        $package_id = $this->db->insert_id();
        $result = array();
            foreach($product AS $key => $val){
                 $result[] = array(
                  'detail_package_id'   => $package_id,
                  'detail_product_id'   => $_POST['product'][$key]
                 );
                 $id= $_POST['product'][$key];                
                 $this->db->query(" UPDATE `sales` SET `lop` = '$package' WHERE `sales`.`id` = '$id';");
            }      
        //MULTIPLE INSERT TO DETAIL TABLE
        $this->db->insert_batch('detail', $result);
    $this->db->trans_complete();
}


}