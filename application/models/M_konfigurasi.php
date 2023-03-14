<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_konfigurasi extends CI_Model
{
    public $table = 'konfigurasi';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // Listing Konfigurasi
    public function listing() {
        $this->db->select('*');
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get($id = null) // fungsi untuk mengambil data pengguna dari tabel user
    {
        $this->db->from('konfigurasi');
        if ($id != null) {
            $this->db->where('id', $id); // cek ada gak id usernya
        }
        $query = $this->db->get(); //
        return $query;
    }
}