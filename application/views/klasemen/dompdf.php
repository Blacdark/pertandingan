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
        tanggallengkap =tanggal + " " + namabulan[bulan] + " " + tahun;
</script>
<section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
</section>
<section class="content">
      <div class="row">
        <div class="col-12">
                <!-- /.card-header -->
            <div class="card-body">
            <link rel="stylesheet" href="">
            <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
            <style>
                .line-title{
                border: 0;
                border-style: inset;
                border-top: 1px solid #000;
                }
            </style>
            <img src="<?= base_url('assets/login/logo-220922-44a284eed9-removebg-preview.png')?>" style="position: absolute; width: 150px; height: auto;">
            <table style="width: 100%;">
                <tr>
                <td align="center">
                </td>
                </tr>
            </table>
            <hr class="line-title"> 
            <h3><p align="center">
            <b> HASIL KLASEMEN </b><br>
            </p></h3> <br>
                <table class="table table-bordered">
                    <tr align="center">
                    <th>No</th>
                    <th>Klub</th>
                    <th>Ma</th>
                    <th>Me</th>
                    <th>S</th>
                    <th>K</th>
                    <th>GM</th>
                    <th>GK</th>
                    <th><i>Point</i></th>
                    </tr>
                     <tbody>

                        <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                              <tr align="center">
                                <td style="width:5%;"><?= $no++ ?>.</td>
                                <td><?= $data->klub ?></td>
                                <td><?= $data->ma ?></td>
                                <td><?= $data->me ?></td>
                                <td><?= $data->s ?></td>
                                <td><?= $data->k ?></td>
                                <td><?= $data->gm ?></td>
                                <td><?= $data->gk ?></td>
                                <td><?= $data->me *3 + $data->s *1 + $data->k *0?></td>
                              </tr>
                        <?php
                        } ?>
                    </tbody>
                </table>
               
                <table style="width: 100%;">
                    <tr>
                    <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                    <td align="left">
                        <br>
                        <span style="line-height: 1.6; font-weight: bold;">
                        <span id='jam' ></span>Ma = Main <br> Me = Menang <br> S = Seri <br> K = Kalah 
                        <br> GM = Goal Menang <br> GK = Goal Kalah
                        </span>
                    </td>
                    </tr>
                </table>
                <table style="width: 100%;">
                    <tr>
                    <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                    <td align="right">
                        <br>
                        <span style="line-height: 1.6; font-weight: bold;">
                        <span id='jam' ></span>Panitia
                        </span>
                    </td>
                    </tr>
                </table>
            </div>
                <!-- /.card-body -->
        </div>
    </div>
</section>
<!-- <script>
		window.print();
</script> -->