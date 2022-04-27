<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_log extends CI_Model
{

    public $table = 'log_aktivitas';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function data($number,$offset){
		 $query = $this->db->get('log_aktivitas',$number,$offset);
         return $query->result_array();		
	}

    public function jumlah_data(){
		return $this->db->get($this->table)->num_rows();
	}


    //menyimpan log otomatis
    public function save_log($param)
    {
        $sql        = $this->db->insert_string('log_aktivitas',$param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function homelog()
    {
        $this->db->select('*');
        $this->db->from('log_aktivitas');
        $this->db->order_by('id_log','desc');
        $query = $this->db->get();
        return $query->row_array();
    }
}
