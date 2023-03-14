<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Model_skor extends CI_Model {

        // public function get($id = null)
        // {
        //     $this->db->from('skor');
        //     if ($id != null) {
        //         $this->db->where('id_skor', $id);
        //         $this->db->limit(10);
        //     }
        //     $query = $this->db->get();
        //     return $query;
        // }

        public function get($id = null)
        {
            // $this->db->select('p_item.*, p_category.name as category_name, p_unit.name as unit_name,');
            $this->db->select('skor.*, klub.nama as klub');
            // $this->db->from('p_item');
            $this->db->from('skor');
            // $this->db->join('p_category', 'p_category.category_id = p_item.category_id');
            $this->db->join('klub', 'klub.id_klub = skor.id_klub');
            if ($id != null) {
                $this->db->where('id_skor', $id);
            }
            // $this->db->order_by('barcode', 'asc');
            $query = $this->db->get();
            return $query;
        }

        public function tambah($post)
        {
            $params = [
                'id_klub' => $post['unit'],
                'ma' => $post['ma'],
                'me' => $post['me'],
                's' => $post['s'],
                'k' => $post['k'],
                'gm' => $post['gm'],
                'gk' => $post['gk'],
            ];
            $this->db->insert('skor', $params);
        }

        public function edit($post)
        {
            $params = [
                'id_klub' => $post['unit'],
                'ma' => $post['ma'],
                'me' => $post['me'],
                's' => $post['s'],
                'k' => $post['k'],
                'gm' => $post['gm'],
                'gk' => $post['gk'],
            ];
            if ($post['image'] != null) {
                $params['image'] = $post['image'];
            }
            $this->db->where('id_skor', $post['id']);
            $this->db->update('skor', $params);
        }

        function get_data($id)
        {
    
            return $this->db->get_where('skor', array('id_skor' => $id))->row_array();
        }

        function check_($nama, $unit = null)
        {
            $this->db->from('skor');
            $this->db->where('id_klub', $nama);
            if ($unit != null) {
                $this->db->where('id_skor !=', $unit);
            }
            $query = $this->db->get();
            return $query;
        }

        public function hapus($id)
        {
            $this->db->where('id_skor', $id);
            $this->db->delete('skor');
        }
    }