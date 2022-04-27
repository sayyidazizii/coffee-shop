<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
            //pengecekan sesi
			if($this->session->userdata('is_login') != true){
				redirect('Login');
			}
            $this->load->model('M_user');
            $this->load->model('M_transaksi');
            
    }
    public function index()
    {
        //pengecekan sesi
        if ($this->session->userdata('level') == 1) {
            redirect('Dashboard');
        }
        $query = $this->M_transaksi->data();
        $data  = array('data' => $query);
        // var_dump($data);
        $this->load->view('Transaksi/index',$data);
    }
    public function detailtransaksi($index_pesanan)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') == 1) {
            redirect('Dashboard');
        }
        $query= $this->M_transaksi->getbyid($index_pesanan);
        $data  = array('transaksi' => $query);
        //  var_dump($data);
        $this->load->view('Transaksi/detail',$data);
    }

    public function hapus($index_pesanan)
    {
        $this->M_transaksi->hapus($index_pesanan);
        redirect('Transaksi');
    }
}
