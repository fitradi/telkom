<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model
{
    private $_table = "products";

    public $product_id;
    public $name;
    public $pt2;
    public $image = "null";
    public $datel;
    public $sto;
    public $status;
    public $odc;
    public $jml_odp;
    

    public function rules()
    {
        return [

            ['field' => 'pt2',
            'label' => 'PT2',
            'rules' => 'numeric'],
            
            ['field' => 'datel',
            'label' => 'Datel',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getdata($where='')
    {
        return $this->db->query("select * from products $where;");
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["product_id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->product_id = uniqid();        
        $this->image = $this->_uploadImage();
        $this->name = substr($this->_uploadImage(), 0, -4); //$post["name"];
		$this->pt2 = $post["pt2"];
        $this->datel = $post["datel"];
        $this->sto = $post["sto"];
        $this->status = $post["status"];
        $this->odc = $post["odc"];
        $this->jml_odp = $post["jml_odp"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->product_id = $post["id"];
        $this->name = $post["name"];
        $this->pt2 = $post["pt2"];
        $this->sto = $post["sto"];
		
		
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}

        $this->datel = $post["datel"];
        $this->status = $post["status"];
        $this->odc = $post["odc"];
        $this->jml_odp = $post["jml_odp"];
        $this->db->update($this->_table, $this, array('product_id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("product_id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/product/';
		$config['allowed_types']        = 'rar|zip';
		// $config['file_name']            = $this->product_id;
		$config['overwrite']			= true;
		$config['max_size']             = 10240; // 1MB

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		
		return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$product = $this->getById($id);
		if ($product->image != "default.jpg") {
			$filename = explode(".", $product->image)[0];
			return array_map('unlink', glob(FCPATH."upload/product/$filename.*"));
		}
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
        public function Datel()
        {
            $this->db->order_by('id_datel', 'ASC');
            return $this->db->from('datel')
            ->get()
            ->result();
        }

        // public function Sto($id_datel)
        // {
        //     $this->db->where('id_datel', $id_datel);
        //     $this->db->order_by('id_sto', 'ASC');
        //     return $this->db->from('sto')
        //         ->get()
        //         ->result();
        // }
        public function view(){
            $this->db->from("datel");
            $query = $this->db->get(); // Tampilkan semua data yang ada di tabel provinsi
            return $query;
        }

        public function viewBydatel($datel){
            $this->db->where('datel', $datel);
            $result = $this->db->get('sto')->result(); // Tampilkan semua data kota berdasarkan id provinsi
            
            return $result; 
        }
    
        public function listSto($id){
            $this->db->from('sto');
            $this->db->where('id_sto', $id);
            $query = $this->db->get();
            return $query;
        }
        function get_sub_category($datel){   
            $query = $this->db->get_where('sto', array('id_sto' => $datel));
            return $query;
        }


}
