<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

    public $table = 'user';

    public function __construct()
    {
            parent::__construct();
            
    }

    // User Auth
	public function Checkuser($username,$password)
	{
		$query = $this->db->get_where($this->table,
        array (
            'username'=>$username,
            'password'=> $password
              )
        );

        if ($query->num_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
        exit;
	}
    public function getbyusername($username)
    {
        $this->db->where('username',$username);
        return $this->db->get($this->table)->row();
    }


    // User Crud
    public function data()
    {
        $query = $this->db->get($this->table);
        return  $query->result();
    }
    public function insert($user)
    {
        $this->db->insert($this->table, $user);
    }
    public function getbyid($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');
        return $query->row();
    }
    public function editmenu($id,$data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete($this->table);
    }



    
}
