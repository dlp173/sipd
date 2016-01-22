 <?php

       $i=1;
foreach ($sql as $data) 
    
{
  ?>
        

<?php }?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title"> <div class="panel-heading">Detail Informasi Kegiatan  | <b> Sakter :  <?php echo $data->satker;?> </p> </b></div>        </div><!-- /.box-header -->
                   
                 
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
                       <td> Kota Berangkat </td>
                        <td><?php echo $data->kota;?></td>
                  </tr>
                   <tr>
                        <td> Kota Tujuan </td>
                        <td><?php echo $data->namakota;?></td>
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
                        <td><?php echo $data->hari;?></td>
                  </tr>
    </table>
 
     
    
     </div>
 




<div class="panel panel-default">
  <div class="panel-heading">
  <button class="btn btn-success" onclick="add_cetaksurattugas()"><i class="glyphicon glyphicon-plus"></i>Tambah Peserta</button>

  
      <div class="btn-group">
 
   <a href="<?php echo base_url('index.php/printsurat/viewpdf/'.$data->id)?>" class="btn btn-success"> <i class="glyphicon glyphicon-print"></i> Print Surat tugas</a>
 

   <!--  <ul class="dropdown-menu">
    
    <li>  <a href="<?php echo base_url('index.php/printsurat/viewpdf/'.$data->id)?>" > <i class="glyphicon glyphicon-print"></i> Print Surat tugas</a></li>
  <li>  <a href="<?php echo base_url('index.php/printsurat/pdf/' .$data->id)?>" > <i class="glyphicon glyphicon-print"></i>Download Surat Tugas</a></li>
    </ul> -->
    
</div>
   
    
     
     
      <?php 

if ($data->no_spd == ''){
    echo "

     <button class='btn btn-success' onclick='add_nospd($data->id)'><i class='glyphicon glyphicon-plus'></i>Input No SPD</button>
 




    ";
}else{ 
echo "  <div class='btn-group'>
  <button type='button' class='btn btn-success dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
   <i class='glyphicon glyphicon-print'></i> Print SPD <span class='caret'></span>
  </button>
  <ul class='dropdown-menu'>
   <li><a href='../../printsurat/viewcetakspd/$data->id'>Print SPD Hal. 1</a></li>
    
    <li role='separator' class='divider'></li>
       <li><a href='../../printsurat/cetakspd2/$data->id'>Print SPD Hal. 2</a></li>
  </ul>
   
</div>
    <button class='btn btn-success' onclick='add_nospd($data->id)'><i class='glyphicon glyphicon-edit'></i> Edit No SPD</button>
    </div>";  

}
  ?>
     
  
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
<td>    
   
  <button class="btn btn-danger pull-right" href="javascript:void()"  onclick="delete_cetaksurattugas(<?php echo $data->sid;?>)" style="margin-right: 5px;"><i class="glyphicon glyphicon-trash"></i> Delete</button>
                              
</td>
</tr>
 

<?php } ?> Total Peserta : <?php echo $i++ - 1 ?> | No. SPD :  
    
    <?php 
if ($data->no_spd == ''){
    echo "
Belum di Input";
}
else{

}
echo $data->no_spd;

    ?>
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
    
    
    function add_nospd(id)
    {
      save_method = 'update';
      $('#form1')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('cetaksurattugas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
           
           
            
           
            $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Masukkan No. SPD'); // Set title to Bootstrap modal title
            
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
             
              //window.location = '<?php echo base_url('cetaksurattugas/ajax_detail/' .$data->id);?>';
               window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
function simpan()
    {
      
      var url;
      if(save_method == 'update') 
      {
         url = "<?php echo site_url('cetaksurattugas/ajax_update')?>";
      }
      
      else
      {
        url = "<?php echo site_url('cetaksurattugas/ajax_add')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form1').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
              alert('Data Berhasil Di Hapus');
              window.location = '<?php echo base_url('cetaksurattugas/ajax_detail/' .$data->id);?>';
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                window.location.reload();
            }
        });
    }
    function delete_cetaksurattugas(sid)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('cetaksurattugas/ajax_delete')?>/"+sid,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               alert('Data Berhasil Di Hapus');
             //  window.location = '<?php echo base_url('cetaksurattugas/ajax_detail/' .$data->id);?>';
              window.location.reload();

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
        <h3 class="modal-title">Tambah Pengikut Peserta Kegiatan</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          
          <div class="form-body">

                                                        <div class="form-group">
                                                            <input type="hidden" value="<?php echo $data->id;?>" name="subkegiatans_id"/> 
                                                            <input type="hidden" value="pengikut" name="status_karyawan"/> 
                                                          <label class="control-label col-md-3">Peserta Kegiatan</label>
                                                          <div class="col-md-9">
                                        <select name="pegawai_id" class="form-control" id="chosen_select">
			<option>- Pilih Pegawai -</option>
			<?php foreach($showpegawai as $satker){
				echo '<option value="'.$satker->id.'">'.$satker->nama.'</option>';
			} ?>
		</select>
                                                          </div>
    
                                                          </div>
                                                        </div>
              
              
         
              
              <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
            </form>
          </div>
        
</div>
      
</div></div>
  

      
  <!-- Bootstrap modal Input no SPD -->


 <div class="modal fade" id="modal_form1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title1">Masukkan No.SPD</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form1" class="form-horizontal">
          
          <div class="form-body">

                                                        <div class="form-group">
                                                          
                                                            
                                                        
                                                          <div class="col-md-9">
                                                              <input type="hidden"  value=" <?php echo $data->id;?>" name="subkegiatans_id" placeholder="satuan kerja" class="form-control" type="text">
                                                                <input  value="<?php echo $data->no_spd;?>" name="no_spd" placeholder="No Surat Perjalanan Dinas" class="form-control" type="text">
			
                                                          </div>
    
                                                          </div>
                                                        </div>
              
              
         
              
              <div class="modal-footer">
            <button type="button" id="btnSave" onclick="simpan()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
            </form>
          </div>
        
</div>
      
</div></div>
  

      




  
       </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
     
       