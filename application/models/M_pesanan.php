<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{

    public $table = 'pesanan';

    public function __construct()
    {
        parent::__construct();
    }
    public function data()
    {
        $query = $this->db->get($this->table);
        return  $query->result();
    }
    public function insert($pesanan)
    {
        $this->db->insert($this->table, $pesanan);
    }
    public function getbyid($id_pesanan)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        $query = $this->db->get('pesanan');
        return $query->row();
    }
    public function editpesanan($id,$data)
    {
        $this->db->where('id_pesanan', $id);
        $this->db->update('pesanan', $data);
    }
    public function hapus($id_pesanan)
    {
        $this->db->where('id_pesanan', $id_pesanan);
        $this->db->delete($this->table);
    }
}
