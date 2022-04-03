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
        $tanggalA = $this->input->post('tanggalA');
        $tanggalB = $this->input->post('tanggalB');

        if (!empty($tanggalA) && !empty($tanggalB)) {
            $tanggalA = $this->input->post('tanggalA');
            $tanggalB = $this->input->post('tanggalB');
        } else {
            $tanggalA = date('Y-m-d');
            $tanggalB = date('Y-m-d', strtotime('+1 days'));
        }

        $data['xtanggalA'] = $tanggalA;
        $data['xtanggalB'] = $tanggalB;

        $data['transaksi'] = $this->m_transaksi->tanggal($tanggalA,$tanggalB);
        $this->load->view('Laporan/index',$data);
        // var_dump($data);
    }
    public function cetak($tanggalA,$tanggalB)
    {
        $data['xtanggalA'] = $tanggalA;
        $data['xtanggalB'] = $tanggalB;

        $data['transaksi'] = $this->m_transaksi->tanggal($tanggalA,$tanggalB);
        // var_dump($data);
        $this->load->view('Laporan/cetak',$data);
    }

}
