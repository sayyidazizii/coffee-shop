<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_menu extends CI_Model
{

    public $table = 'masakan';

    public function __construct()
    {
        parent::__construct();
    }
    public function data()
    {
        $query = $this->db->get($this->table);
        return  $query->result();
    }
    public function insert($masakan)
    {
        $this->db->insert($this->table, $masakan);
    }
    public function getbyid($id_masakan)
    {
        $this->db->where('id_masakan', $id_masakan);
        $query = $this->db->get('masakan');
        return $query->row();
    }
    public function editmenu($id,$data)
    {
        $this->db->where('id_masakan', $id);
        $this->db->update('masakan', $data);
    }
    public function hapus($id_masakan)
    {
        $this->db->where('id_masakan', $id_masakan);
        $this->db->delete($this->table);
    }
}
