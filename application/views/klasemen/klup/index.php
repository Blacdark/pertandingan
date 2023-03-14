<section class="content-header">
      <div class="container-fluid">
        <div class="row col-sm-4">
          <!-- <div class="col-sm-6">
          </div> -->
          <div>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Klub</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div id="flash" data-flash="<?= $this->session->flashdata('success'); ?>">
              <div class="card shadow mb-4">  
                <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                      <h6><i class="fa fa-list"></i> Daftar Data Klup</h6>
                      <a href="<?= base_url('klup/tambah'); ?>" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
                    </div>
                </div>
                  <!-- /.card-body -->
                <div class="card-body">
                  <table id="table1" class="table table-bordered table-striped">
                    <thead>
                      <tr align="center">
                        <th width="5%">No</th>
                        <th>Nama Klub</th>
                        <th>Kota Klub</th>
                        <th width="15%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                            foreach ($row->result() as $key => $data) { ?>
                              <tr align="center">
                                <td style="width:5%;"><?= $no++ ?>.</td>
                                <td><?= $data->nama ?></td>
                                <td><?= $data->kota ?></td>
                                <td class="text-center" width="160px">
                                  <a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= site_url('klup/edit/' . $data->id_klub) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                  <a  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= site_url('klup/del/' . $data->id_klub) ?>" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                              </tr>
                        <?php
                        } ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.end card-body -->
              </div>
            </div>
          </div>
        </div>
      </div>
</section>
   

