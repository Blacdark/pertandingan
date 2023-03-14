<?php defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user1');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null) 
    {
        $this->db->from('user1');
        if ($id != null) {
            $this->db->where('id_user', $id); 
        }
        $query = $this->db->get(); //
        return $query;
    }

    public function tambah($post)
    {
        $params['nama'] = $post['nama_pengguna'];
        $params['username'] = $post['username'];
        $params['password'] = sha1($post['password']);
        if ($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }
        $params['alamat'] = $post['alamat'];
        $params['kota'] = $post['kota'];
        $this->db->insert('user1', $params);
    }

    public function edit($post)
    {
        $params['nama'] = $post['nama_pengguna'];
        $params['username'] = $post['username'];
        $params['alamat'] = $post['alamat'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        if ($post['gambar'] != null) {
            $params['gambar'] = $post['gambar'];
        }
        $params['kota'] = $post['kota'];
        $this->db->where('id_user', $post['id']);
        $this->db->update('user1', $params);
    }


    public function hapus($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user1');
    }
       
}
