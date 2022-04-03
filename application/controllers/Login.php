<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
    }
    public function index()
    {
        $this->load->view('Auth/login');
    }
    public function Auth()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($this->M_user->Checkuser($username, $password) == true) {
            $row = $this->M_user->getbyusername($username);
            $data_user = array(
                'username'  => $username,
                'password'  => $password,
                'id_user'   => $row->id_user,
                'nama_user' => $row->nama_user,
                'level'     => $row->id_level,
                'is_login'  => true
            );
            $this->session->set_userdata($data_user);

            //helper log aktivitas
            helper_log("login", "telah login");

            //alert 
            $this->session->set_flashdata('sukses','login berhasil');
            redirect('Dashboard');
            //var_dump($data_user);
            exit;
        } else {
            $this->session->set_flashdata('pesan','login gagal');
            redirect('Login');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        //contoh panggil helper log
        helper_log("logout", "logout");
        redirect('Login');
    }
}
