<section class="content-header">
      <div class="container-fluid">
        <div class="row col-sm-4">
          <div>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6><i class="fas fa-fw fa-list"></i> &nbsp;Daftar Data Pengguna</h6>
                            <a href="<?= base_url('pengguna/tambah'); ?>" class="btn btn-sm btn-success"> <i class="fa fa-plus">&nbsp;</i> Tambah Data </a>
                    </div>
                </div>
                <!-- table -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                      <thead>
                      <tr align="center">
                          <th width="5%">No</th>
                          <th>Nama</th>
                          <th>Username</th>
                          <th>Alamat</th>
                          <th>Gambar</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                      <tbody>
                        <?php $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr align="center">
                                <td style="width:5%;"><?= $no++ ?>.</td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->username ?></td>
                                <td><?= $data->alamat ?></td>
                                <td>
                                    <?php if ($data->gambar != null) { ?>
                                        <a href="<?= base_url('uploads/' . $data->gambar) ?>">
                                            <img src="<?= base_url('uploads/' . $data->gambar) ?> " style="width:50px;height:50px">
                                        </a>
                                    <?php } ?>
                                </td>

                                <td class="text-center" width="160px">
                                <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= site_url('pengguna/edit/' . $data->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= site_url('pengguna/del/' . $data->id_user) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash" ></i> Hapus</a>
                              </td>
                            </tr>
                        <?php
                        } ?>
                    </tbody>
                      <!--  -->
                    </table>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>