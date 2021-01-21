<?php

class Overview_model extends CI_Model
{
    public function hitungJumlahAsset()
{   
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