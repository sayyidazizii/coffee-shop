<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //pengecekan sesi
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_menu');
    }
    public function index()
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        // $data = $this->M_menu->data();
        $query = $this->input->post('search');
        // var_dump($query);
        if(!empty($query)){
            $search = $this->M_menu->search($query);
            unset($_POST['search']);
        }else{
            $search = $this->M_menu->data();
        }
        $data['search'] = $search;
        $this->load->view('Menu/index', $data);
        // var_dump($data);
    }
    public function tambahmenu()
    {
         //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $this->load->view('Menu/tambahmenu');
    }
    public function tambahdata()
    {
        $nama_masakan = $this->input->post('nama_masakan');
        $harga = $this->input->post('harga');
        $image = $this->input->post('image');
        $status_masakan = $this->input->post('status_masakan');

        $Arrinsert = array(
            'nama_masakan' => $nama_masakan,
            'harga' => $harga,
            'image' => $image,
            'status_masakan' => $status_masakan
        );
        $this->session->set_flashdata('tambah','berhasil');
        $this->M_menu->insert($Arrinsert);
         //contoh panggil helper log
         helper_log("add", "menambah menu");
        redirect('Menu');
    }
    public function editmenu($id_masakan)
    {
       //pengecekan sesi
       if ($this->session->userdata('level') != 3) {
        redirect('Dashboard');
    }
        $query = $this->M_menu->getbyid($id_masakan);
        $data  = array('masakan' => $query);
        $this->load->view('Menu/editmenu', $data);
        // var_dump($data);
    }
    public function editdata()
    {
        $id_masakan               = $this->input->post('id_masakan');
        $nama_masakan             = $this->input->post('nama_masakan');
        $harga                    = $this->input->post('harga');
        $image                    = $this->input->post('image');
        $status_masakan           = $this->input->post('status_masakan');

        $Arrupdate = array(
            'id_masakan'            =>     $id_masakan,
            'nama_masakan'          =>     $nama_masakan,
            'harga'                 =>     $harga,
            'image'                 =>     $image,
            'status_masakan'        =>     $status_masakan,
        );
        $this->session->set_flashdata('edit','berhasil');
        $this->M_menu->editmenu($id_masakan, $Arrupdate);
         //contoh panggil helper log
         helper_log("edit", "mengedit menu");
        Redirect('Menu');
        // var_dump($Arrupdate);
    }
    public function hapus($id)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 3) {
            redirect('Dashboard');
        }
        $this->M_menu->hapus($id);
         //contoh panggil helper log
         helper_log("hapus", "menghapus menu");
        $this->session->set_flashdata('hapus','berhasil');
        redirect('Menu');
    }
}
