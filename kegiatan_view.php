<!DOCTYPE html>


  <div class="container">
    <h1>Data Kegiatan</h1>
    <h3>Data Kegiatan</h3>
    <br />
    <button class="btn btn-success" onclick="add_kegiatan()"><i class="glyphicon glyphicon-plus"></i> Add Kegiatan</button>
    <br />
    <br />
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No Lampiran</th>
          <th>Jenis</th>
          <th>Kegiatan</th>
          <th>Tgl.Pergi</th>
          <th>Tgl.Pulang</th>
          <th>Satker</th>
          <th>Tempat</th>
         
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
            "url": "<?php echo site_url('kegiatan/ajax_list')?>",
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

    function add_kegiatan()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Kegiatan'); // Set Title to Bootstrap modal title
    }

    function edit_kegiatan(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('kegiatan/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="no_lampiran"]').val(data.no_lampiran);
            $('[name="tipekegiatan"]').val(data.tipekegiatan);
            $('[name="jeniskegiatan"]').val(data.jeniskegiatan);
            $('[name="tgl_pergi"]').val(data.tgl_pergi);
            $('[name="tgl_pulang"]').val(data.tgl_pulang);
            $('[name="satker"]').val(data.satker);
            $('[name="tempat"]').val(data.tempat);
           
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Kegiatan'); // Set title to Bootstrap modal title
            
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
        url = "<?php echo site_url('kegiatan/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('kegiatan/ajax_update')?>";
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

    function delete_kegiatan(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('kegiatan/ajax_delete')?>/"+id,
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
          <h1 onclick="changeText(this)">Click on this text!</h1>

<script>
function changeText(id) {
    id.innerHTML = "Ooops!";
}
</script>
<!DOCTYPE html>
<html>
<head>
<script>
function removeOption() {
    var x = document.getElementById("mySelect");
    x.remove(x.selectedIndex);
}
</script>
</head>
<body>

<form>
<select id="mySelect">
  <option>Apple</option>
  <option>Pear</option>
  <option>Banana</option>
  <option>Orange</option>
</select>
<input type="button" onclick="removeOption()" value="Remove the selected option">
</form>

</body>
</html>



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
                                       <select name="satker_id" class="form-control">
                                            
                                    <?php foreach($showprogram as $each){ ?>
                                        <option value="<?php echo $each->idprogram; ?>">
                                        <?php echo $each->namaprogram; ?> </option>;
                                    <?php } ?>
                                </select>
                                                          </div>
                                                        </div>
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">No lampiran</label>
              <div class="col-md-9">
                <input name="no_lampiran" placeholder="Masukkan No Lampiran" class="form-control" type="text">
              </div>
            </div>
                                               
            <div class="form-group">
              <label class="control-label col-md-3">Kegiatan</label>
              <div class="col-md-9">
                  <textarea name="jeniskegiatan" placeholder="Masukkan kegiatan" class="form-control" rows="9"></textarea>
              </div>
            </div>
              
             <div class="form-group">
              <label class="control-label col-md-3">Tanggal Pergi</label>
              <div class="col-md-9">
               
                  
             
                    
             <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
         <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_pergi" style="width:150px" >
     </div>
        <input type="hidden" id="dtp_input2" value=""/>
              </div>
             </div>
           
          
          
          <div class="form-group">
              <label class="control-label col-md-3">Tanggal Pulang</label>
              <div class="col-md-9">
                  
                  
 
             <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
         <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_pulang" style="width:150px" >
     </div>
        <input type="hidden" id="dtp_input3" value=""/>
              </div>
             </div>
              
                  
                  
             
              
            

  
             <div class="form-group">
              <label class="control-label col-md-3">Tempat</label>
              <div class="col-md-9">
                   <select name="kota_id" class="form-control">
                                            
                                    <?php foreach($showkota as $each){ ?>
                                        <option value="<?php echo $each->id; ?>">
                                        <?php echo $each->namakota; ?> </option>;
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
  
    
    




    
   






