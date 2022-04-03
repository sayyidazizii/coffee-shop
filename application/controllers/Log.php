<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url'));
        $this->load->model('M_log');
    }
    public function index()
    {
        // $data['log']=$this->M_log->data();
        // $this->load->view('Log/index',$data); //pengecekan sesi
        if ($this->session->userdata('level') == 2) {
            redirect('Dashboard');
        }


        //pagination
        $this->load->database();
        $jumlah_data = $this->M_log->jumlah_data();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'index.php/Log/index/';
        $config['total_rows'] = $jumlah_data;
        $config['per_page'] = 5;
        $from = $this->uri->segment(3);
        $this->pagination->initialize($config);
        $data['log'] = $this->M_log->data($config['per_page'], $from);
        // var_dump($data);
        $this->load->view('Log/index', $data);
    }
    public function profil()
    {
        $sesi['log'] = $this->session->userdata();
        $this->load->view('Log/profil', $sesi);
       // var_dump($sesi);
    }
}
