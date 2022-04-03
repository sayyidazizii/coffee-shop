<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //pengecekan sesi
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->model('M_user');
    }
    public function index()
    {
        $query = $this->M_user->data();
        $data  = array('data' => $query);
        $this->load->view('User/index', $data);
        // var_dump($data);
    }
    public function tambahuser()
    {
        //pengecekan sesi
        if ($this->session->userdata('level') != 1) {
            redirect('User');
        }
        $this->load->view('User/tambahuser');
    }
    public function tambahdata()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama_user = $this->input->post('nama_user');
        $id_level = $this->input->post('id_level');

        $Arrinsert = array(
            'username' => $username,
            'password' => $password,
            'nama_user' => $nama_user,
            'id_level' => $id_level
        );
        $this->session->set_flashdata('tambah','berhasil');
        $this->M_user->insert($Arrinsert);

         //contoh panggil helper log
         helper_log("add", "menambahkan data user");
         //silahkan di ganti2 aja kalimatnya
         
        redirect('User');
    }
    public function edituser($id_user)
    {
         //pengecekan sesi
         if ($this->session->userdata('level') != 1) {
            redirect('User');
        }

        $query = $this->M_user->getbyid($id_user);
        $data  = array('user' => $query);
        $this->load->view('User/edituser', $data);
        // var_dump($data);
    }
    public function editdata()
    {
        $id_user = $this->input->post('id_user');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama_user = $this->input->post('nama_user');
        $id_level = $this->input->post('id_level');

        $Arrupdate = array(
            'id_user' => $id_user,
            'username' => $username,
            'password' => $password,
            'nama_user' => $nama_user,
            'id_level' => $id_level
        );
        $this->session->set_flashdata('edit','berhasil');
        $this->M_user->editmenu($id_user, $Arrupdate);
        Redirect('User');
        // var_dump($Arrupdate);
    }
    public function hapus($id)
    {
         //pengecekan sesi
         if ($this->session->userdata('level') != 1) {
            redirect('User');
        }
        
        $this->M_user->hapus($id);
        $this->session->set_flashdata('hapus','berhasil');
        redirect('User');
    }
}
