<!DOCTYPE html>


  <div class="container">
    <h1>Rencana Biaya Perjalanan Dinas</h1>

    <h3>Rincian Biaya</h3>
    <br />
    <button class="btn btn-success" onclick="add_rencanabiaya()"><i class="glyphicon glyphicon-plus"></i> Add Rencana biaya</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Nip</th>
          <th>Jabatan</th>
          <th>Ruang Golongan</th>
          <th>Pangkat</th>
          <th>satker</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr>
          <th>Nama</th>
          <th>Nip</th>
          <th>Jabatan</th>
          <th>Ruang Golongan</th>
          <th>Pangkat</th>
          <th>satker</th>
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
            "url": "<?php echo site_url('rencanabiaya/ajax_list')?>",
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

    function add_rencanabiaya()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add rencanabiaya'); // Set Title to Bootstrap modal title
    }

    function edit_rencanabiaya(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('rencanabiayas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="nama"]').val(data.nama);
            $('[name="nip"]').val(data.nip);
            $('[name="jabatan"]').val(data.jabatan);
            $('[name="golongan_id"]').val(data.golongan_id);
            $('[name="satker"]').val(data.satker);
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Person'); // Set title to Bootstrap modal title
            
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
        url = "<?php echo site_url('rencanabiaya/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('rencanabiaya/ajax_update')?>";
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

    function delete_rencanabiaya(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('rencanabiaya/ajax_delete')?>/"+id,
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
  <div class="modal fade " id="modal_form" role="dialog">
  <div class="modal-dialog-fulls ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Rencana Biaya</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
          <div class="form-body">
         <div class="row">
<div class="col-md-6">
<div class="panel panel-default">
  <div class="panel-heading">Data Peserta Kegiatan</div>
  <div class="panel-body">
    <div class="form-group">
                                                                       <label class="control-label col-md-3">Data Peserta</label><div class="col-md-9"> 
                                                             <select name="pegawai_id" class="form-control">
                                            
                                    <?php foreach($showpeg as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->nama; ?> </option>;
                                    <?php } ?>
                                </select>
                                                                       </div>                    
    </div>
      
      <br>
      <div class="form-group">
                                                                       <label class="control-label col-md-3">Rincian Biaya Kegiatan</label><div class="col-md-9"> 
                                                             <select name="kegiatan_id" class="form-control">
                                            
                                    <?php foreach($showkeg as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->jeniskegiatan; ?> </option>;
                                    <?php } ?>
                                </select>
                                                                       </div>                    
    </div>
  </div>
</div>
</div>
 <div class="col-md-6">   
<div class="panel panel-default ">
  <div class="panel-heading">Data Kegiatan</div>
  <div class="panel-body">
    
                                                                     <div class="form-group">
                                                          <label class="control-label col-md-3">Biaya Inap</label>
                                                          <div class="col-md-9">
                                       <select name="biayainap_id" class="form-control">
                                            
                                    <?php foreach($showinap as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->provinsi; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
      
      
                        <div class="form-group">
                                                          <label class="control-label col-md-3">Biaya harian</label>
                                                          <div class="col-md-9">
                                       <select name="biayaharian_id" class="form-control">
                                            
                                    <?php foreach($showinap as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->eselon_1; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
            <div class="form-group">
                                                          <label class="control-label col-md-3">Biaya rill</label>
                                                          <div class="col-md-9">
                                       <select name="biayarill_id" class="form-control">
                                            
                                    <?php foreach($showinap as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->eselon_1; ?> </option>;
                                    <?php } ?>
                                </select>
                                                         
                                                          </div>
                                                        </div>
            <div class="form-group">
              <label class="control-label col-md-3">Total Hari</label>
              <div class="col-md-9">
                <textarea name="totalhari" placeholder="Address"class="form-control"></textarea>
              </div>
            </div>
      <div class="form-group">
              <label class="control-label col-md-3">Total biaya</label>
              <div class="col-md-9">
                <textarea name="totalbiaya" placeholder="Address"class="form-control"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Pejabat Pembuat Komitmen</label>
              <div class="col-md-9">
                <input name="satker" placeholder="satuan kerja" class="form-control" type="text">
              </div>
            </div>
          </div>
          
      
      
  </div>
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
  