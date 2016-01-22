 <?php

       $i=1;
foreach ($sqlsurattugas as $data) 
    
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
                  <h3 class="box-title">        Detail Informasi Kegiatan  | <b> Sakter :  <?php echo $data->satker;?> </p> </b></div><!-- /.box-header -->
                   
                 
                    <div class="box-body">
    
  

                  
                
                   



 <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
   <tbody>
                  <tr> 
                    
                      <td><b>Program </b></td>
                        <td><?php echo $data->namaprogram;?></td>
                  </tr>
                  <tr> 
                    
                   <td>Maksud Perjalanan Dinas   </b></td>
                        <td><?php echo $data->namasubkegiatans;?></td>
                  </tr>
                   <tr> 
                    
                   <td>Tempat   </b></td>
                        <td><?php echo $data->tempat;?></td>
                  </tr>
                  <tr> 
                    
                   <td>Kota Berangkat   </b></td>
                        <td><?php echo $data->kotaberangkat;?></td>
                  </tr>
                  <tr> 
                    
                   <td> Kota Tujuan   </b></td>
                        <td><?php echo $data->kotatujuan;?></td>
                  </tr>
                   <tr> 
                    
                   <td> Tanggal Berangkat   </b></td>
                        <td><?php echo tgl_indo($data->tgl_pergi);?></td>
                  </tr>
                   <tr> 
                    
                   <td> Tanggal Pulang   </b></td>
                   <td><?php echo tgl_indo($data->tgl_pulang);?></td>
                  </tr>
                   <tr> 
                    
                   <td> Lama Perjalanan   </b></td>
                   <td><?php echo $data->hari;?> Hari</td>
                  </tr>
                  
    </table>
 
  
     </div>
  

<div class="panel panel-default">
  <div class="panel-heading">

   <?php

 
            $i=1;
foreach ($sqlsurattugas as $data) 
    
{
 }

?>
      <?php 

if ($data->statusbiaya == 0){
    echo "";
}else if ($data->statusbiaya != 0 && $data->no_sptjb == "") {
    echo " <a  href = '../../Rencanabiaya/printbiayanormatif/$data->id' target='_blank' class='btn btn-primary'> <i class='glyphicon glyphicon-print'></i> Print Normatif</a>
 
          <a href = '../../printsurat/printkwitansi/$data->id' target='_blank' class='btn btn-primary'> <iclass='glyphicon glyphicon-print'></i> Print Kuitansi</a>
          
          
           <button class='btn btn-primary' onclick='add_nospd($data->id)'><i class='glyphicon glyphicon-plus'></i>Input No. SPTJB</button>";
    
    
   
}

else if ($data->no_sptjb != "" && $data->statusbiaya != 0) {
    echo " 
              <a  href = '../../Rencanabiaya/printbiayanormatif/$data->id' target='_blank' class='btn btn-primary'> <i class='glyphicon glyphicon-print'></i> Print Normatif</a>
 
          <a href = '../../printsurat/printkwitansi/$data->id' target='_blank' class='btn btn-primary'> <i class='glyphicon glyphicon-print'></i> Print Kuitansi</a>
          
          <a href = '../../printsurat/printsptjb/$data->id' target='_blank' class='btn btn-primary'> <i class='glyphicon glyphicon-print'></i> Print SPTJB</a> 
           <button class='btn btn-primary' onclick='add_nospd($data->id)'><i class='glyphicon glyphicon-edit'></i>Edit No. SPTJB</button>";
    
    
   
}

?>


 </div>
  <div class="panel-body">
   <div class="row">
  <div class="col-md-12">
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No </th>
          <th>Nama </th>
          <th>Status Pembayaran </th>
          <th style="width:125px;">Action</th>
       
      </thead> 


<?php

 
            $i=1;
foreach ($sqlsurattugas as $data) 
    
{
?> 
<tr> 
    
<td> <?php echo $i++ ?></td>


<td><?php echo $data->nama;?></td>
<!--
<td>id kegiatan <?php echo $data->id;?>
 
  <a href="<?php echo base_url('index.php/Rencanabiaya/printbiayanormatif/'.$data->id)?>" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print Normative</a>
  <a href="<?php echo base_url('index.php/printsurat/printkwitansi/'.$data->id)?>" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print Kwitansi</a>
-->
<?php 

if ($data->statusbiaya == 0){
     
echo "<td> <a class='btn btn-warning btn-xs'> Belum diproses </a> </td><td> <a href = '../../Rencanabiaya/detailsbiayakegiatans/$data->idkegiatan/$data->idpegawai/$data->idsurat'  class='btn btn-warning' > <i class='fa fa-bank'></i> Input Rincian Biaya</a> </td>";
       
}
else {
    
echo "<td> <a class='label label-success'> Sudah diproses</a> </td><td> "
     . "<a href = '../../Rencanabiaya/printrincianbiaya/$data->idkegiatan/$data->idpegawai'   class='btn btn-primary'> <i class='glyphicon glyphicon-print'></i> Cetak Rincian Biaya </a></td>";
   
    //<a href = '../../Rencanabiaya/ajax_edit_normatif/$data->id/$data->idpegawai' class='btn btn-success'> <i class='fa fa-edit'></i></i>Edit Biaya</a>
}
?> 

    
<!--<a href="<?php echo base_url('index.php/Rencanabiaya/detailsbiayakegiatans/' .$data->idkegiatan ."/".$data->idpegawai)."/".$data->idsurat;?>" class="btn btn-warning"> <i class="glyphicon glyphicon-print"></i> Print Rincian Biaya</a>
-->

 

<?php }

?> Total Peserta : <?php echo $i++ - 1 ?> | No. SPTJB :  <?php 
if ($data->no_sptjb == ''){
    echo "
Belum di Input";
}
else{

}
echo $data->no_sptjb;

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

     function simpan()
    {
      
      var url;
      if(save_method == 'update') 
      {
         url = "<?php echo site_url('cetaksurattugas/ajax_update_sptjb')?>";
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
 
        
        <!--Input No. SPTJB -->
      <!-- Bootstrap modal Input no SPD -->


 <div class="modal fade" id="modal_form1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title1">Masukkan No. SPTJB</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form1" class="form-horizontal">
          
          <div class="form-body">

                                                        <div class="form-group">
                                                          
                                                            
                                                        
                                                          <div class="col-md-9">
                                                              <input type="hidden"  value="<?php echo $data->id;?>" name="subkegiatans_id" placeholder="satuan kerja" class="form-control" type="text">
                                                              <input  value="<?php echo $data->no_sptjb?>" name="no_sptjb" placeholder="Masukkan No SPTJB" class="form-control" type="text">
			
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
  
    
   



    
  
      
       