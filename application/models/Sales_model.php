<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sales_model extends CI_Model {
  private $_table = "sales";
  public $id;
  public $datel;
  public $myir;
  public $sales;
  public $spv;
  public $cust_name;
  public $project;
  public $latitude;
  public $longitude;
  public $lop;
  public $mitra;
  public $status;
  public $tgl_glive;

  public function view(){
    return $this->db->get('sales')->result(); // Tampilkan semua data yang ada di tabel siswa
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './upload/sales/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  // public function insert_multiple($data){
  //      $cek = $this->db->query("select * from sales where myir = '$myir'and datel = '$datel'  and cust_name = '$cust_name';");
  //     if($cek->num_rows()>0)
  //   {
  //     echo "Terdapat data duplikat";
  //   }else{
  //     $this->db->insert_batch('sales', $data);
  //   }
    
  // }
  public function rules()
    {
        return [

            ['field' => 'id',
            'label' => 'id',
            'rules' => 'numeric'],
            
            ['field' => 'datel',
            'label' => 'datel',
            'rules' => 'required'],

            ['field' => 'myir',
            'label' => 'myir',
            'rules' => 'required']
        ];
    }
    public function getById($id){
      return $this->db->get_where($this->_table, ["id" => $id])->row();
    }
    public function getdata($where='')
    {
        return $this->db->query("select * from sales where status='Inputted';");
    }
  public function update()
  {
    $post = $this->input->post();
        $this->id = $post["id"];
        $this->datel = $post["datel"];
        $this->myir= $post["myir"];
        $this->sales = $post["sales"];
        $this->spv = $post["spv"];
        $this->cust_name = $post["cust_name"];
        $this->project = $post["project"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->lop = $post["lop"];
        $this->mitra = $post["mitra"];
        $this->status = $post["status"];
        $this->tgl_glive = $post["tgl_glive"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
  }
  public function delete($id){
    $this->db->delete($this->_table, array("id" => $id));
    return $this->db->delete($this->_table, array("id" => $id));
  }
  public function save()    {
    $post = $this->input->post();
        $this->datel = $post["datel"];
        $this->myir= $post["myir"];
        $this->sales = $post["sales"];
        $this->spv = $post["spv"];
        $this->cust_name = $post["cust_name"];
        $this->project = $post["project"];
        $this->latitude = $post["latitude"];
        $this->longitude = $post["longitude"];
        $this->db->insert($this->_table, $this);
    }
  public function datel(){
      $this->db->from("datel");
      $query = $this->db->get(); // Tampilkan semua data yang ada di tabel provinsi
      return $query;
  }
}