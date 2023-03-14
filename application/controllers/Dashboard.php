<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		check_not_login();
        $this->load->model(['M_konfigurasi']);
	}
	

	public function index()
	{
		
		$site = $this->M_konfigurasi->listing();
		$data = array(
			'copyright'     => $site['copyright'],
			'logo'   => $site['logo'],
			'site'      => $site
		);
		$data['page'] = "Dashboard";
		$this->template->load('template', 'dashboard', $data);
		// $this->load->view('error');
	}
}
