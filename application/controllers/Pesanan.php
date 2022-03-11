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
        $this->load->model('M_meja');
        $this->load->model('M_user');
    }
    public function index()
    {
        $data['data'] = $this->M_pesanan->data();
        $data['meja'] = $this->M_meja->meja();
        $data['user'] = $this->M_user->data();
        $this->load->view('Pesanan/index', $data);
        // var_dump($data);
    }
    public function tambahdata()
    {
        $customer = $this->input->post('customer');
        $id_meja = $this->input->post('id_meja');
        $tanggal = $this->input->post('tanggal');
        $id_user = $this->input->post('id_user');

        $Arrinsert = array(
            'customer' => $customer,
            'id_meja' => $id_meja,
            'tanggal' => $tanggal,
            'id_user' => $id_user
        );
        $this->session->set_flashdata('tambah','berhasil');
        $this->M_pesanan->insert($Arrinsert);
        redirect('Pesanan');
    }
    public function editpesanan($id_pesanan)
    {
         //pengecekan sesi
         if ($this->session->userdata('level') == 3) {
            redirect('Pesanan');
        }
        $query = $this->M_pesanan->getbyid($id_pesanan);
        $data  = array('pesanan' => $query);
        $this->load->view('Pesanan/editpesanan', $data);
        // var_dump($data);
    }
    public function editdata()
    {
        $id_pesanan  = $this->input->post('id_pesanan');
        $customer = $this->input->post('customer');
        $id_meja = $this->input->post('id_meja');
        $tanggal = $this->input->post('tanggal');
        $id_user = $this->input->post('id_user');

        $Arrupdate = array(
            'id_pesanan' => $id_pesanan,
            'customer' => $customer,
            'id_meja' => $id_meja,
            'tanggal' => $tanggal,
            'id_user' => $id_user
        );
        $this->session->set_flashdata('edit','berhasil');
        $this->M_pesanan->editpesanan($id_pesanan, $Arrupdate);
        Redirect('Pesanan');
        // var_dump($Arrupdate);
    }
    public function hapus($id)
    {
         //pengecekan sesi
         if ($this->session->userdata('level') == 3) {
            redirect('Pesanan');
        }
        $this->M_pesanan->hapus($id);
        $this->session->set_flashdata('hapus','berhasil');
        redirect('Pesanan');
    }

}
