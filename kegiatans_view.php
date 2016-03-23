<!DOCTYPE html>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Master Data Kegiatan    </div><!-- /.box-header -->
                   
                       <button  class="btn btn-info btn-lg" onclick="add_kegiatans()"><i class="glyphicon glyphicon-plus"></i> Tambah Data Kegiatan</button></h3>
              
                    <div class="box-body">

 
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Satker</th>
               <th>No.Kegiatan</th> 
          <th>Kegiatan</th>
          <th>Program</th>
          <th>Anggaran kegiatan (Rp.)</th>
          <th>Tipe Kegiatan</th>
     
  
           
           
          
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      
    </table>
  </div>

  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
 

<script src="<?php echo base_url('assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js')?>"></script>
<script src="<?php echo base_url('assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js')?>"></script>



  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('kegiatans/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
    });

    function add_kegiatans()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Kegiatans'); // Set Title to Bootstrap modal title
    }

    function edit_kegiatans(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('kegiatans/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="idkegiatan"]').val(data.idkegiatan);
            $('[name="program_id"]').val(data.program_id);
            $('[name="satker_id"]').val(data.satker_id);
            $('[name="namakegiatan"]').val(data.namakegiatan);
            $('[name="tipekegiatan"]').val(data.tipekegiatan);
            $('[name="nominalkegiatan"]').val(data.nominalkegiatan);
       
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kegiatan'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    
    function detail_kegiatans(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('kegiatans/ajax_detail/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#finalresult').html(data);
            $('[name="id"]').val(data.id);
            $('[name="idkegiatan"]').val(data.idkegiatan);
            $('[name="program_id"]').val(data.program_id);
            $('[name="satker_id"]').val(data.satker_id);
            $('[name="namakegiatan"]').val(data.namakegiatan);
            $('[name="namaprogram"]').val(data.namaprogram);
            $('[name="tipekegiatan"]').val(data.tipekegiatan);
            $('[name="nominalkegiatan"]').val(data.nominalkegiatan);
            $('[name="satker"]').val(data.satker);
            
            
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Details Kegiatan'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      
      var url;
      if(save_method == 'add') 
      {
        url = "<?php echo site_url('kegiatans/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('kegiatans/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_kegiatans(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('kegiatans/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }

  </script>

  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data Kegiatan</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
             <div class="form-group">
              <label class="control-label col-md-3">Tipe Perjalanan</label>
            <div class="col-md-9">
                <select name="tipekegiatan" class="form-control">
                  <option value="Luar Kota">Luar Kota</option>
                  <option value="Dalam Kota">Dalam Kota</option>
                  <option value="Diklat">Diklat</option>
                </select>
              </div>
            </div> 
          
                <div class="form-group">
                                                          <label class="control-label col-md-3">Satker</label>
                                                          <div class="col-md-9">
                                       <select name="satker_id" class="form-control">
                                            
                                    <?php foreach($showsatker as $each){ ?>
                                        <option value="<?php echo $each->idsatker; ?>">
                                        <?php echo $each->satker; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
         
          
                <div class="form-group">
                                                          <label class="control-label col-md-3">Program</label>
                                                          <div class="col-md-9">
                                       <select name="program_id" class="form-control">
                                            
                                    <?php foreach($showprogram as $each){ ?>
                                        <option value="<?php echo $each->idprogram; ?>">
                                        <?php echo $each->namaprogram; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
           <div class="form-group">
              <label class="control-label col-md-3">No kegiatan</label>
              <div class="col-md-9">
                  <input name="idkegiatan" placeholder="Masukkan No kegiatan" class="form-control" rows="9">
                  </div>
           </div>     
          
            <div class="form-group">
              <label class="control-label col-md-3">Nama Kegiatan</label>
              <div class="col-md-9">
                  <textarea name="namakegiatan" placeholder="Masukkan Nama kegiatan" class="form-control" rows="9"></textarea>
              </div>

            </div>
             
              <div class="form-group">
              <label class="control-label col-md-3">Anggaran Kegiatan (Rp.)</label>
              <div class="col-md-9">
                  <input name="nominalkegiatan" placeholder="Masukkan pagu kegiatan" class="form-control" rows="9">
              </div>
            </div>
                  
                  
             
               </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
            

  
          </div>
       
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


<div class="modal fade" id="modal_form1" role="dialog">
  
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data Kegiatan</h3> 
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
               <div class="form-group">
              <label class="control-label col-md-3">tipekegiatan</label>
              <div class="col-md-9">
                  <input name="tipekegiatan" disabled="true" placeholder="Masukkan No kegiatan" class="form-control" rows="9">
                  </div>
           </div>  
           
           <div id="finalresult" ></div>
                <div class="form-group">
                                                          <label class="control-label col-md-3">Satker</label>
                                                          <div class="col-md-9">
                                       <select disabled="true" name="satker_id" class="form-control">
                                            
                                    <?php foreach($showsatker as $each){ ?>
                                        <option value="<?php echo $each->idsatker; ?>">
                                        <?php echo $each->satker; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
          
                <div class="form-group">
                                                          <label class="control-label col-md-3">Program</label>
                                                          <div class="col-md-9">
                                       <select disabled="true" name="program_id" class="form-control">
                                            
                                    <?php foreach($showprogram as $each){ ?>
                                        <option value="<?php echo $each->idprogram; ?>">
                                        <?php echo $each->namaprogram; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
           <div class="form-group">
              <label class="control-label col-md-3">Nama Program</label>
              <div class="col-md-9">
                  <input name="namaprogram" disabled="true" placeholder="Masukkan No kegiatan" class="form-control" rows="9">
                  </div>
           </div>     
           <div class="form-group">
              <label class="control-label col-md-3">No kegiatan</label>
              <div class="col-md-9">
                  <input name="idkegiatan" disabled="true" placeholder="Masukkan No kegiatan" class="form-control" rows="9">
                  </div>
           </div>                            
            <div class="form-group">
                
                <div id="namakegiatan" name="namakegaitan"> </div>
              <label class="control-label col-md-3">Nama Kegiatan</label>
              <div class="col-md-9">
                  <textarea name="namakegiatan" disabled="true" placeholder="Masukkan Nama kegiatan" class="form-control" rows="9"></textarea>
              </div>
            </div>
             
              <div class="form-group">
              <label class="control-label col-md-3">Anggaran Kegiatan (Rp.)</label>
              <div class="col-md-9">
                  <input name="nominalkegiatan" disabled="true" placeholder="Masukkan pagu kegiatan" class="form-control" rows="9">
              </div>
            </div>
                  
                  
             
               </form>
          
            

  
          </div>
       
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
    
   






