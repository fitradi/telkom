<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Data_model extends CI_Model
{
    private $_table = "data";
    public $data_id;
    public $nama_lop;
    public $sto;
    public $koordinat;
    public $segment;
    public $distribusi;
    public $core_distribusi;
    public $slot_olt;
    public $port_olt;
    public $nama_olt;
    public $no_rak_ea;
    public $panel_ea;
    public $port_ea;
    public $panel_feeder;
    public $port_feeder;
    public $urutan_pasif_odc;
    public $port_pasif_odc;
    public $jalan;
    public $ancer;
    public $kecamatan;
    public $kelurahan;
    public $qr_code;
    public $tipe_odp;
    

    public function rules()
    {
        return [

            ['field' => 'nama_lop',
            'label' => 'nama_lop',
            'rules' => 'required'],
            
            ['field' => 'koordinat',
            'label' => 'koordinat',
            'rules' => 'required'],

            ['field' => 'distribusi',
            'label' => 'distribusi',
            'rules' => 'required']
        ];
    }

    public function getAll()
    {
        $product_join= $this->db->query("select c.data_id as data_id, c.nama_lop as nama_lop, c.koordinat as koordinat, c.segment as segment , c.distribusi as distribusi, c.core_distribusi as core_distribusi, c.slot_olt as slot_olt, c.port_olt as port_olt, c.sto as sto, c.nama_olt as nama_olt, c.no_rak_ea as no_rak_ea,c.no_rak_oa as no_rak_oa, c.panel_ea as panel_ea,c.panel_oa as panel_oa, c.port_ea as port_ea,c.port_oa as port_oa, c.panel_feeder as panel_feeder, c.port_feeder as port_feeder, c.urutan_pasif_odc as urutan_pasif_odc, c.port_pasif_odc as port_pasif_odc, c.panel_dist_odc as panel_dist_odc, c.port_dist_odc as port_dist_odc, c.jalan as jalan, c.ancer as ancer, c.kecamatan as kecamatan, c.kelurahan as kelurahan, c.qr_code as qr_code, c.tipe_odp as tipe_odp, p.sto as sto_name,b.name as nama from data c join sto p on p.id_sto=c.sto join products b on b.product_id=c.nama_lop")->result();
       
        return $product_join;
        // return $this->db->get($this->_table)->result();
    }

    public function getdata($where='')
    {
        return $this->db->query("select * from products $where;");
    }
    
    public function getById($id)
    {
        $product_join= $this->db->query("select c.data_id as data_id, c.nama_lop as nama_lop, c.koordinat as koordinat, c.segment as segment , c.distribusi as distribusi, c.core_distribusi as core_distribusi, c.slot_olt as slot_olt, c.port_olt as port_olt, c.sto as sto, c.nama_olt as nama_olt, c.no_rak_ea as no_rak_ea, c.panel_ea as panel_ea, c.port_ea as port_ea, c.panel_feeder as panel_feeder, c.port_feeder as port_feeder, c.urutan_pasif_odc as urutan_pasif_odc, c.port_pasif_odc as port_pasif_odc, c.panel_dist_odc as panel_dist_odc, c.port_dist_odc as port_dist_odc, c.jalan as jalan, c.ancer as ancer, c.kecamatan as kecamatan, c.kelurahan as kelurahan, c.qr_code as qr_code, c.tipe_odp as tipe_odp, p.sto as sto_name from data c join sto p on p.id_sto=c.sto where c.data_id='$id'")->row();
       
        return $product_join;
        // return $this->db->get_where($this->_table, ["data_id" => $id])->row();
    }
    public function getdata1()
    {
        $product_join= $this->db->query("select c.data_id as data_id, c.nama_lop as nama_lop, c.koordinat as koordinat, c.segment as segment , c.distribusi as distribusi, c.core_distribusi as core_distribusi, c.slot_olt as slot_olt, c.port_olt as port_olt, c.sto as sto, c.nama_olt as nama_olt, c.no_rak_ea as no_rak_ea, c.panel_ea as panel_ea, c.port_ea as port_ea, c.panel_feeder as panel_feeder, c.port_feeder as port_feeder, c.urutan_pasif_odc as urutan_pasif_odc, c.port_pasif_odc as port_pasif_odc, c.panel_dist_odc as panel_dist_odc, c.port_dist_odc as port_dist_odc, c.jalan as jalan, c.ancer as ancer, c.kecamatan as kecamatan, c.kelurahan as kelurahan, c.qr_code as qr_code, c.tipe_odp as tipe_odp, p.sto as sto_name from data c join sto p on p.id_sto=c.sto")->row();
       
        return $product_join;
        // return $this->db->get_where($this->_table, ["data_id" => $id])->row();
    }


    public function save()
    {
        $post = $this->input->post(); 
       
        $this->data_id = uniqid();
        $this->nama_lop = $post["nama_lop"];
        $this->sto = $post["sto"];
        $this->koordinat = $post["koordinat"];
        $this->segment = $post["segment"];
        $this->distribusi = $post["distribusi"];
        $this->core_distribusi = $post["core_distribusi"];
        $this->slot_olt = $post["slot_olt"];
        $this->port_olt = $post["port_olt"];
        $this->nama_olt = $post["nama_olt"];
        $this->no_rak_ea = $post["no_rak_ea"];
        $this->panel_ea = $post["panel_ea"];
        $this->port_ea = $post["port_ea"];
        $this->no_rak_oa = $post["no_rak_oa"];
        $this->panel_oa = $post["panel_oa"];
        $this->port_oa = $post["port_oa"];
        $this->panel_feeder = $post["panel_feeder"];
        $this->port_feeder = $post["port_feeder"];
        $this->urutan_pasif_odc = $post["urutan_pasif_odc"];
        $this->port_pasif_odc = $post["port_pasif_odc"];
        $this->panel_dist_odc = $post["panel_dist_odc"];
        $this->port_dist_odc = $post["port_dist_odc"];
        $this->jalan = $post["jalan"];
        $this->ancer = $post["ancer"];
        $this->kecamatan = $post["kecamatan"];
        $this->kelurahan = $post["kelurahan"];
        $this->qr_code = $post["qr_code"];
        $this->tipe_odp = $post["tipe_odp"];

       


        $this->db->insert($this->_table, $this);
        
        
        

        
    }
    public function update_return(){
        $post = $this->input->post(); 
        $nama_lop =   $post["nama_lop"];
        $push = $this->db->query("select sto from products where name='$nama_lop'")->row();
        $this->db->where('nama_lop',$nama_lop);
        $data = array('sto'=>$push);
        $this->db->update('data',$data);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->data_id = $post["id"];
        $this->nama_lop = $post["nama_lop"];
        $this->koordinat = $post["koordinat"];
        $this->segment = $post["segment"];
        $this->distribusi = $post["distribusi"];
        $this->core_distribusi = $post["core_distribusi"];
        $this->slot_olt = $post["slot_olt"];
        $this->port_olt = $post["port_olt"];
        $this->nama_olt = $post["nama_olt"];
        $this->no_rak_ea = $post["no_rak_ea"];
        $this->panel_ea = $post["panel_ea"];
        $this->port_ea = $post["port_ea"];
        $this->no_rak_oa = $post["no_rak_oa"];
        $this->panel_oa = $post["panel_oa"];
        $this->port_oa = $post["port_oa"];
        $this->panel_feeder = $post["panel_feeder"];
        $this->port_feeder = $post["port_feeder"];
        $this->urutan_pasif_odc = $post["urutan_pasif_odc"];
        $this->port_pasif_odc = $post["port_pasif_odc"];
        $this->panel_dist_odc = $post["panel_dist_odc"];
        $this->port_dist_odc = $post["port_dist_odc"];
        $this->jalan = $post["jalan"];
        $this->ancer = $post["ancer"];
        $this->kecamatan = $post["kecamatan"];
        $this->kelurahan = $post["kelurahan"];
        $this->qr_code = $post["qr_code"];
        $this->tipe_odp = $post["tipe_odp"];
        $this->db->update($this->_table, $this);
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("data_id" => $id));
    }
    
	
	
    public function view(){
        $this->db->from("products");
        $query = $this->db->get(); // Tampilkan semua data yang ada di tabel provinsi
        return $query;
    }

    



}
