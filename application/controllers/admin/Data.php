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
		if($this->session->userdata('status') !='login'){
            redirect('admin/login');
        };
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
            // $product->update_return();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $query_lop = $this->data_model->view();      
        $data1= $product->getdata1();
        $data= array (
            'lop' => $query_lop,
            'data' => $data1,
        );
        

        $this->load->view("admin/data/new_form", $data);
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/data');
        $data["products"] = $this->data_model->getAll();
       
        $product = $this->data_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data1= $product->getdata1();
         
        $data= array (
            "product" => $product->getPake($id),
            "lop" => $this->data_model->view(),
            "data" => $data1,
        );
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

    function sto_tester(){

       $lop = $this->input->post('product_id');      

        
        // $data = $this->db->query("select * from prosducts where product_id=$datelsu")->result();
        $data = $this->db->query("select c.sto as sto,b.id_sto as id_sto,b.sto as nama_sto   from products c join  sto b on b.id_sto=c.sto where product_id='$lop'")->result();
        
        
        echo json_encode($data);
    }
    function sto_tester1(){

        $sto = $this->input->post('sto');
        // $sto=1;
        // return $sto;      
 
         
         // $data = $this->db->query("select * from prosducts where product_id=$datelsu")->result();
        //  $data1 = $this->db->query("select c.id_sto as id_sto,c.olt as olt,b.id_sto as id_sto,b.sto as nama_sto   from olt c join  sto b on b.id_sto=c.sto where c.id_sto='$lop1'")->result();
            $data1 = $this->db->query("select * from olt where id_sto=$sto")->result();
         
         echo json_encode($data1);
     }
    
    
      
}
