<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public $table = 'transaksi';

    public function __construct()
    {
        parent::__construct();
    }
    public function data()
    {
        $query = $this->db->get($this->table);
        return  $query->result();
    }
    public function insert($transaksi)
    {
        $this->db->insert($this->table, $transaksi);
    }
    public function getindex($id_pesanan_index)
    {
        $this->db->where('id_pesanan_index2', $id_pesanan_index);
        $query = $this->db->get('transaksi');
        return $query->row();
    }
    public function getbyid($id_pesanan_index)
    {
        $this->db->where('id_pesanan_index2', $id_pesanan_index);
        $query = $this->db->get('transaksi');
        return $query->result();
    }
    public function edittransaksi($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('transaksi', $data);
    }
    public function hapus($id_pesanan_index)
    {
        $this->db->where('id_pesanan_index2', $id_pesanan_index);
        $this->db->delete($this->table);
    }

    public function tanggal($tanggalA,$tanggalB)
    {
       $query = "  SELECT * FROM transaksi 
       WHERE tanggal_transaksi BETWEEN '$tanggalA' AND '$tanggalB'
              GROUP BY id,id_pesanan_index2,tanggal_transaksi
              ORDER BY id   DESC ";

       return $this->db->query($query)->result_array();
    }   
    public function findname($nama_user)
    {
       $query = "  SELECT * FROM transaksi 
       WHERE nama_user LIKE '$nama_user'
              GROUP BY id,id_pesanan_index2,tanggal_transaksi
              ORDER BY id   DESC ";

       return $this->db->query($query)->result_array();
    }   
    
}
