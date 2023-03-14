<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_konfigurasi');
    }

	public function login()
	{
		check_already_login();
		$site = $this->M_konfigurasi->listing();
		$data = array(
			'title'     => ' LOGIN '.$site['nama'],
			'logo'   => $site['logo'],
			'site'      => $site
		);
		$this->load->view('login', $data);
	}

	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$this->load->model('Model_user');
			$query = $this->Model_user->login($post);
			if ($query->num_rows() > 0) {
				$row = $query->row();
				$params = array(
					'iduser' => $row->id_user
				);
				$this->session->set_userdata($params);
				?>
		<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.css">
		<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
		<style>
			body {
				font-family: "Hervetice Heue", Hervetica, Arial, sans-serief;
				font-size: 1.113em;
				font-weight: normal;
			}
		</style>

		<body>

		</body>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Login Berhasil',
				text: 'Selamat datang!! <?= $this->fungsi->user_login()->nama ?>',
				timer: 1600
			}).then((result) => {
				window.location = '<?= site_url('auth/login') ?>';
			})
		</script>
<?php
			} else {
?>
				<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.css">
				<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
				<style>
					body {
						font-family: "Hervetice Heue", Hervetica, Arial, sans-serief;
						font-size: 1.113em;
						font-weight: normal;
					}
				</style>

				<body>

				</body>
				<script>
					Swal.fire({
						icon: 'error',
						title: 'Login Gagal!!',
						text: 'Username / Password salah',
						timer: 1500
					}).then((result) => {
						window.location = '<?= site_url('auth/login') ?>';
					})
				</script>
		<?php
			}
		}
	}

	public function logout()
	{
		$params = array('iduser');
		$this->session->unset_userdata($params);
		?>
		<link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.css">
		<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
		<style>
			body {
				font-family: "Hervetice Heue", Hervetica, Arial, sans-serief;
				font-size: 1.113em;
				font-weight: normal;
			}
		</style>

		<body>

		</body>
		<script>
			Swal.fire({
				icon: 'success',
				title: 'Logout Berhasil',
				text: 'Terimakasih!!',
				timer: 1400
			}).then((result) => {
				window.location = '<?= site_url('auth/login') ?>';
			})
		</script>
<?php
	}

}
