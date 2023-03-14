<section class="content-header">
      <div class="container-fluid">
        <div class="row col-sm-4">
          <div>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Pengguna</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6><i class="fas fa-fw fa-user-edit"></i> &nbsp;Edit Data Pengguna</h6>
                            <a href="<?= base_url('pengguna'); ?>"class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>  
                            <span class="text">&nbsp;Kembali</span></a>
                        </div>
                    </div>
                    <?php echo form_open_multipart('pengguna/proses') ?>
                        <div class="card-body">
                          <div class="row">
                          <div class="form-group col-md-6">
                            <label class="font-weight-bold">Username</label>
                            <input type="hidden" name="id" value="<?= $row->id_user ?>">
                            <input autocomplete="off" type="text" name="username" value="<?= $row->username ?> "required class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Password</label>
                            <input autocomplete="off" type="password" name="password" class="form-control"/>
                            <small style="color:red;"> * Biarkan kosong jika tidak <?= $page == 'edit' ? 'diganti!' : 'ada' ?> </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Nama Lengkap</label>
                            <input autocomplete="off" type="text" name="nama_pengguna" value="<?= $row->nama ?>" required class="form-control"/>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Gambar</label>
                            <input type="file" name="gambar" value="<a href="<?= base_url('uploads/' . $row->gambar) ?>>
                            <img src="<?= base_url('uploads/' . $row->gambar) ?> " style="width:100px;height:100px">
                        </div>
                        <div class="form-group col-md-6">
                                <label>Alamat *</label>
                                <textarea name="alamat" class="form-control" required><?= $row->alamat ?></textarea>
                                </div>
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold">Kota</label>
                            <input autocomplete="off" type="text" name="kota" value="<?= $row->kota ?>"  required class="form-control"/>
                        </div>
                          </div>
                        </div>
                        <div class="card-footer text-right">
                                <button type="submit" name="<?= $page ?>" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn"><i class="fa fa-sync-alt"></i> Reset</button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
</section>