<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Model_klup extends CI_Model {


        public function get($id = null)
        {
            $this->db->from('klub');
            if ($id != null) {
                $this->db->where('id_klub', $id);
                $this->db->limit(10);
            }
            $query = $this->db->get();
            return $query;
        }


        // end getdata

        public function delete($id_kriteria)
        {
            $this->db->where('id_kriteria', $id_kriteria);
            $this->db->delete('kriteria');
        }

        function check($code, $id = null)
        {
            $this->db->from('klub');
            $this->db->where('nama', $code);
            if ($id != null) {
                $this->db->where('id_klub !=', $id);
            }
            $query = $this->db->get();
            return $query;
        }

        // End hapus

        public function tambah($post)
    {
        $params = [
            'nama' => $post['nama_k'],
            'kota' => $post['klub_k'],
        ];
        $this->db->insert('klub', $params);
    }

    function check_klub($nama, $nama_k = null)
    {
        $this->db->from('klub');
        $this->db->where('nama', $nama);
        if ($nama_k != null) {
            $this->db->where('id_klub !=', $nama_k);
        }
        $query = $this->db->get();
        return $query;
    }

    // OK
    public function edit($post)
    {
        $params = [
            'nama' => $post['nama_k'],
            'kota' => $post['klub_k'],
        ];
        $this->db->where('id_klub', $post['id']);
        $this->db->update('klub', $params);
    }

    
    public function hapus($id)
    {
        $this->db->where('id_klub', $id);
        $this->db->delete('klub');
    }
    }