<?php

class Overview_model extends CI_Model
{
  public function view(){
    return $this->db->get('sales')->result(); // Tampilkan semua data yang ada di tabel siswa
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
}