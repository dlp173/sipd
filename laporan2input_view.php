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
                  <h3 class="box-title">        Laporan Kegiatan  | <b> Sakter :  <?php echo $data->satker;?> </p> </b></div><!-- /.box-header -->
                
                 
                    <div class="box-body">
    
  

                  
                
                   



 <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
   <tbody>
                  <tr> 
                      
                    
                      Program : <?php echo $data->namaprogram;?> <br>
                      Maksud Perjalanan Dinas : <?php echo $data->namasubkegiatans;?> <br>
                      Tempat : <?php echo $data->tempat;?> <br>
                      Kota Berangkat : <?php echo $data->kotaberangkat;?> <Br>
                      Kota Tujuan : <?php echo $data->kotatujuan;?> <br>
                      Tanggal Berangkat : <?php echo tgl_indo($data->tgl_pergi);?> <br>
                      Tanggal Pulang  : <?php echo tgl_indo($data->tgl_pulang);?> <br>
                      Lama Perjalanan : <?php echo $data->hari;?> Hari
                  </tr>
                
                 
                 
           
                  
    </table>
 
     
    
     </div>
  
  
                                                         
                                                              
                                                          

                

  


 
   <div class="modal-body form">
       <form action="#" id="form" class="form-horizontal">   <div class="panel panel-default"> 
        <div class="panel-heading">
         Pejabat yang berwenang : 
                                                         <select name="pegawai_id" class="form-control" id="chosen_select3">
                                            <option>- Pilih Pegawai -</option>
                                            <?php foreach($showpegawai as $pegawai){
                                                    echo '<option value="'.$pegawai->id.'">'.$pegawai->nama.'</option>';
                                            } ?>
                                    </select>   
         </div></div>   
                    <input type="hidden" value="<?php echo $data->id ?>" name="id"/>
                   <input type="hidden" name="subkegiatans_id" value="<?php echo $data->id ?>"> 
        <input hidden="true" name="laporan_id" value="1">
                  
                    <?php echo $data->id ?>
      <div class="box">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Umum<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                    
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
         
                    <textarea class="textarea" name="umum" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          
                </div>
              </div>
                <div class="box-header">
                  <h3 class="box-title">Maksud<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
   
                    <textarea class="textarea" name="maksud" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" > <?php echo $data->namasubkegiatans;?></textarea>
        
                </div>
              </div>
        <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Ruang Lingkup<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
     
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
      
                    <textarea class="textarea" name="ruanglingkup" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          
                </div>
              </div>
      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Dasar<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
             
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
            
                    <textarea class="textarea" name="dasar" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">Berdasarkan no surat perjalanan dinas  <?php echo $data->no_lampiran;?></textarea>
      
                </div>
              </div>  
   <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hasil Yang dicapai <small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
       
                    <textarea class="textarea" name="hasilyangdicapai" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
         
                </div>
              </div>
      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Kesimpulan dan Saran<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                   
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                <div class="box-body pad">
            
                    <textarea class="textarea" name="kesimpulan" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          
                </div>
      </div>
      <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Penutupan<small></small></h3>
                  <!-- tools box -->
                  <div class="pull-right box-tools">
                    <button class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
          
                  </div><!-- /. tools -->
                </div><!-- /.box-header -->
                        <div class="box-body pad">

                            <textarea class="textarea" name="penutup" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                        </div>
                
      </div>
                           </form> 
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-right" style="margin-right: 5px;"> <i class="fa fa-save"></i> Simpan</button>
      
  </div>

   
<link rel="stylesheet" href="<?php echo base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')?>"></script>
<style>


h1 {
    font-size: 2.5em;
}

h2 {
    font-size: 1.875em;
}

ptest {
    font-size: 0.875em;
}
p {
    font-size: 10em;
}
</style>

  <script type="text/javascript">

    $(document).ready(function(){




             $('#chosen_select3').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
               
        });

  function save()
    {
         var url;
      save_method = 'add';
      if(save_method == 'add') 
      {
        url = "<?php echo site_url('laporan/ajax_add')?>";
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
             //  $('#modal_form').modal('hide');
              // reload_table();
              alert('Data berhasil dimasukkan');
              window.location = '<?php echo base_url('index.php/laporan');?>';


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
    

  </script>
 
  <!-- Bootstrap modal -->

      
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
    
   



    
  
      
       