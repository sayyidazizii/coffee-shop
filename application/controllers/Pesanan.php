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
        $this->load->model('M_detail');
        $this->load->model('M_menu');
        $this->load->model('M_transaksi');
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
        $this->session->set_flashdata('tambah', 'berhasil');
        $this->M_pesanan->insert($Arrinsert);
         //contoh panggil helper log
         helper_log("add", "menambahkan pesanan baru");
         //silahkan di ganti2 aja kalimatnya
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
        $status_pesanan = $this->input->post('status_pesanan');

        $Arrupdate = array(
            'id_pesanan' => $id_pesanan,
            'customer' => $customer,
            'id_meja' => $id_meja,
            'tanggal' => $tanggal,
            'id_user' => $id_user,
            'status_pesanan' => $status_pesanan
        );
        $this->session->set_flashdata('edit', 'berhasil');
        $this->M_pesanan->editpesanan($id_pesanan, $Arrupdate);
         //contoh panggil helper log
         helper_log("edit", "mengedit pesanan");
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
        $this->session->set_flashdata('hapus', 'berhasil');
         //contoh panggil helper log
         helper_log("hapus", "menghapus pesanan");
        redirect('Pesanan');
    }

    
    //detail pesanan
    public function detailpesanan($id_pesan)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') == 3) {
            redirect('Pesanan');
        }
        //data pesanan berdasar id
        $pesanan = $this->M_pesanan->getbyid($id_pesan);

        //data detail pesan berdasarkan id pesanan
        $pesan = $this->M_detail->getbyid($id_pesan);

        //panggil tabel transaksi
        $transaksi = $this->M_transaksi->getbyid($id_pesan);

        //data menu
        // $menu = $this->M_menu->data();
        $query = $this->input->post('search');
        // var_dump($query);
        if(!empty($query)){
            $search = $this->M_menu->search($query);
            unset($_POST['search']);
        }else{
            $search = $this->M_menu->data();
        }
        $menu = $search;

        $data  = array(
            'id' => $id_pesan,
            'pesan' => $pesan,
            'menu' => $menu,
            'transaksi' => $transaksi,
            'pesanan' => $pesanan,
    
        );
        $this->load->view('Pesanan/detailpesanan', $data);
        // var_dump($data);
    }

    //detail transaksi
    public function detailtransaksi($id_pesan)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') == 3) {
            redirect('Pesanan');
        }
        // //data pesanan berdasar row
        // $pesanan = $this->M_pesanan->getbyid($id_pesan);

        $transaksi = $this->M_detail->getbyid($id_pesan);

        $data  = array(
            'id' => $id_pesan,
            'transaksi' => $transaksi,
    
        );
         // var_dump($data);
        $this->load->view('Transaksi/detailtransaksi', $data);
       
    }


    //order
    public function order()
    {
        $id_pesanan_index = $this->input->post('id_pesanan_index');
        $id_masakan = $this->input->post('id_masakan');
        $nama_masakan = $this->input->post('nama_masakan');
        $jumlah_pesanan = $this->input->post('jumlah_pesanan');
        $jumlah_harga = $this->input->post('jumlah_harga');
        $keterangan = $this->input->post('keterangan');


        $Arrinsert = array(
            'id_pesanan_index' => $id_pesanan_index,
            'id_masakan' => $id_masakan,
            'nama_masakan' => $nama_masakan,
            'jumlah_pesanan' => $jumlah_pesanan,
            'jumlah_harga' => $jumlah_harga * $jumlah_pesanan,
            'keterangan' => $keterangan,

        );
        $this->M_detail->insert($Arrinsert);
        redirect('Pesanan/detailpesanan/' . $id_pesanan_index);
    }


    public function saveorder()
    {

        $id_user = $this->input->post('id_user');
        $id_pesanan_index = $this->input->post('id_pesanan_index2');
        $tanggal_transaksi = $this->input->post('tanggal_transaksi');
        $uang = $this->input->post('uang');
        $total_bayar = $this->input->post('total_bayar');
        $kembalian = $this->input->post('kembalian');

        $Arrinsert = array(
            'id_user' => $id_user,
            'id_pesanan_index2' => $id_pesanan_index,
            'tanggal_transaksi' => $tanggal_transaksi,
            'uang' => $uang,
            'total_bayar' => $total_bayar,
            'kembalian' =>  $uang - $total_bayar,

        );

        if($uang < $total_bayar){
            $this->session->set_flashdata('gagal', 'uang kurang');
            Redirect('Pesanan/detailpesanan/' . $id_pesanan_index);
        }else{
            $this->M_transaksi->insert($Arrinsert);
            
             //contoh panggil helper log
             helper_log("add", "menyimpan transaksi");
        }
        redirect('Transaksi/detailtransaksi/' . $id_pesanan_index);
    }

    // ubah status
    public function editstatus()
    {
        $id_pesanan  = $this->input->post('id_pesanan');
        $customer = $this->input->post('customer');
        $id_meja = $this->input->post('id_meja');
        $tanggal = $this->input->post('tanggal');
        $id_user = $this->input->post('id_user');
        $status_pesanan = $this->input->post('status_pesanan');

        $Arrupdate = array(
            'id_pesanan' => $id_pesanan,
            'customer' => $customer,
            'id_meja' => $id_meja,
            'tanggal' => $tanggal,
            'id_user' => $id_user,
            'status_pesanan' => $status_pesanan
        );
        $this->session->set_flashdata('edit', 'berhasil');
        $this->M_pesanan->editpesanan($id_pesanan, $Arrupdate);
        Redirect('Pesanan/detailpesanan/' . $id_pesanan);
        // var_dump($Arrupdate);
    }


     //cetak Struk atau invoice transaksi
     public function invoice($id_pesan)
     {
         //pengecekan sesi
         if ($this->session->userdata('level') == 3) {
             redirect('Pesanan');
         }
         // //data pesanan berdasar row
         // $pesanan = $this->M_pesanan->getbyid($id_pesan);
 
         $transaksi = $this->M_detail->getbyid($id_pesan);
 
         $data  = array(
             'id' => $id_pesan,
             'transaksi' => $transaksi,
     
         );
          //var_dump($data);
        $this->load->view('Pesanan/struk', $data);
        
     }


    //hapus orderan
    public function hapusorder($id_pesan)
    {
        //pengecekan sesi
        if ($this->session->userdata('level') == 3) {
            redirect('Pesanan');
        }

        $this->M_detail->hapus($id_pesan);
        redirect('Pesanan');
    }
}
