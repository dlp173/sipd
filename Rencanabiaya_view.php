 <?php

       $i=1;
foreach ($sql as $data) 
    
{
  ?>
        

<?php }?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title"> <div class="panel-heading">Detail Informasi Kegiatan  | <b> Sakter :  <?php echo $data->satker;?> </p> </b></div><!-- /.box-header -->
                   
                 
                    <div class="box-body">

  
 <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
   <tbody>
                  <tr> 
                    
                      <td><b>Program </b></td>
                        <td><?php echo $data->namaprogram;?></td>
                  </tr>
                  <tr>
                       <td> Maksud Perjalanan Dinas </td>
                        <td><?php echo $data->namasubkegiatans;?></td>
                  </tr>
                   <tr>
                       <td> Tempat </td>
                        <td><?php echo $data->tempat;?></td>
                  </tr>
                  <tr>
                       <td> Tempat Berangkat </td>
                        <td><?php echo $data->kota;?></td>
                  </tr>
                   <tr>
                        <td> Tempat Tujuan </td>
                        <td><?php echo $data->kota;?></td>
                  </tr>
                  <tr>
                        <td> Tanggal Pergi </td>
                        <td><?php echo tgl_indo($data->tgl_pergi);?></td>
                  </tr>
                  <tr>
                        <td> Tanggal Pulang </td>
                        <td><?php echo tgl_indo($data->tgl_pulang);?></td>
                  </tr>
                  <tr>
                        <td> Lama Perjalanan </td>
                        <td><?php echo tgl_indo($data->tgl_pulang);?></td>
                  </tr>
    </table>
 
     
    
     </div>
 




                <div class="panel panel-default">
                  <div class="panel-heading"><button class="btn btn-success" onclick="add_cetaksurattugas()"><i class="glyphicon glyphicon-plus"></i>Tambah Peserta</button>

                    <a href="<?php echo base_url('index.php/printsurat/pdf/' .$data->id)?>" class="btn btn-success"> <i class="glyphicon glyphicon-print"></i> Surat Tugas</a>

                    <div class="btn-group">
                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   <i class="glyphicon glyphicon-print"></i> Print SPD <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url('index.php/printsurat/cetakspd/' .$data->id);?>"> SPD Halaman 1</a></li>

                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo base_url('index.php/printsurat/cetakspd2/' .$data->id);?>"> SPD Halaman 2</a></li>
                  </ul>
                </div>

                    Cari Peserta <input accept=""> </div>
                  <div class="panel-body">
                   <div class="row">
                  <div class="col-md-12">
                    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>No </th>
                          <th>Nama </th>
                          <th>Nip </th>
                          <th>Golongan</th>
                          <th>Jabatan</th>
                          <th style="width:125px;">Action</th>

                      </thead> 

    

<?php

 
            $i=1;
foreach ($get_datatables as $data) 
    
{
?> 
<tr> 
<td> <?php echo $i++ ?></td>


<td><?php echo $data->nama;?></td>
<td><?php echo $data->nip;?>   </td> 
<td><?php echo $data->golongan;?> | <?php echo $data->gol_ruang;?>  </td> 
<td><?php echo $data->jabatan;?>   </td>
<td>    <a href="<?php echo base_url('index.php/cetaksurattugas/ajax_delete_peserta/' .$data->id);?>" class="btn btn-warning"> <i class="glyphicon glyphicon-print"></i> Rincian Biaya</a>


</td>
</tr>
 

<?php }

?> Total Peserta : <?php echo $i++ - 1 ?>
    </table>
    
  </div>

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
<script src="<?php echo base_url('assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js')?>"></script>


  <script type="text/javascript">

   

    function add_cetaksurattugas()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
      $('.modal-title').text('Tambah Peserta Kegiatan '); // Set Title to Bootstrap modal title
       $('#chosen_multi_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
    }
    
    function edit_cetaksurattugas(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ceetaksurattugas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="pegawai_id"]').val(data.pegawai_id);
            $('[name="subkegiatans_id"]').val(data.subkegiatans_id);
            $('[name="status_karyawan"]').val(data.status_karyawn);
            
            
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
        url = "<?php echo site_url('cetaksurattugas/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('cetaksurattugas/ajax_update')?>";
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

    function delete_cetaksurattugas(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('cetaksurattugas/ajax_delete')?>/"+id,
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
        <h3 class="modal-title">Tambah Peserta Kegiatan</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          
          <div class="form-body">
            
                                                        <div class="form-group">
                                                            <input type="hidden" value="<?php echo $data->id;?>" name="subkegiatans_id"/> 
                                                          <label class="control-label col-md-3">Peserta Kegiatan</label>
                                                          <div class="col-md-9">
                                        <select name="pegawai_id" class="form-control" id="chosen_select">
			<option>- Pilih Pegawai -</option>
			<?php foreach($showpegawai as $satker){
				echo '<option value="'.$satker->id.'">'.$satker->nama.'</option>';
			} ?>
		</select>
      <div class="col-md-9">
                <select name="status_karyawan" class="form-control">
                  <option value="Pengikut">Pengikut</option>
                  <option value="Kepala">Dalam Kota</option>
                  
                </select>
              </div>
                                                          </div>
                                                        </div>
              
              
         
              
              <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
            
          </div>
        </form>
</div>
      

   
  
       </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
     
        
  
      
       