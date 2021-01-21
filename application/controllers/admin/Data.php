<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("data_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
    }

    public function index()
    {
        $data["products"] = $this->data_model->getAll();        
        $this->load->view("admin/data/list", $data);
        
    }


    public function add()
    {
        $product = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        

        $this->load->view("admin/data/new_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/data');
       
        $product = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("admin/data/edit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->data_model->delete($id)) {
            redirect(site_url('admin/data'));
        }
    }

    
    
      
}
