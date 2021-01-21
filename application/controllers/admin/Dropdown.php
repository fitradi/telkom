<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dropdown extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
    }

    public function index()
    {   
        $anu["cuk"] = $this->product_model->view();
    
    $this->load->view('admin/product/add', $anu);
    $this->load->view('admin/products', $anu);
    $this->load->view('admin/products/add', $anu);
    
    
    
    }
    function get_sto()
    {
        $id_datel=$this->input->post('id_datel');
        $data=$this->product_model->sto($id_datel);
        echo json_encode($data);
    }
        
}
