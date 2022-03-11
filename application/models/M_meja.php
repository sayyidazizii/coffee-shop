<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_meja extends CI_Model
{

    public $table = 'meja';

    public function __construct()
    {
        parent::__construct();
    }
    public function data()
    {
        $query = $this->db->get($this->table);
        return  $query->result();
    }
    public function insert($meja)
    {
        $this->db->insert($this->table, $meja);
    }
    public function getbyid($id_meja)
    {
        $this->db->where('id_meja', $id_meja);
        $query = $this->db->get('meja');
        return $query->row();
    }
    public function editmeja($id,$data)
    {
        $this->db->where('id_meja', $id);
        $this->db->update('meja', $data);
    }
    public function hapus($id_meja)
    {
        $this->db->where('id_meja', $id_meja);
        $this->db->delete($this->table);
    }
}
