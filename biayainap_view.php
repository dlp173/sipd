<!DOCTYPE html>


  <div class="container">
    <h1>Data Biaya Penginapan</h1>

    <h3>Data Biaya Penginapan</h3>
    <br />
    <button class="btn btn-success" onclick="add_biayarill()"><i class="glyphicon glyphicon-plus"></i> Add Biayarill</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Provinsi</th>
          <th>Eselon 1</th>
          <th>Eselon 2</th>
          <th>Gol 4</th>
          <th>Gol 3</th>
          <th>Gol 1 dan 2</th>
         
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
            "url": "<?php echo site_url('biayainap/ajax_list')?>",
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

    function add_biayainap()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Biayainap'); // Set Title to Bootstrap modal title
    }

    function edit_biayainap(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('biayainap/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="provinsi"]').val(data.provinsi);
            $('[name="eselon1"]').val(data.eselon1);
            $('[name="eselon2"]').val(data.eselon2);
            $('[name="gol_4"]').val(data.gol_4);
            $('[name="gol_3"]').val(data.gol_3);
            $('[name="golongan_1_2"]').val(data.golongan_1_2);
           
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Biayainap'); // Set title to Bootstrap modal title
            
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
        url = "<?php echo site_url('biayainap/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('biayainap/ajax_update')?>";
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

    function delete_biayainap(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('biayainap/ajax_delete')?>/"+id,
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
        <h3 class="modal-title">Form Data Biaya Harian</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Provinsi</label>
              <div class="col-md-9">
                <input name="provinsi" placeholder="masukkan Nama Provinsi" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Eselon 1</label>
              <div class="col-md-9">
                <input name="eselon_1" placeholder="Masukkan Biaya Inap Eselon 1" class="form-control" type="text">
              </div>
            </div>
                                                   
            <div class="form-group">
              <label class="control-label col-md-3">Eselon 2</label>
              <div class="col-md-9">
                <textarea name="eselon_2" placeholder="Masukkan Biaya Inap Eselon 2"class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gol. 4</label>
              <div class="col-md-9">
                <input name="gol_4" placeholder="Masukkan Biaya Golongan 4" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Gol. 3</label>
              <div class="col-md-9">
                <input name="gol_3" placeholder="Masukkan Biaya Golongan 3" class="form-control" type="text">
              </div>
            </div>
                <div class="form-group">
              <label class="control-label col-md-3">Gol. 1 dan 2</label>
              <div class="col-md-9">
                <input name="golongan_1_2" placeholder="Masukkan Biaya Golongan 1 dan 2 " class="form-control" type="text">
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
  