<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Overview extends CI_Controller {
	private $_table = "products";

    public function __construct()
    {
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("product_model");
		$this->load->model("data_model");
		$this->load->model("sales_model");
		$this->load->model("overview_model");
		if($this->session->userdata('status') !='login'){
			redirect('admin/login');
		};
	}

	public function index()
	{
		$golive         = $this->sales_model->getglv();
		$inputted       = $this->sales_model->getdata();
		$submitted		= $this->sales_model->submitted();
		$fisiks			= $this->sales_model->fisik();
		$progres		= $this->sales_model->progress();		
		$chek			= $this->sales_model->chek();
		$draw			= $this->sales_model->drawing();
		$push			= $this->sales_model->push();

		$input			= $inputted->num_rows();
        $total = array(
			'glv'   	=>$golive->num_rows(),
			'input'		=>$input,
			'submit'	=> $submitted->num_rows(),
			'fisik'		=> $fisiks->num_rows(),
			'progress'	=> $progres->num_rows(),
			'cek'		=> $chek->num_rows(),
			'drawing'	=> $draw->num_rows(),			
			'push'		=> $push->num_rows(),


			'sales' => $this->overview_model->view(),
			// 'sales' => $this->overview_model->dashboard(),
			'product' => $this->overview_model->get_products(),
			'package' => $this->overview_model->get_packages(),
		);
		$this->load->view("admin/overview", $total);
		
		
	}
	public function create(){
        // $package = $this->input->post('package',TRUE);
		
		
		$this->image = $this->_uploadImage();
        $this->name = substr($this->_uploadImage(), 0, -4);
		
		$package =  $this->name = substr($this->_uploadImage(), 0, -4);
		$this->db->insert($this->_table, $this);
        $product = $this->input->post('product',TRUE);
        $this->overview_model->create_package($package,$product);
		$this->db->query(" UPDATE `sales` SET `status` = 'Submitted' WHERE `sales`.`lop` = '$this->name';");
		
        redirect('admin/products/');
	}
	private function _uploadImage()	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'rar|zip';
		// $config['file_name']            = $this->product_id;
		$config['overwrite']			= true;
		$config['max_size']             = 10240; // 1MB

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$image = 'image';

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		print_r($this->upload->display_errors());
			// return 'gagal' ;
	}
	
	function get_product_by_package(){
        $package_id=$this->input->post('package_id');
        $data=$this->package_model->get_product_by_package($package_id)->result();
        foreach ($data as $result) {
            $value[] = (float) $result->id;
        }
        echo json_encode($value);
    }
	public function export(){
		// Load plugin PHPExcel nya
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Telkom Magelang')
					 ->setLastModifiedBy('Telkom Magelang')
					 ->setTitle("Data Sales")
					 ->setSubject("Sales")
					 ->setDescription("Laporan Semua Data Sales")
					 ->setKeywords("Data Sales");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
		  'font' => array('bold' => true), // Set font nya jadi bold
		  'alignment' => array(
			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
		  'alignment' => array(
			'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
		  ),
		  'borders' => array(
			'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
			'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
			'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
			'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
		  )
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA SALES"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:M1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "DATEL"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "MYIR"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "SALES"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "SUPERVISOR");
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "NAMA CUSTOMER");
		$excel->setActiveSheetIndex(0)->setCellValue('G3', "NAMA PROJECT");
		$excel->setActiveSheetIndex(0)->setCellValue('H3', "LATITUDE"); 
		$excel->setActiveSheetIndex(0)->setCellValue('I3', "LONGITUDE");
		$excel->setActiveSheetIndex(0)->setCellValue('J3', "LOP");// Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('K3', "MITRA");
		$excel->setActiveSheetIndex(0)->setCellValue('L3', "STATUS");
		$excel->setActiveSheetIndex(0)->setCellValue('M3', "TGL_GOLIVE");
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$sales = $this->overview_model->view();
		$no = 1; // Untuk penomoran tabel, di awal set dengan 1
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach($sales as $data){ // Lakukan looping pada variabel siswa
		  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
		  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->datel);
		  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->myir);
		  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->sales);
		  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->spv);
		  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->cust_name);
		  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->project);
		  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->latitude);
		  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->longitude);		  
		  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->lop);
		  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->mitra);
		  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->status);
		  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->tgl_glive);


		  
		  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
		  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
		  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
		  
		  $no++; // Tambah 1 setiap kali looping
		  $numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(20); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(10); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(10); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(20); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
		$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$excel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('L')->setWidth(10);
		$excel->getActiveSheet()->getColumnDimension('M')->setWidth(13);
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Sales");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data Sales.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	  }
	}
