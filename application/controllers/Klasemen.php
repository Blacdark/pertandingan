<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Klasemen extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['M_konfigurasi','Model_skor']);
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
		$data['page'] = "Klasemen";
		$this->template->load('template','klasemen/dompdf', $data, 'A4', 'landscape');
		// $this->load->view('error');
	}
}
