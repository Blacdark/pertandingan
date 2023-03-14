<section class="content-header">
      <div class="container-fluid">
        <div class="row col-sm-4">
          <!-- <div class="col-sm-6">
          </div> -->
          <div>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Skor
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>

<section class="content">
      <div class="row">
        <div class="col-12">
            <div class="card">
            <script src="<?php echo base_url("assets/plugins/jquery/jquery.min.js"); ?>" type="text/javascript"></script>
            <div id="error" data-flash="<?= $this->session->flashdata('error'); ?>"> 
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <div class="d-sm-flex align-items-center justify-content-between">
                            <h6><i class="fas fa-fw fa-plus"></i> Tambah Data Skor</h6>
                            <a href="<?= base_url('skor'); ?>"class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>  
                            <span class="text">&nbsp;Kembali</span></a>
                        </div>
                    </div>
                        
                    <form action="<?= site_url('skor/proces') ?>" method="post">

                            <div class="card-body">
                          <div class="row">  
                            <div class="form-group col-md-2">
                              <label class="font-weight-bold">Nama Klub</label>
                              <?php echo form_dropdown(
                                    'unit',
                                    $unit,
                                    $selectedunit,
                                    ['class' => 'form-control', 'required' => 'required']
                                ) ?>
                            </div>
                            <label class="font-weight-bold">Skor : </label>
                            <!--  -->
                            &nbsp;&nbsp;
                            <div class="form-group col-md-1">
                              <label class="font-weight-bold">Ma</label>
                              <input type="hidden" name="id" value="<?= $row->id_skor ?>">
                              <input autocomplete="off" type="number" name="ma" value="<?= $row->ma ?>" required class="form-control" />
                            </div>
                            <div class="form-group col-md-1">
                              <label class="font-weight-bold">Me</label>
                              <input autocomplete="off" type="number" name="me" value="<?= $row->me ?>" required class="form-control"/>
                            </div>
                            <div class="form-group col-md-1">
                              <label class="font-weight-bold">S</label>
                              <input autocomplete="off" type="number" name="s" value="<?= $row->s ?>" required class="form-control"/>
                            </div>
                            <div class="form-group col-md-1">
                              <label class="font-weight-bold">K</label>
                              <input autocomplete="off" type="number" name="k" value="<?= $row->k ?>" required class="form-control"/>
                            </div>
                            <div class="form-group col-md-1">
                              <label class="font-weight-bold">GM</label>
                              <input autocomplete="off" type="number" name="gm" value="<?= $row->gm ?>" required class="form-control"/>
                            </div>
                            <div class="form-group col-md-1">
                              <label class="font-weight-bold">GK</label>
                              <input autocomplete="off" type="number" name="gk" value="<?= $row->gk ?>" required class="form-control"/>
                            </div>
                            
                          </div>
                          <div class=" text-right">
                          <button type="button" id="btn-tambah-form" class="btn btn-success"><i class="fas fa-fw fa-plus"></i></button>&nbsp;&nbsp;
                              </div>
                        </div>
                        <div id="insert-form"></div>
                        <div class="card-footer text-right">
                               
                                <button type="submit" name="<?= $page ?>" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
                                <button type="reset" id="btn-reset-form" class="btn"><i class="fa fa-sync-alt"></i> Reset</button>
                            </div>
                    <!-- <?php echo form_close() ?> -->
                    </form>
                    <input type="hidden" id="jumlah-form" value="1">
                </div>
            </div>
        </div>
    </div>
</section>

<input type="hidden" id="jumlah-form" value="1">
  
  <script>
  $(document).ready(function(){ 
    $("#btn-tambah-form").click(function(){ 
      var jumlah = parseInt($("#jumlah-form").val()); 
      var nextform = jumlah + 1; 
      

      $("#insert-form").append("<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nama Klub ke " + nextform + " :</b>" +
        "<table>" +
        
        "</table>" +
        "<br><br>");
      
      $("#jumlah-form").val(nextform); 
    });
    

    $("#btn-reset-form").click(function(){
      $("#insert-form").html(""); 
      $("#jumlah-form").val("1"); 
    });
  });
  </script>