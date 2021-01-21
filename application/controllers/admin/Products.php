<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("product_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["products"] = $this->product_model->getAll();        
        // $nana["hasil"]=$this->product_model->Datel();
        $this->load->view("admin/product/list", $data);
        // $this->load->view("admin/product/new_form", $nana);
        $query_datel = $this->product_model->Datel();      

        $tes= array (
            'datel' => $query_datel,
        );
        $this->load->view("admin/product/edit_form", $tes);
        
    }


    public function add()
    {
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $query_datel = $this->product_model->view();
       

        $data= array (
            'datel' => $query_datel,
        );

        $this->load->view("admin/product/new_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/products');
       
        $product = $this->product_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();

        $query_datel = $this->product_model->view();
       

        $anu= array (
            'datel' => $query_datel,
        );
        
        
        $this->load->view("admin/product/edit_form", $data, $anu);
    }

    public function tes(){
        $query_datel = $this->db->query("select * from datel")->result();
       

        $anu= array (
            'anu' => $query_datel,
        );
        $this->load->view("admin/product/edit_form", $anu);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->product_model->delete($id)) {
            redirect(site_url('admin/products'));
        }
    }

   
      function sto_test(){

        $datel = $this->input->post('id_datel');

        
        $data = $this->db->query("select * from sto where id_datel='$datel'")->result();
        
        echo json_encode($data);
    }
    
      
}
