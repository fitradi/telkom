<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("product_model");
		$this->load->model("overview_model");
		if($this->user_model->isNotLogin()) redirect(site_url('admin/login'));
	}

	public function index()
	{
		$jml            = $this->product_model->getdata();
        $jumlah_barang = $jml->num_rows();
        $total = array(
			'jlh_barang'    =>$jumlah_barang,
			'sales' => $this->overview_model->view(),
		);
		$this->load->view("admin/overview", $total);
		
		
	}
}
