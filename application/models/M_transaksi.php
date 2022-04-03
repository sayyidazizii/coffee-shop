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
       $query = "  SELECT t.*,u.nama_user FROM transaksi t 
       LEFT JOIN user u on u.id_user = t.id_user
       WHERE t.tanggal_transaksi BETWEEN '$tanggalA' AND '$tanggalB'
              GROUP BY t.id,t.id_pesanan_index2,t.tanggal_transaksi
              ORDER BY t.id   DESC ";

       return $this->db->query($query)->result_array();
    }   
    
}
