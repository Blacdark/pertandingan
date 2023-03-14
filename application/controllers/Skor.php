<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['Model_skor','M_konfigurasi','Model_klup']);
	}

	public function index()
	{
        $site = $this->M_konfigurasi->listing();
		$data = array(
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
		);
		$data['row'] = $this->Model_skor->get(); 
		$data['page'] = "Skor";
		$this->template->load('template', 'klasemen/skore/index', $data);
	}


	public function tambah()
    {
		$skor = new stdClass();
		$skor->id_skor = null;
        $skor->ma = null;
        $skor->me = null;
        $skor->s = null;
        $skor->k = null;
        $skor->gm = null;
        $skor->gk = null;
		$site = $this->M_konfigurasi->listing();

		$query_skor = $this->Model_klup->get();
        $unit[null] = '- Pilih -';
        foreach ($query_skor->result() as $unt) {
            $unit[$unt->id_klub] = $unt->nama;
        }

        $data = array(
            'page' => 'tambah',
            'row' => $skor,
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site,
			// 'klup' => $query_klup
			'unit' => $unit, 'selectedunit' => null,
        );
		// $data['page'] = "Klup";
        $this->template->load('template', 'klasemen/skore/add', $data);
    }

	public function edit($id)
    {
        $query = $this->Model_skor->get($id);
        if ($query->num_rows() > 0) {
			$skor = $query->row();

            $query_skor = $this->Model_klup->get();
            $unit[null] = '- Pilih -';
            foreach ($query_skor->result() as $unt) {
                $unit[$unt->id_klub] = $unt->nama;
            }

            $data = array(
                'page' => 'edit',
                'row' => $skor,
                'unit' => $unit, 'selectedunit' => $skor->id_klub,
            );
			$this->template->load('template', 'klasemen/skore/add', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('skor') . "';</script>";
        }
    }


	public function proces()
    {
        $config['upload_path']    = './uploads/produk/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = 2048;
        $config['file_name']      = 'item-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if ($this->Model_skor->check_($post['unit'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Skor klub sudah ada!!");
                // $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('skor/tambah');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->skor->tambah($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('skor');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('skor/tambah');
                    }
                } else {
                    $post['image'] = null;
                    $this->Model_skor->tambah($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('skor');
                }
            }
        } else if (isset($_POST['edit'])) {
			$this->Model_skor->edit($post);
		}

		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data berhasil disimpan');
		}
		redirect('skor');

    }
	
    
	public function del($id_skor)
	{
		$this->Model_skor->hapus($id_skor);
		$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		redirect('skor');
	}
}