<script language="JavaScript">
        var tanggallengkap = new String();
        var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
        namahari = namahari.split(" ");
        var namabulan = ("Januari Februari Maret April Mei Juni Juli Agustus September Oktober November Desember");
        namabulan = namabulan.split(" ");
        var tgl = new Date();
        var hari = tgl.getDay();
        var tanggal = tgl.getDate();
        var bulan = tgl.getMonth();
        var tahun = tgl.getFullYear();
        tanggallengkap = namahari[hari] + ", " +tanggal + " " + namabulan[bulan] + " " + tahun;
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row col-sm-4">
          <!-- <div class="col-sm-6">
          </div> -->
          <div>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">
            Selamat datang <span class="text-uppercase">"<b><?= $this->fungsi->user_login()->nama?>"</b></span>
          <?php
          date_default_timezone_set('Asia/Jakarta');
          $jam = date("H:i:s");
          echo "|";
          $a = date("H");
          if (($a >= 6) && ($a <= 11)) {
            echo "<b> Selamat Pagi !!</b>";
          } else if (($a > 11) && ($a <= 15)) {
            echo " Selamat Siang !!";
          } else if (($a > 15) && ($a <= 18)) {
            echo " Selamat Sore!!";
          } else {
            echo " <b> Selamat Malam, </b>";
          } ?>
           <?php if ($this->fungsi->user_login()->level == "1") { ?>
          Anda bisa mengoperasikan sistem dengan melalui pilihan menu di bawah.
          <?php } ?> 
          <br><h6><b>Anda Login Sebagai <?= ucfirst($this->fungsi->user_login()->level == 1 ? "Admin" : "Camat Kelayang") ?>!</b></h6>
          
          </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
        <!--  -->
              
              
        </div>
        <br><br><br>
        <!--  -->
        <!-- /.card-body -->
        <div class="card-footer">
        <span id='jam' ></span>
        Sekarang | <b> <script language='JavaScript'>document.write(tanggallengkap);</script></b>
       
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
        

      
    <!-- /.content -->