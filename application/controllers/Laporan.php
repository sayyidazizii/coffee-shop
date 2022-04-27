<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //pengecekan sesi
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('m_transaksi');
    }
    //data laporan berdasar pencarian
    public function index()
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $tanggalA = $this->input->post('tanggalA');
        $tanggalB = $this->input->post('tanggalB');

        //nama user
        $query = $this->input->post('search');

        if (!empty($tanggalA) && !empty($tanggalB)) {
            $tanggalA = $this->input->post('tanggalA');
            $tanggalB = $this->input->post('tanggalB');
        } else {
            $tanggalA = date('Y-m-d', strtotime('-1 days'));
            $tanggalB = date('Y-m-d');
        }

        $data['namauser'] = $query;
        $data['xtanggalA'] = $tanggalA;
        $data['xtanggalB'] = $tanggalB;

        if(isset($query)){
            $data['transaksi'] = $this->m_transaksi->findname($query);
        }else{
            $data['transaksi'] = $this->m_transaksi->tanggal($tanggalA,$tanggalB);
        }
        $this->load->view('Laporan/index',$data);
        // var_dump($data);
    }
    public function cetak($tanggalA,$tanggalB)
    {
        $data['xtanggalA'] = $tanggalA;
        $data['xtanggalB'] = $tanggalB;

        $data['transaksi'] = $this->m_transaksi->tanggal($tanggalA,$tanggalB);
        // var_dump($data);
        helper_log("add","mencetak laporan berdasar tanggal");
        $this->load->view('Laporan/cetak',$data);
    }
    public function print($query)
    {

        $data['transaksi'] = $this->m_transaksi->findname($query);
        helper_log("add","mencetak laporan berdasar nama petugas");
        // var_dump($data);
        $this->load->view('Laporan/cetak',$data);
    }

}
