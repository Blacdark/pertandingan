<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BOLA</title>
  <link href='<?php echo base_url("uploads/$logo"); ?>' rel='shortcut icon' type='image/x-icon' />
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/sweetalert2/sweetalert2.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/toastr/toastr.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <br>

    <!-- Sidebar -->
    <div class="sidebar">
    <?php $gambar = $this->fungsi->user_login()->gambar; ?>
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-2 pb-4 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('uploads/') . $gambar ?>" class="img-circle " alt="tampnel" alt="User Image">
        </div>
        <div class="info">
        <b><a href="#" class="d-block">&nbsp;<span class="text-uppercase"><?= $this->fungsi->user_login()->nama ?></a></b>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header"> <b> MASTER DATA</b> </li>
          <li class="nav-item">
            <a href="<?= site_url('dashboard') ?>" class="nav-link <?php if($page=='Dashboard'){echo 'active';}?>" >
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <?php if ($this->fungsi->user_login()->level == "1") { ?>
          <li class="nav-item">
            <a href="<?= site_url('klup') ?>" class="nav-link <?php if($page=='Klup'){echo 'active';}?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Data Klub
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('skor') ?>" class="nav-link <?php if($page=='skore'){echo 'active';}?>">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>Data Skor
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <?php } ?>
          <!-- end -->
          <li class="nav-item">
            <a href="<?= site_url('klasemen') ?>" class="nav-link <?php if($page=='Hasil'){echo 'active';}?>">
              <i class="nav-icon fas fa-chart-area"></i>
              <p>Klasemen
              <i class="fas fa-angle-left right"></i>
              </p>
            </a>
          </li>
          <li class="nav-header"><i class="fas fa-fw fa-cog"></i>&nbsp; <b>MASTER USER</b></li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <?php if ($this->fungsi->user_login()->level == "1") { ?>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                
                  <p>
                  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; Profil<i class="nav-icon fas fa-user"></i>
                  &nbsp;&nbsp;&nbsp;<i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?= site_url('pengguna') ?>" class="nav-link <?php if($page=='Pengguna'){echo 'active';}?>">
                    <i class="nav-icon fas fa-users-cog"></i>
                      <p>Data Pengguna</p>
                    </a>
                  </li>
                </ul>
                <?php } ?>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('auth/logout') ?>" class="nav-link">
               
                  <!-- <i class="far fa-circle nav-icon"></i> -->
                  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;<p>Logout</p> 
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                </a>
              </li>
            </ul>
          </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy;2022 <a href=""></a></strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</body>
<script>
  $(document).ready(function() {
    // Swal.fire('Any fool can use a computer')
    $('#table1').DataTable()
  })
</script>

<script>
  var flash = $('#flash').data('flash');
  if (flash) {
    Swal.fire({
      icon: 'success',
      title: 'Sukses',
      timer: 1500,
      text: flash
    })
  }

  var flash = $('#error').data('flash');
  if (flash) {
    Swal.fire({
      icon: 'error',
      title: 'Gagal diproses!',
      timer: 3000,
      text: flash
    })
  }

  var flash = $('#slek').data('flash');
  if (flash) {
    Swal.fire({
      icon: 'warning',
      title: 'Harap input nilai!',
      timer: 2800,
      text: flash
    })
  }

  $(document).on('click', '#btn-del', function(e) {
			e.preventDefault();
			var link = $(this).attr("href");

			Swal.fire({
				title: 'Apakah Anda Yakin?',
				text: "Data yang dihapus tidak bisa dikembalikan lagi!",
				icon: 'warning',
				showCancelButton: true,

				cancelButtonColor: '#d44',
				cancelButtonText: 'Batal',
				confirmButtonText: 'Hapus',
			}).then((result) => {
				if (result.isConfirmed) {
					window.location = link;
				}
			})
		})
</script>

</html>
