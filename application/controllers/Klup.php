<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klup extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['Model_klup','M_konfigurasi']);
	}

	public function index()
	{
        $site = $this->M_konfigurasi->listing();
		$data = array(
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
		);
		$data['row'] = $this->Model_klup->get(); 
		$data['page'] = "Klup";
		$this->template->load('template', 'klasemen/klup/index', $data);
	}
// Add


	public function proses()
    {

				$this->form_validation->set_rules('nama', 'Nama', 'required');
				$this->form_validation->set_rules('kota', 'Kota', 'required');

				$data = [
                    'nama' => $this->input->post('nama'),
                    'kota' => $this->input->post('kota'),
                ];
                
                if ($this->form_validation->run() != false) {
                    $result = $this->Model_klup->insert($data);
                    if ($result) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan!');
                		redirect('Klup');
                    }
                } else {
                    $this->session->set_flashdata('success', 'Data gagal disimpan!');
                    redirect('Klup/add');
                    
                }

    }
	// end proses

	public function tambah()
    {
		$klub = new stdClass();
        $klub->id_klub = null;
        $klub->nama = null;
        $klub->kota = null;
		$site = $this->M_konfigurasi->listing();

        $data = array(
            'page' => 'tambah',
            'row' => $klub,
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
        );
		// $data['page'] = "Klup";
        $this->template->load('template', 'klasemen/klup/add', $data);
    }

	public function edit($id)
    {
        $query = $this->Model_klup->get($id);
        if ($query->num_rows() > 0) {
            $klub = $query->row();
            $data = array(
                'page' => 'edit',
                'row' => $klub
            );
            $this->template->load('template', 'klasemen/klup/add', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('klup') . "';</script>";
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
            if ($this->Model_klup->check_klub($post['nama_k'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Nama Klub $post[nama_k] sudah ter input!");
                // $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('klup/tambah');
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {
                        $post['image'] = $this->upload->data('file_name');
                        $this->Model_klup->tambah($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('success', 'Data berhasil disimpan');
                        }
                        redirect('klup');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('klup/tambah');
                    }
                } else {
                    $post['image'] = null;
                    $this->Model_klup->tambah($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('klup');
                }
            }
        } else if (isset($_POST['edit'])) {
            if ($this->Model_klup->check_klub($post['nama_k'], $post['id'])->num_rows() > 0) {
                $this->session->set_flashdata('error', "Barcode $post[barcode] sudah dipakai barang lain");
                redirect('klup/edit/' . $post['id']);
            } else {
                if (@$_FILES['image']['name'] != null) {
                    if ($this->upload->do_upload('image')) {

                        $item = $this->Model_klup->get($post['id'])->row();
                        if ($item->image != null) {
                            $target_file = './uploads/produk/' . $item->image;
                            unlink($target_file);
                        }
                        $post['image'] = $this->upload->data('file_name');
                        $this->Model_klup->edit($post);
                        if ($this->db->affected_rows() > 0) {
                            $this->session->set_flashdata('error', 'Data berhasil disimpan');
                        }
                        redirect('klup');
                    } else {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('error', $error);
                        redirect('klup/edit/' . $post['id']);
                    }
                } else {
                    $post['image'] = null;
                    $this->Model_klup->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil diubah');
                    }
                    redirect('klup');
                }
            }
        }
    }


	public function del($id_klub)
	{
		$this->Model_klup->hapus($id_klub);
		$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		redirect('klup');
	}
}