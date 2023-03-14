<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model(['Model_user','M_konfigurasi']);
		
		
	}

	public function index()
	{	
		$site = $this->M_konfigurasi->listing();
		$data = [
			'row' => $this->Model_user->get(),
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
		];
		$data['page'] = "Pengguna";
		$this->template->load('template', 'pengguna/index', $data);
	}

	public function register(){

		
		$site = $this->M_konfigurasi->listing();
		$data = array(
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
		);
		$data['row'] = $this->M_konfigurasi->get();
		$data['page'] = "Pengguna";
		$this->template->load('template', 'register', $data);
	}

	public function tambah()
    {
        $site = $this->M_konfigurasi->listing();
        $user = new stdClass();
        $user->id_user = null;
        $user->nama = null;
        $user->username = null;
        $user->password = null;
        $user->gambar = null;
        $user->alamat = null;
        $user->kota = null;
        $data = array(
            'page' => 'tambah',
            'row' => $user,
            'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site,
        );
        $this->template->load('template', 'pengguna/form', $data);
    }

    public function edit($id)
    {
		$query = $this->Model_user->get($id);
		$site = $this->M_konfigurasi->listing();
		$data = array(
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
		);
        if ($query->num_rows() > 0) {
            $user = $query->row();
            $data = array(
            'page' => 'edit',
            'row' => $user,
            );
            $this->template->load('template', 'pengguna/edit', $data);
        } else {
            echo "<script>alert('Data tidak ditemukan');";
            echo "window.location='" . site_url('pengguna') . "';</script>";
        }
    }

	public function proses()
    {
        $config['upload_path']    = './uploads/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = 2048;
        $config['file_name']      = 'user-' . date('ymd') . '-' . substr(md5(rand()), 0, 10);
        $this->load->library('upload', $config);

        $post = $this->input->post(null, TRUE);
        if (isset($_POST['tambah'])) {
            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->Model_user->tambah($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('pengguna');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('pengguna/tambah');
                }
            } else {
                $post['gambar'] = null;
                $this->Model_user->tambah($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data berhasil disimpan');
                }
                redirect('pengguna');
            }
        } else if (isset($_POST['edit'])) {
            if (@$_FILES['gambar']['name'] != null) {
                if ($this->upload->do_upload('gambar')) {
                    $user = $this->Model_user->get($post['id'])->row();
                    if ($user->gambar != null) {
                        $target_file = './uploads/' . $user->gambar;
                        unlink($target_file);
                    }
                    $post['gambar'] = $this->upload->data('file_name');
                    $this->Model_user->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'Data berhasil disimpan');
                    }
                    redirect('pengguna');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('error', $error);
                    redirect('pengguna/tambah');
                }
            } else {
                $post['gambar'] = null;
                $this->Model_user->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'Data tidak disimpan');
                }
                redirect('pengguna');
            }
        }
    }
	
	public function del($id_user)
        {
            $this->Model_user->hapus($id_user);
            $this->session->set_flashdata('success', 'Data berhasil dihapus!');
			redirect('pengguna');
        }

		// Settings

        
		

}
