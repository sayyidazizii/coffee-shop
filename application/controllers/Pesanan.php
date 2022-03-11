<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //pengecekan sesi
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_pesanan');
    }
    public function index()
    {
        $query = $this->M_pesanan->data();
        $data  = array('data' => $query);
        $this->load->view('Pesanan/index', $data);
        // var_dump($data);
    }
    public function tambahmenu()
    {
         //pengecekan sesi
         if ($this->session->userdata('level') != 3) {
            redirect('Menu');
        }
        $this->load->view('Menu/tambahmenu');
    }
    public function tambahdata()
    {
        $nama_masakan = $this->input->post('nama_masakan');
        $harga = $this->input->post('harga');
        $status_masakan = $this->input->post('status_masakan');

        $Arrinsert = array(
            'nama_masakan' => $nama_masakan,
            'harga' => $harga,
            'status_masakan' => $status_masakan
        );
        $this->session->set_flashdata('tambah','berhasil');
        $this->M_pesanan->insert($Arrinsert);
        redirect('Menu');
    }
    public function editmenu($id_masakan)
    {
         //pengecekan sesi
         if ($this->session->userdata('level') != 3) {
            redirect('Menu');
        }
        $query = $this->M_pesanan->getbyid($id_masakan);
        $data  = array('masakan' => $query);
        $this->load->view('Menu/editmenu', $data);
        // var_dump($data);
    }
    public function editdata()
    {
        $id_masakan               = $this->input->post('id_masakan');
        $nama_masakan             = $this->input->post('nama_masakan');
        $harga     = $this->input->post('harga');
        $status_masakan               = $this->input->post('status_masakan');

        $Arrupdate = array(
            'id_masakan'            =>     $id_masakan,
            'nama_masakan'          =>     $nama_masakan,
            'harga'                 =>     $harga,
            'status_masakan'        =>     $status_masakan,
        );
        $this->session->set_flashdata('edit','berhasil');
        $this->M_pesanan->editmenu($id_masakan, $Arrupdate);
        Redirect('Menu');
        // var_dump($Arrupdate);
    }
    public function hapus($id)
    {
         //pengecekan sesi
         if ($this->session->userdata('level') != 3) {
            redirect('Menu');
        }
        $this->M_pesanan->hapus($id);
        $this->session->set_flashdata('hapus','berhasil');
        redirect('Menu');
    }
}
