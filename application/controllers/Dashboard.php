<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{

    public function __construct()
    {
            parent::__construct();
            //pengecekan sesi
			if($this->session->userdata('is_login') != true){
				redirect('Login');
			}
            $this->load->model('M_user');
            $this->load->model('M_menu');
            $this->load->model('M_meja');
            
    }
    public function index()
    {
        $data['user'] = $this->db->get('user')->num_rows();
        $data['menu'] = $this->db->get('masakan')->num_rows();
        $data['pesanan'] = $this->db->get('pesanan')->num_rows();

        // dapatkan meja kosong
        $this->db->where('status_meja', 1);
        $data['meja'] = $this->db->get('meja')->num_rows();
        
        $this->load->view('dashboard',$data);
    }
    public function profil()
    {
        $sesi = $this->session->userdata();
        var_dump($sesi);
    }
    
}
