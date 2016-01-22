<!DOCTYPE html>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Master Data Satuan Kerja     </div><!-- /.box-header -->
         
                          
                   
                 <button  class="btn btn-info btn-lg"onclick="add_satker()"><i class="glyphicon glyphicon-plus"></i> Tambah Data Satker</button></h3>
                 
                     <div class="box-body">
              
 
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No Satker</th>
          <th>Satker</th>
          <th>PPK</th>
          <th>Bendahara</th>
          <th>Tanggal / No. Dipa</th>
      
         

          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      
    </table>
  </div>


  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('satker/ajax_list')?>",
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

    function add_satker()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Satker'); // Set Title to Bootstrap modal title
    }

    function edit_satker(idsatker)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('satker/ajax_edit/')?>/" + idsatker,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="idsatker"]').val(data.idsatker);
            $('[name="satker"]').val(data.satker);
            $('[name="ppk_golongan_id"]').val(data.ppk_golongan_id);
            $('[name="bendahara_pegawai_id"]').val(data.bendahara_pegawai_id);
            $('[name="no_dipa"]').val(data.no_dipa);
           
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Satker'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    
    function detail_satker(idsatker)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('satker/ajax_detail/')?>/" + idsatker,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            
            $('#idsatker').html(data.idsatker);
            $('#satker').html(data.satker);
            $('#no_dipa').html(data.no_dipa);
            $('#namappk').html(data.namappk);
            $('#namabendahara').html(data.namabendahara);
            $('#modal_form_detail').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Detail Satker'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
              alert('Error adding / update data');
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
        url = "<?php echo site_url('satker/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('satker/ajax_update')?>";
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

    function delete_satker(idsatker)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('satker/ajax_delete')?>/"+idsatker,
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
        <h3 class="modal-title">Form Data Satker</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
            <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">No Satker</label>
              <div class="col-md-9">
                <input name="idsatker" placeholder="Masukkan Ruang Golongan" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Satker</label>
              <div class="col-md-9">
                <input name="satker" placeholder="Masukkan Golongan" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Tanggal / No. Dipa</label>
              <div class="col-md-9">
                <input name="no_dipa" placeholder="Contoh : 14 November 2014/ 025.01.2.648652/2015 " class="form-control" type="text">
              </div>
            </div>
                 <div class="form-group">
              <label class="control-label col-md-3">Pejabat Pembuat Komitmen</label>
              <div class="col-md-9">
                <select name="ppk_golongan_id" class="form-control">
                                            
                                    <?php foreach($showpegawai as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->nama; ?> </option>;
                                    <?php } ?>
                                </select>
              </div>
            </div>
                                                
             <div class="form-group">
              <label class="control-label col-md-3">Bendahara </label>
              <div class="col-md-9">
                <select name="bendahara_pegawai_id" class="form-control">
                                            
                                    <?php foreach($showpegawai as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->nama; ?> </option>;
                                    <?php } ?>
                                </select>
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

  </div>
  
  
  <!-- Info Detail Satkerr -->
  
 

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
     
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_detail" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data Satker</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
   
       PPK : <div id="namappk"></div>   <br>
            Bendahara : <div id="namabendahara">  </div> <br>
            
  
            No. Sakter : <div id="idsatker"></div>  aaaaaaaaaa <br>
            Sakter : <div id="satker"></div> <br>
            Tanggal / No. Dipa : <div id="no_dipa"> <br>
           
            
            
       </form>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>
  
  
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->