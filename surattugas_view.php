<!DOCTYPE html>


  <div class="container">
    <h1>Data Surat Tugas</h1>

    <h3>Data Surat Tugas</h3>
    <br />
    <button class="btn btn-success" onclick="add_surattugas()"><i class="glyphicon glyphicon-plus"></i> Add Surattugas</button>
    <a href="<?php echo base_url('index.php/home/pdf');?>"">Print Surat Tugas</a>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Kegiatan</th>
          <th>Nama</th>
          <th>Nip</th>

          <th>Tempat</th>
           <th>Golongan</th>
       
          
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr>
         <th>Kegiatan</th>
          <th>Nama</th>
          <th>Nip</th>

          <th>Tempat</th>
      <th>Golongan</th>
          <th>Action</th>
        </tr>
      </tfoot>
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
            "url": "<?php echo site_url('surattugas/ajax_list')?>",
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

    function add_surattugas()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Surattugas'); // Set Title to Bootstrap modal title
      
    }
    
    function edit_surattugas(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('surattugas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="pegawai_id"]').val(data.pegawai_id);
            $('[name="kegiatan_id"]').val(data.kegiatan_id);
            
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Surattugas'); // Set title to Bootstrap modal title
            
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
        url = "<?php echo site_url('surattugas/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('surattugas/ajax_update')?>";
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

    function delete_surattugas(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('surattugas/ajax_delete')?>/"+id,
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
        <h3 class="modal-title">Form Surattugas</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
            
                                                        <div class="form-group">
                                                          <label class="control-label col-md-3">Pilih Kegiatan</label>
                                                          <div class="col-md-9">
                                      <select name="kegiatan_id">
                <?php foreach($showkeg as $each){ ?>
                    <option value="<?php echo $each->id; ?>"> <?php echo $each->jeniskegiatan; ?> </option>';
                <?php } ?>
     </select>
    
                                                          </div>
                                                        </div>
              
              
              <div class="form-group">
                                                          <label class="control-label col-md-3">Pilih Kegiatan</label>
                                                          <div class="col-md-9">
                                     <select name="pegawai_id">
                <?php foreach($showpeg as $each){ ?>
                    <option value="<?php echo $each->id; ?>"> <?php echo $each->nama; ?> </option>';
                <?php } ?>
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
  