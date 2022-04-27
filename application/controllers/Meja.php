<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Meja extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //pengecekan sesi
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_meja');
    }
    public function index()
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $query = $this->M_meja->data();
        $data  = array('data' => $query);
        $this->load->view('Meja/index', $data);
        // var_dump($data);
    }
    public function tambahmeja()
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $this->load->view('Meja/tambahmeja');
    }
    public function tambahdata()
    {
        $no_meja = $this->input->post('no_meja');
        $kapasitas = $this->input->post('kapasitas');
        $status_meja = $this->input->post('status_meja');

        $Arrinsert = array(
            'no_meja' => $no_meja,
            'kapasitas' => $kapasitas,
            'status_meja' => $status_meja
        );
        $this->session->set_flashdata('tambah','berhasil');
        $this->M_meja->insert($Arrinsert);
        redirect('Meja');
    }
    public function editmeja($id_meja)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $query = $this->M_meja->getbyid($id_meja);
        $data  = array('meja' => $query);
        $this->load->view('Meja/editmeja', $data);
        // var_dump($data);
    }
    public function editdata()
    {
        $id_meja = $this->input->post('id_meja');
        $no_meja = $this->input->post('no_meja');
        $kapasitas = $this->input->post('kapasitas');
        $status_meja = $this->input->post('status_meja');

        $Arrupdate = array(
            'id_meja' => $id_meja,
            'no_meja' => $no_meja,
            'kapasitas' => $kapasitas,
            'status_meja' => $status_meja
        );
        $this->session->set_flashdata('edit','berhasil');
        $this->M_meja->editmeja($id_meja, $Arrupdate);
        Redirect('Meja');
        // var_dump($Arrupdate);
    }
    public function hapus($id)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $this->M_meja->hapus($id);
        $this->session->set_flashdata('hapus','berhasil');
        redirect('Meja');
    }
}
