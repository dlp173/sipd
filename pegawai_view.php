<!DOCTYPE html>
       <!-- Content Wrapper. Contains page content -->
      
       <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Master Data Pegawai <button class="btn btn-success" onclick="add_pegawai()"><i class="glyphicon glyphicon-plus"></i> Tambah Data Pegawai</button></h3>
                </div><!-- /.box-header -->
                   
                 
                    <div class="box-body">
              
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

               

                 <script type="text/javascript">

                   var save_method; //for save method string
                   var table;
                   $(document).ready(function() {
                     table = $('#table').DataTable({ 

                       "processing": true, //Feature control the processing indicator.
                       "serverSide": true, //Feature control DataTables' server-side processing mode.

                       // Load data for the table's content from an Ajax source
                       "ajax": {
                           "url": "<?php echo site_url('pegawai/ajax_list')?>",
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

                   function add_pegawai()
                   {
                     save_method = 'add';
                     $('#form')[0].reset(); // reset form on modals
                     $('#modal_form').modal('show'); // show bootstrap modal
                     $('.modal-title').text('Add Pegawai'); // Set Title to Bootstrap modal title
                   }

                   function edit_pegawai(id)
                   {
                     save_method = 'update';
                     $('#form')[0].reset(); // reset form on modals

                     //Ajax Load data from ajax
                     $.ajax({
                       url : "<?php echo site_url('pegawai/ajax_edit/')?>/" + id,
                       type: "GET",
                       dataType: "JSON",
                       success: function(data)
                       {

                           $('[name="id"]').val(data.id);
                           $('[name="nama"]').val(data.nama);
                           $('[name="nip"]').val(data.nip);
                           $('[name="jabatan"]').val(data.jabatan);
                           $('[name="golongan_id"]').val(data.golongan_id);
                           $('[name="satker_id"]').val(data.satker_id);

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
                       url = "<?php echo site_url('pegawai/ajax_add')?>";
                     }
                     else
                     {
                       url = "<?php echo site_url('pegawai/ajax_update')?>";
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

                   function delete_pegawai(id)
                   {
                     if(confirm('Are you sure delete this data?'))
                     {
                       // ajax delete data to database
                         $.ajax({
                           url : "<?php echo site_url('pegawai/ajax_delete')?>/"+id,
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
                       <h3 class="modal-title">Form Data Pegawai</h3>
                     </div>
                     <div class="modal-body form">
                       <form action="#" id="form" class="form-horizontal">
                         <input type="hidden" value="" name="id"/> 
                         <div class="form-body">
                           <div class="form-group">
                             <label class="control-label col-md-3">Nama</label>
                             <div class="col-md-9">
                               <input name="nama" placeholder="Masukkan Nama pegawai" class="form-control" type="text">
                             </div>
                           </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Nip</label>
                             <div class="col-md-9">
                               <input name="nip" placeholder="Masukkan No Nip" class="form-control" type="text">
                             </div>
                           </div>
                                                                       <div class="form-group">
                                                                         <label class="control-label col-md-3">Golongan</label>
                                                                         <div class="col-md-9">
                                                      <select name="golongan_id" class="form-control">

                                                   <?php foreach($showgol as $each){ ?>
                                                       <option value="<?php echo $each->id; ?>">
                                                       <?php echo $each->golongan; ?> </option>;
                                                   <?php } ?>
                                               </select>
                                                                         </div>
                                                                       </div>
                           <div class="form-group">
                             <label class="control-label col-md-3">Jabatan</label>
                             <div class="col-md-9">
                               <textarea name="jabatan" placeholder="Address"class="form-control"></textarea>
                             </div>
                           </div>
                                    <div class="form-group">
                                                                         <label class="control-label col-md-3">Satuan Kerja</label>
                                                                         <div class="col-md-9">
                                                      <select name="satker_id" class="form-control">

                                                   <?php foreach($showsatker as $each){ ?>
                                                       <option value="<?php echo $each->idsatker; ?>">
                                                       <?php echo $each->satker; ?> </option>;
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

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

    <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
   <script src="<?php echo base_url('assets/chosen/chosen.jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/a/chosen/gofrendi.chosen.ajaxify.js')?>"></script>
<script src="<?php echo base_url('assets/a/chosen/jquery-1.11.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/chosen/jquery.chained.js')?>"></script>
       <link href="<?php echo base_url('assets/a/chosen/chosen.min.css')?>" rel="stylesheet">


<script src="<?php echo base_url('assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js')?>"></script>
