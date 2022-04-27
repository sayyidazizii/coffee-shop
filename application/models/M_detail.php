<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_detail extends CI_Model
{

    public $table = 'detail_pesan';

    public function __construct()
    {
        parent::__construct();
    }
    public function data()
    {
        $query = $this->db->get($this->table);
        return  $query->result();
    }
    public function insert($detail)
    {
        $this->db->insert($this->table, $detail);
    }
    public function getbyid($index_pesan)
    {
        $this->db->where('id_pesanan_index', $index_pesan);
        $query = $this->db->get('detail_pesan');
        return $query->result();
    }

    public function editpesanan($id, $data)
    {
        $this->db->where('id_pesan', $id);
        $this->db->update('detail_pesan', $data);
    }
    public function hapus($id_pesan)
    {
        $this->db->where('id_pesan', $id_pesan);
        $this->db->delete($this->table);
    }
}
