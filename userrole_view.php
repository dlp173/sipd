<!DOCTYPE html>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Data User <button class="btn btn-success" onclick="add_userrole()"><i class="glyphicon glyphicon-plus"></i> Tambah Userbaru</button> </h3>
                </div><!-- /.box-header -->
                   
                 
                    <div class="box-body">
 
 
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Username</th>
          <th>Role</th>
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


  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('userrole/ajax_list')?>",
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

    function add_userrole()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Program'); // Set Title to Bootstrap modal title
    }

    function edit_userrole(u_id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('userrole/ajax_edit/')?>/" + u_id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="u_id"]').val(data.u_id);
            $('[name="nama"]').val(data.nama);
            $('[name="u_name"]').val(data.u_name);
            $('[name="u_paswd"]').val(data.u_paswd);
            $('[name="satker_id"]').val(data.satker_id);
            $('[name="role"]').val(data.role);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Program'); // Set title to Bootstrap modal title
            
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
        url = "<?php echo site_url('userrole/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('userrole/ajax_update')?>";
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

    function delete_userrole(u_id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('userrole/ajax_delete')?>/"+u_id,
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
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data userbaru</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Nama</label>
              <div class="col-md-9">
                <input name="nama" placeholder="Masukkan Nama" class="form-control" type="text">
              </div>
            </div>
              
                 <div class="form-group">
              <label class="control-label col-md-3">Username</label>
              <div class="col-md-9">
                <input name="u_name" placeholder="Masukkan Username" class="form-control" type="text">
              </div>
            </div>
              
            <div class="form-group">
              <label class="control-label col-md-3">Password</label>
              <div class="col-md-9">
                <input name="u_paswd" placeholder="Masukkan Password" class="form-control" type="text">
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
                                                          <label class="control-label col-md-3">Role </label>
                                                          <div class="col-md-9">
                                       <select name="role" class="form-control">
                                            
                                   
                                           <option value="Administrator"> Administrator </option>
                                         <option value="User"> User</option>
                                </select>
                                                          </div>
                                                        </div>
              
              
     
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  