<section class="content-header">
      <div class="container-fluid">
        <div class="row col-sm-4">
          <!-- <div class="col-sm-6">
          </div> -->
          <div>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Klub
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>


<section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
              <div id="error" data-flash="<?= $this->session->flashdata('error'); ?>"> 
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6><i class="fas fa-fw fa-plus"></i> Tambah Data Klub</h6>
                            <a href="<?= base_url('klup'); ?>"class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>  
                            <span class="text">&nbsp;Kembali</span></a>
                        </div>
                    </div>
                    
                    <form action="<?= site_url('klup/proces') ?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        
                            <div class="form-group col-md-4">
                              <label class="font-weight-bold">Nama Klub</label>
                              <input type="hidden" name="id" value="<?= $row->id_klub ?>">
                              <input autocomplete="off" type="text" name="nama_k" value="<?= $row->nama ?>" required class="form-control" />
                            </div>
                            
                            <div class="form-group col-md-4">
                              <label class="font-weight-bold">Kota Klub</label>
                              <input autocomplete="off" type="text" name="klub_k" value="<?= $row->kota ?>" required class="form-control" />
                            </div>
                            
                            
                          </div>
                        </div>
                        <div class="card-footer text-right">
                                <button type="submit" name="<?= $page ?>" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" class="btn"><i class="fa fa-sync-alt"></i> Reset</button>
                        </div>
                            <!-- <?php echo form_close() ?> -->
                     </form>
                </div>
            </div>
        </div>
    </div>
</section>