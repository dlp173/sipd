<!DOCTYPE html>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                     <h3 class="box-title">Data User : <?php echo $this->session->userdata('nama'); ?> <?php echo $this->session->userdata('u_id'); ?> / <?php echo $this->session->userdata('role'); ?> </h3>
                </div><!-- /.box-header -->
                   
                 
                    <div class="box-body">
 
 <div class="form-group">
              <label class="control-label col-md-3">Password Lama</label>
              <div class="col-md-9">
                <input name="u_paswd" placeholder="Masukkan Password Lama" class="form-control" type="text">
              </div>
            </div>
              <div class="form-group">
              <label class="control-label col-md-3">Password Baru</label>
              <div class="col-md-9">
                <input name="u_paswd" placeholder="Masukkan Password Baru" class="form-control" type="text">
              </div>
            </div>
                        <div class="form-group">
              <label class="control-label col-md-3">Konfirmasi Password</label>
              <div class="col-md-9">
                <input name="u_paswds" placeholder="Masukkan Password Baru" class="form-control" type="text">
              </div>
            </div>
                        <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Change Password</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          </div>
                        
  </div>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>



    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  