<!DOCTYPE html>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
                <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Master Data subbag    </div><!-- /.box-header -->
         
                          
                   
                 <button  class="btn btn-info btn-lg"onclick="add_satker()"><i class="glyphicon glyphicon-plus"></i> Tambah Data Sub.Bagian</button></h3>
                 
                     <div class="box-body">
              
 
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Satker</th>
          <th>No.Subbag</th>
          <th>Nama Sub.Bag</th>
          <th>Ka. Sub Bagian</th>
        
         

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
            "url": "<?php echo site_url('subbagian/ajax_list')?>",
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
      $('.modal-title').text('Tambah Data Sub. Bagian'); // Set Title to Bootstrap modal title
    }

    function edit_satker(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('subbagian/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="satker_id"]').val(data.satker_id);
            $('[name="idsubbag"]').val(data.idsubbag);
            $('[name="subbag"]').val(data.subbag);
       
          
            
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
        url = "<?php echo site_url('subbagian/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('subbagian/ajax_update')?>";
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

    function delete_satker(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('subbagian/ajax_delete')?>/"+id,
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
        <h3 class="modal-title">Form Data Sub. Bagian</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
            <div class="form-body">
           <input type="hidden" value="" name="id"/> 
                <div class="form-group">
                                                          <label class="control-label col-md-3">Satker</label>
                                                          <div class="col-md-9">
                                     <select name="satker_id" class="form-control" id="chosen_select">
			<option>- Pilih Satker -</option>
			<?php foreach($showsatker as $satker){
				echo '<option value="'.$satker->idsatker.'">'.$satker->satker.'</option>';
			} ?>
		</select>
                                                          </div>
                                                        </div> 
            <div class="form-group">
              <label class="control-label col-md-3">No. Sub.Bagian</label>
              <div class="col-md-9">
                <input name="idsubbag" placeholder="Masukkan No. Sub Bagian" class="form-control" type="text">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Sub. Bagian</label>
              <div class="col-md-9">
                  <textarea name="subbag" placeholder="Nama Sub.Bagian " class="form-control" type="text"> </textarea>
              </div>
            </div>
            <div class="form-group">
                                                          <label class="control-label col-md-3">Kasubbag</label>
                                                          <div class="col-md-9">
                                     <select name="kasubbag_pegawai_id" class="form-control" id="chosen_select">
			<option>- Pilih Ka.Sub Bagian -</option>
			<?php foreach($showpegawai as $satker){
				echo '<option value="'.$satker->id.'">'.$satker->nama.'</option>';
			} ?>
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
        <h3 class="modal-title">Form Data Sub Bagian</h3>
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