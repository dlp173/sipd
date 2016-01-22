<!DOCTYPE html>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
      
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">Master Data Sub Kegiatan    </div><!-- /.box-header -->
                   
                     <button  class="btn btn-info btn-lg" onclick="add_subkegiatans()"><i class="glyphicon glyphicon-plus"></i> Tambah Data Sub Kegiatan</button></h3>
              
                    <div class="box-body">
    

 
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Satker</th>
          <th>Subkegiatans</th>
          <th>Tgl.Pergi</th>
          <th>Hari</th>
          <th>Kota Tujuan</th>
         
          
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      
    </table>
  </div>
      </div>
  </div></div>
            





  <script type="text/javascript">

    var save_method; //for save method string
    var table;
    $(document).ready(function() {
      table = $('#table').DataTable({ 
        
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('subkegiatans/ajax_list')?>",
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

    
    $(document).ready(function(){




            $("#chosen_select").change(function (){
                var url = "<?php echo site_url('subkegiatans/add_ajax_program');?>/"+$(this).val();
                $('#program').load(url);
                return false;
            })
			
			$("#program").change(function (){
                var url = "<?php echo site_url('subkegiatans/add_ajax_kegiatans');?>/"+$(this).val();
                $('#kegiatans').load(url);
                return false;
            })
			
			$("#kecamatan").change(function (){
                var url = "<?php echo site_url('subkegiatans/add_ajax_des');?>/"+$(this).val();
                $('#desa').load(url);
                return false;
            })
        });
    
    
    function add_subkegiatans()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Kegiatan'); // Set Title to Bootstrap modal title
     $('#chosen_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
    // $('#program').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
    $('#chosen_select1').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
    $('#chosen_select2').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
     $('#chosen_select_program').chosen({allow_single_deselect:true, width:"400px", search_contains: true});
       $('#chosen_select_kegiatan').chosen({allow_single_deselect:true, width:"400px", search_contains: true});
    //    $('#program').chosen({allow_single_deselect:true, width:"400px", search_contains: true});
       
            $('#chosen_select3').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
             $('#chosen_select4').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
               $('#chosen_select5').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
    }

    function edit_subkegiatans(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('subkegiatans/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#no_lampiran').html(data.no_lampiran);
            $('[name="id"]').val(data.id);
            $('[name="pelimpahan"]').val(data.pelimpahan);
            $('[name="pegawai_id"]').val(data.pegawai_id);
            $('[name="perintah_pegawai_id"]').val(data.perintah_pegawai_id);
            $('[name="kegiatans_id"]').val(data.kegiatans_id);
            $('[name="program_id"]').val(data.program_id);
            $('[name="satker_id"]').val(data.satker_id);
            $('[name="no_lampiran"]').val(data.no_lampiran);
            $('[name="namasubkegiatans"]').val(data.namasubkegiatans);
            $('[name="namaprogram"]').val(data.namaprogram);
            $('[name="namakegiatan"]').val(data.namakegiatan);
          
            $('[name="tipekegiatan"]').val(data.tipekegiatan);
      //      $('[name="nominalsubkegiatans"]').val(data.nominalsubkegiatans);
            $('[name="tgl_pergi"]').val(data.tgl_pergi);
            $('[name="tgl_pulang"]').val(data.tgl_pulang); 
            $('[name="hari"]').val(data.hari);  
            $('[name="kota_id"]').val(data.kota_id);
            $('[name="pulang_kota_id"]').val(data.pulang_kota_id);
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
    
     function detail_subkegiatans(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('subkegiatans/ajax_detail/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('#no_lampiran').html(data.no_lampiran);
            $('#pelimpahan').html(data.perintah);
            $('#tgl_pergi').html(data.tgl_pergi);
            $('#tgl_pulang').html(data.tgl_pulang);
            $('#hari').html(data.hari);
            $('#tipekegiatan').html(data.tipekegiatan);
            $('#satker').html(data.satker);
            $('#namaprogram').html(data.namaprogram);
            $('#namakegiatan').html(data.namakegiatan);
             $('#namasubkegiatan').html(data.namasubkegiatan);
            $('#tempat').html(data.tempat);

            $('#namapegawai').html(data.namapegawai);
            $('[name="id"]').val(data.id);
            $('[name="pelimpahan"]').val(data.pelimpahan);
            $('[name="pegawai_id"]').val(data.pegawai_id);
            $('[name="perintah_pegawai_id"]').val(data.perintah_pegawai_id);
            $('[name="kegiatans_id"]').val(data.kegiatans_id);
            $('[name="program_id"]').val(data.program_id);
            $('[name="satker_id"]').val(data.satker_id);
            $('[name="no_lampiran"]').val(data.no_lampiran);
            $('[name="namasubkegiatans"]').val(data.namasubkegiatan);
           
            $('[name="tipekegiatan"]').val(data.tipekegiatan);
      //      $('[name="nominalsubkegiatans"]').val(data.nominalsubkegiatans);
            $('[name="tgl_pergi"]').val(data.tgl_pergi);
            $('[name="tgl_pulang"]').val(data.tgl_pulang); 
            $('[name="hari"]').val(data.hari);  
            $('[name="kota_id"]').val(data.kota_id);
            $('[name="pulang_kota_id"]').val(data.pulang_kota_id);
            $('[name="tempat"]').val(data.tempat);
            $('#modal_form_detail').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Info Kegiatan'); // Set title to Bootstrap modal title
            
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
        url = "<?php echo site_url('subkegiatans/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('subkegiatans/ajax_update')?>";
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

    function delete_subkegiatans(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('subkegiatans/ajax_delete')?>/"+id,
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
  <div class="modal-dialog_big">
    <div class="modal-content_big">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Data Sub Kegiatan</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input type="hidden" value="" name="id"/> 
           <input type="hidden" value=0 name="laporan_id"/> 
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
           
             <label class="control-label col-md-3">Yang memberi perintah</label>
                                                          <div class="col-md-9">
                                                       <select name="pelimpahan" class="form-control" id="chosen_select4">
                                            <option>- Pelimpahan-</option>
                                          
                                            <option value="Kepala">Kakanwil</option>
                                            <option value="Plh.Kepala,">Plh Kepala</option>
                                            <option value="An,">An</option>
                                   
                                    </select>        
                                                          
                                                         <select name="perintah_pegawai_id" class="form-control" id="chosen_select3">
                                            <option>- Pilih Pejabat-</option>
                                            <?php foreach($showpegawai as $pegawai){
                                                    echo '<option value="'.$pegawai->id.'">'.$pegawai->nama.'</option>';
                                            } ?>
                                    </select>
                                                          </div>
                                                        </div>
           
            <div class="form-group">
                                                 <?php 
                                                              // digunakan jika semua id dibalikkan menjadi 0
                                                              if(empty($lastid)){
                                                             echo 'array 0 ';
                                                             $lastid=0;
                                                             echo "$lastid";
                                                                $a = $lastid;
                                                               $b = 1;
                                                                $c = $a+$b;
                                                                echo "<input value=$c name='subkegiatans_id'>";
                                                              
                                                              
                                                              
                                                            }
                                                              else {
                                                                  
                                                              foreach($lastid as $data){ 
                                                                 $a = $data->id;
                                                                 $b = 1;
                                                                 $c = $a+$b;
                                                                  echo "<input hidden=true value=$c name='subkegiatans_id'>";
                                                              }
                                                             
                                                              }
                                                              
                                                              ?>
                
                
                                                          <label class="control-label col-md-3">Nama Pegawai</label>
                                                          <div class="col-md-9">
                                                              
                                                            <!-- <input  value="<?php echo $data->id + 1 ?>" name="subkegiatans_id"/> -->
                                                              <input  hidden="true"value="kepala" name="status_karyawan"/>
                                                              <input  hidden="true"value="0" name="statusbiaya"/>

                                                         <select name="pegawai_id" class="form-control" id="chosen_select5">
                                            <option>- Pilih Pegawai -</option>
                                            <?php foreach($showpegawai as $pegawai){
                                                    echo '<option value="'.$pegawai->id.'">'.$pegawai->nama.'</option>';
                                            } ?>
                                    </select>
                                                          </div>
                                                        </div>
         
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
         <!--          <div class="form-group">
                                                          <label class="control-label col-md-3">Program</label>
                                                          <div class="col-md-9">
                                     <select name="program_id" class="form-control" id="chosen_select_program">
      <option>- Pilih Program -</option>
      <?php foreach($showprogram as $program){
        echo '<option value="'.$program->idprogram.'">'.$program->namaprogram.'</option>';
      } ?>
    </select>
                                                          </div>
                                                        </div>
           

                <div class="form-group">
                                                          <label class="control-label col-md-3">Kegiatan</label>
                                                          <div class="col-md-9">
                                     <select name="kegiatans_id" class="form-control" id="chosen_select_kegiatan">
      <option>- Pilih kegiatan -</option>
      <?php foreach($showkegiatans as $kegiatans){
        echo '<option value="'.$kegiatans->id.'">'.$kegiatans->namakegiatan.'</option>';
      } ?>
    </select>
                                                          </div>
                                                        </div> -->
     




                <div class="form-group">
                                                          <label class="control-label col-md-3">Program</label>
                                                          <div class="col-md-9">
                                       
                                                              
                                                             
		<select name="program_id" class="form-control" id="program">
			
		</select>
                                                              
                                                         
                                                          </div>
                                                        </div>
          
                <div class="form-group">
                                                          <label class="control-label col-md-3">Kegiatan</label>
                                                          <div class="col-md-9">
                                       
                                                                     
                                                             
			<select name="kegiatans_id" class="form-control" id="kegiatans">
			<option value=''>Select kegiatan</option>
		</select>
                                                           
                                                         
                                                          </div>
                                                        </div>
         
            
           <div class="form-group">
              <label class="control-label col-md-3" >No Surat</label>
              <div class="col-md-9">
                  <input name="no_lampiran" placeholder="Masukkan No kegiatan" class="form-control" rows="9">
                  </div>
           </div> 
           <div class="form-group">
              <label class="control-label col-md-3" >Tujuan Perjalanan Dinas</label>
              <div class="col-md-9">
                    <textarea name="namasubkegiatans" placeholder="Masukkan Nama kegiatan" class="form-control" rows="9"></textarea>
                
                  </div>
           </div> 
         
          
           <div class="form-group">
              <label class="control-label col-md-3">Tempat</label>
              <div class="col-md-9">
                    <textarea name="tempat" placeholder="Masukkan Nama kegiatan" class="form-control" rows="9"></textarea>
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
              <label class="control-label col-md-3" >Hari</label>
              <div class="col-md-9">
                  <input name="hari" placeholder="Total Hari" class="form-control" rows="9">
                  </div>
           </div> 
          
          <div class="form-group">
              <label class="control-label col-md-3">Tanggal Pulang</label>
              <div class="col-md-9">
                  
                  
 
             <div class="date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="dtp_input3" data-link-format="yyyy-mm-dd">
         <input class="form-control datepicker"  data-date-format="yyyy-mm-dd" type="text" name="tgl_pulang" style="width:150px" >
             </div></div></div>   
           
         
           <div class="form-group">
                                                          <label class="control-label col-md-3">Tempat Berangkat</label>
                                                          <div class="col-md-9">
                                     <select name="kota_id" class="form-control" id="chosen_select1">
			<option>- Pilih Provinsi -</option>
			<?php foreach($showkota as $satker){
				echo '<option value="'.$satker->id.'">'.$satker->namakota.'</option>';
			} ?>
		</select>
                                                          </div>
                                                        </div>
            <div class="form-group">
                                                          <label class="control-label col-md-3">Tempat Tujuan</label>
                                                          <div class="col-md-9">
                                     <select name="pulang_kota_id" class="form-control" id="chosen_select2">
			<option>- Pilih Provinsi -</option>
			<?php foreach($showkota as $satker){
				echo '<option value="'.$satker->id.'">'.$satker->namakota.'</option>';
			} ?>
		</select>
                                                          </div>
                                                        </div>
         
         <!--
                   <div class="form-group">
              <label class="control-label col-md-3">Nominal Kegiatan</label>
              <div class="col-md-9">
                  <input name="nominalsubkegiatans" placeholder="Masukkan No kegiatan" class="form-control" rows="9">
              </div>

            </div>
               </form> -->
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
            

  
          </div>
       
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->





<div class="modal fade" id="modal_form_detail" role="dialog">
  <div  class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Info Perjalanan Dinas </h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
 
 <div class="box">
                <div class="box-header">
                
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                 
                      <th>Deskripsi</th>
                      <th>Keterangan</th>
                     
                    </tr>
                    <tr>
              
                      <td>Tipe Perjalanan</td>
                      <td>
                         <p id="tipekegiatan"> </p> 
                      </td>
                    
                    </tr>
                    <tr>
         
                      <td> <p>Yang Memberi Perintah</p> </td>
                      <td>
                           <p id="pelimpahan"> </p>
            
                        </div>
                      </td>
                     
                    </tr>
                    <tr>
             
                      <td>  <p>Nama Pegawai</p></td>
                      <td>
                    
            <p id="namapegawai"></p>
           
                      </td>
                    
                    </tr>
                    <tr>
  
                      <td><p>Satuan Kerja</p></td>
                      <td>
                         <p id="satker"></p>
            
                      </td>
                     
                    </tr>
                     <tr>
             
                      <td> <p>Program</p></td>
                      <td>
                        <p id="namaprogram"></p>
           
                      </td>
                      
                    </tr>
                     <tr>
          
                      <td><p>Kegiatan</p></td>
                      <td>
                         <p id="namakegiatan"></p>
           
                      </td>
                      
                    </tr>
                     <tr>
            
                      <td> <p>No.Surat</p>
     
      
     </td>
                      <td>
                        <p id="no_lampiran"></p>
           
                      </td>
                      
                    </tr>
                     <tr>
           
                      <td> <p>Tujuan Perjalanan Dinas</p></td>
                      <td>
                         <p id="namasubkegiatan"></p>
           
                      </td>
                      
                    </tr>
                     <tr>

                      <td><p>Tempat</p></td>
                      <td>
                         <p id="tempat"></p>
           
                      </td>
                      
                    </tr>
                  
                        <tr>
              
                      <td>
      <p>Tanggal Pergi</p>
     
     </td>
                      <td>
                       <p id="tgl_pergi"></p> 
           
                      </td>
                     
                    </tr>
                        <tr>
                  
                      <td> <p>Tanggal Pulang</p></td>
                      <td>
                        <p id="tgl_pulang"></p> 
        
           
                      </td>
                   
                    </tr>
                        <tr>
              
                      <td> <p>Total Hari</p> </td>
                      <td>
                        <p id="hari"> </p>
                      </td>
                      
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
     <!--      <div class="row">
    <div class="col-sm-4">

   
      <p>Tipe Perjalanan</p>
      <p>Yang Memberi Perintah</p>
      <p>Nama Pegawai</p>
      <p>Satuan Kerja</p>
      <p>Program</p>
      <p>Kegiatan</p>
      <p>No Surat</p>
      <p>Tujuan Perjalanan Dinas</p>
      <p>Tempat</p>
      <p>Tanggal Pergi</p>
      <p>Tanggal Pulang</p>
      <p>Total Hari</p>
    </div>
    <div class="col-sm-8">
      
     
     
   



            <p id="tipekegiatan"> </p> 
            <p id="pelimpahan"> </p>
            <p id="namapegawai"></p>
            <p id="satker"></p>
            <p id="namaprogram"></p>
            <p id="namakegiatan"></p>
            <p id="no_lampiran"></p>
            <p id="namasubkegiatan"></p>
            <p id="tempat"></p>
            <p id="tgl_pergi"></p> 
            <p id="tgl_pulang"></p> 
        
            <p id="hari"> </p>
             </div>
-->

  
            
            
       </form>
          
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  </div>





    </div><!-- /.modal -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
<style type="text/css">
    .modal-dialog_big {
  width: 100%;
  height: 100%;
  padding: 0;
}

.modal-content_big {
  height: 100%;
  border-radius: 0;
}
    </style>
   








    
   






