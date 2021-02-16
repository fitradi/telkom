<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sales extends CI_Controller {
  private $filename = "import_data"; // Kita tentukan nama filenya
  
  public function __construct(){
    parent::__construct();
    if($this->session->userdata('status') !='login'){
      redirect('admin/login');
    };    
    $this->load->model('Sales_model');    
    $this->load->library('form_validation');
  }
  
  public function index(){
    $data['sales'] = $this->Sales_model->view();
    $this->load->view('admin/sales/view', $data);
  }
  
  public function form(){
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview'])){ // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
      $upload = $this->Sales_model->upload_file($this->filename);
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
        // Load plugin PHPExcel nya
        include APPPATH.'third_party/PHPExcel/PHPExcel.php';
        
        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('upload/sales/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
      }else{ // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    $this->load->view('admin/sales/form', $data);
  }
  
  public function import(){
    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
    
    $excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('upload/sales/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = array();
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1){
        // Kita push (add) array data ke variabel data
        array_push($data, array(
          'datel'=>$row['A'], 
          'myir'=>$row['B'], 
          'sales'=>$row['C'], 
          'spv'=>$row['D'], 
          'cust_name'=>$row['E'],
          'project'=>$row['F'],
          'latitude'=>$row['G'],
          'longitude'=>$row['H'],
        ));
        $myir[]=$row['B'];
        $datel=$row['A'];
        $sales=$row['C'];
        $cust_name=$row['E'];
        
      }
      
     
      $numrow++; // Tambah 1 setiap kali looping
    }
    $lul =implode(", ", $myir);
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
  //   print_r($myir);
  //   foreach($myir )
    $cek = $this->db->query("select concat(myir) as myir from sales where myir in ('$lul')");
  //   // foreach($cek as $ceks){
  //   //   $post_myir=$ceks->myir;
  //   // }    
    if($cek->num_rows()>0)
  {
    // $this->db->where_in('mysir',$lul);
    // $this->db->delete('sales'); 
    $this->db->query("DELETE from sales where myir in ($lul)");
    // $this->db->update_batch('sales', $data,'myir');
    $this->db->insert_batch('sales', $data);

  }else{
    $this->db->insert_batch('sales', $data);
  }
    
    redirect("admin/sales"); // Redirect ke halaman awal (ke controller siswa fungsi index)
  }
  public function edit($id = null){
    if (!isset($id)) redirect('admin/sales');
       
    $sales = $this->Sales_model;
    $validation = $this->form_validation;
    $validation->set_rules($sales->rules());

    if ($validation->run()) {
        $sales->update();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }

    // $data["sales"] = $sales->getById($id);
    // if (!$data["sales"]) show_404();
    $query_datel = $this->Sales_model->datel();
       

    $data= array (
        "sales" =>$sales->getById($id),
        'datel' => $query_datel,
    );
    if (!$data["sales"]) show_404();

    
    
    $this->load->view("admin/sales/edit", $data);
  }
  public function delete($id = null){
    if (!isset($id)) show_404();
        
    if ($this->Sales_model->delete($id)) {
      redirect(site_url('admin/sales'));
      // echo "busak";
  }
  } 

  public function add(){
    $sales = $this->Sales_model;
    $validation = $this->form_validation;
    $validation->set_rules($sales->rules());

    if ($validation->run()) {
        $sales->save();
        $this->session->set_flashdata('success', 'Berhasil disimpan');
    }
    $query_datel = $this->Sales_model->datel();
       

        $data= array (
            'datel' => $query_datel,
        );
    
    $this->load->view("admin/sales/add",$data);

  }
}