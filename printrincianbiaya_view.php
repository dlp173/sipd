


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
<section class="content-header">
         
        </section>
        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <p class="text-center"> <b> RINCIAN BIAYA PERJALANAN DINAS  </b></p>
       
              </h2>
            </div><!-- /.col -->
                
           <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
 }
?>
          
             <div class="col-xs-12">
           
                    <i></i> <b>Lampiran SPD Nomor  : <?php echo $data->no_lampiran;?></b></p>
       
          
              
             <i></i> <b>Tanggal  : <?php echo tgl_indo($data->tgl_pergi);?> s.d <?php echo tgl_indo($data->tgl_pulang);?></b></p>
       
                         </div><!-- /.col -->
          </div>
          <!-- info row -->
      
            <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped" border="1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Rincian Biaya </th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                    
               
                  
                  </tr>
                </thead>
                <tbody>
                                        
 <?php     
 $i=1;
 foreach ($rincianprintnormative as $data) {
      
         
    
?>
                  <tr>
                    <td> 
                        
               </td>
                    <td>  
                        <?php
                        if ($data->biayatiketpergi != 0 && $data->biayatiketpulang != 0)
                        { 
                            
                            echo "   <dd>   Transport $data->kotaasal - $data->kotatujuan + Boarding "
                                    . "<dd>   Transport $data->kotatujuan - $data->kotaasal + Boarding </dd></dd>";
                            
                        }
?>
                  <?php
                        if ($data->totalbiayataksi != 0 || $data->totalbiayataksidepatiamir != 0)
                        { 
                            
                            echo "   <dd>   Transport Taksi</dd> "
                                 . "<dd>   Transport Rumah - Bandara Depati Amir (PP)</dd>"
                                   ;
                            
                        }
?>
                    
                        <dd>   Biaya Harian</dd>
                        
              <?php
                        if ($data->transportluarkotamasihbangka != 0)
                        { 
                            
                            echo "   <dd>   Transport </dd> " ;
                            
                        }
?>
                        <?php 
                 
                        if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap == 0){
                        //   if (!empty($data->biayainap) && !empty($data->biayatanpainap)){
                        
                     
                    }else if ($data->totalbiayainap != 0 && $data->totalbiayatanpainap == 0){
                         echo " <dd>Biaya Penginapan </dd>";
                    }else if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap != 0){
                        echo " <dd> Biaya Tanpa Penginapan </dd>";
                    }
                    
                    else {
                        echo " <dd>Biaya Penginapan  :  </dd> <dd> Biaya Tanpa penginapan : </dd>";
                        
                        
                    }
                    
                    ?>
                        
                           <?php 
                  
                    if ($data->biayarep != 0){
                    
                        echo " <dd>   Biaya Representative </dd>";                    
                    
                       
                    }                  else
                    {
                        
                        
                    }
                    
                    ?>
                       
                      
                    </td>
                    <td>
                        
                        <?php
                        if ($data->biayatiketpergi != 0 && $data->biayatiketpulang != 0)
                        { 
                            ?>
                            <dd>   <?php echo rupiah2($data->biayatiketpergi);?></dd>
                          <dd>   <?php echo rupiah2($data->biayatiketpulang);?></dd>
                            
                       <?php }
?>
                        
                          
                          <?php
                        if ($data->totalbiayataksi != 0 && $data->totalbiayataksidepatiamir != 0)
                        { 
                            ?>
                            <dd>   <?php echo rupiah2($data->totalbiayataksi );?></dd>
                             <dd>   <?php echo rupiah2($data->totalbiayataksidepatiamir );?></dd>
                                  
                       <?php }
?>
                            
                     
                        
                       
                        <dd>   <?php echo rupiah2($data->totalbiayaharian);?></dd>
                             <?php
                        if ($data->transportluarkotamasihbangka != 0)
                        { 
                            ?>
                            <dd>   <?php echo rupiah2($data->transportluarkotamasihbangka );?></dd>
                            
                                  
                       <?php }
?>
                         <?php 
                 
                        if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap == 0){
                        //   if (!empty($data->biayainap) && !empty($data->biayatanpainap)){
                        
                       
                    }else if ($data->totalbiayainap != 0 && $data->totalbiayatanpainap == 0){
                        ?>  
                        
                        
                        
                    <dd>     <?php echo rupiah2($data->totalbiayainap);?> </dd>  <?php }?>
                    
                    
                    <?php  if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap != 0){
                        ?>
                    
                       <dd>  <?php echo rupiah2($data->totalbiayatanpainap);?> </dd><?php }?>
                    <?php 
                    
                     if ($data->totalbiayainap != 0 && $data->totalbiayatanpainap != 0){
                         
                         ?>
                     
                        <dd>   <?php echo rupiah2($data->totalbiayainap);?> </dd> <dd>   <?php echo rupiah2($data->totalbiayatanpainap); ?></dd>
                     <?php }?>
                        
                        
                    
                        
                           <?php 
                  
                    if ($data->biayarep != 0){
                        
                    ?>    
                    
                        <?php echo rupiah2($data->biayarep);                    
                    
                       
                
                        
                    }
                    
                    ?>
                 
                    </td>
                    <td></td>
                  
                  
                    
                 
                  
           
                 
                  </tr>

                  
                 
                  <tr>
                
                      <td></td>
                      <td>  TOTAL BIAYA  : <br>
                          <br>
                          
                          Terbilang : 
                       
                       
                       
                       </td>
                       
                        <td> <?php echo  rupiah2($data->totalbiaya);?>
                            <br><br>
                            
                            <i> <?php echo ucwords(number_to_words($data->totalbiaya));?> </b></i>
                       
                        
                        </td>
                 
                 <td></td>
              
 <?php }?>
               
                  

                
                  
               
                  
                  
                  
                  </tr>
                </tbody>
              </table>
                 
            </div><!-- /.col -->
          </div><!-- /.row -->

          
        
        
          <div class="row invoice-info">
              <div class="col-md-4">Telah dibayar Sejumlah : <br>
             
                  <?php echo  rupiah2($data->totalbiaya);?>  <br>
              BENDAHARA PENGELUARAN
              <br>
              <br>
              <br>
              <br>
              <br>
              <b>   <?php echo $data->namabendahara;?> </b> <br>
              NIP. <?php echo $data->nipbendahara;?>
              </div>
           
                 <div class="col-md-4"></div>
            <div class="col-sm-4 invoice-col">
              <b>Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?> </b>
              <br>
              Telah menerima jumlah uang sebesar :<br>
              <?php echo  rupiah2($data->totalbiaya);?> <br>
              <br>
              <br>
              <br>
              <br>
              <b><?php echo $data->nama;?></b><br> 
              NIP. <?php echo $data->nip;?>
            </div><!-- /.col -->
          </div><!-- /.row -->
<div class="row invoice-info">
    <div class="col-xs-12"><h2 class="page-header"></h2>
                
                    <p class="text-center"> <b> PERHITUNGAN SPD RAMPUNG  </b></p><br> <br>
        <div class="col-sm-4 invoice-col">
            Ditetapkan Sejumlah : <br>
            Yang terlah dibayar semula Sejumlah :<br>
            Sisa kurang/lebih:  <br>
            </div><!-- /.col -->
              <div class="col-sm-4 invoice-col">
                  <b> <?php echo  rupiah2($data->totalbiaya);?> <br></b>
                 -<br>
                 <b> <?php echo  rupiah2($data->totalbiaya);?>  <br></b>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col"><br> <br><br> <br>
                PEJABAT PEMBUAT KOMITMEN  <br> <br><br> <br><br> <br>
                
                   <b><?php echo $data->namappk;?></b><br>
                   <b>NIP. <?php echo $data->nip;?></b>
                  
            </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->

    <!-- mengupdate surat id  -->
        <?php

       $i=1;
foreach ($suratid as $dataa) 
    
{
  ?>
        
  
            
  
        <!-- Main content -->
        <?php }?>

           <form action="#" id="form"> 
               <input hidden="true" name="id" value="<?php echo $dataa->id;?>">
           
     
                   <input hidden="true" name="biaya_kegiatan_id" value=" <?php echo $data->biaya_kegiatan_id;?> ">
          <input hidden="true" name="totalbiaya" value=" <?php echo  $data->totalbiaya;?> ">
             <input hidden="true" name="sisaanggaran" value=" <?php echo  $data->sisaanggaran;?> ">
               
               <input hidden="true" name="statusbiaya" value="0">
                 
           </form>
          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="<?php echo base_url('index.php/printsurat/prints/' .$data->id.'/'.$data->idpegawai)?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Rincian Biaya</a>
               
             <?php 
             // if ($data->totalbiayataksi != 0){
                  if ($data->totalbiayataksi != 0 || $data->transportluarkotamasihbangka !=0){ 
                     
              ?>    
                  <a href="<?php echo base_url('index.php/printsurat/printbiayarill/' .$data->id.'/'.$data->idpegawai)?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Biaya Rill </a>
         
              <?php }?> 
           
              <button class="btn btn-danger pull-right" href="javascript:void()"  onclick="delete_biaya(<?php echo $data->idbiaya;?>)" style="margin-right: 5px;"><i class="glyphicon glyphicon-trash"></i> Reset Rincian Biaya</button>
              
        <!-- <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_biaya(<?php echo $data->idbiaya;?>)"><i class="glyphicon glyphicon-trash"></i> Delete biaya</a>
		-->
          
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
   <script type="text/javascript">    
    function delete_biaya(idbiaya)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('rencanabiaya/ajax_delete')?>/"+idbiaya,
             type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
             //  $('#modal_form').modal('hide');
             //  reload_table();
             alert('Data berhasil dihapus');
             window.location = '<?php echo base_url('index.php/rencanabiaya/biayakegiatans/' .$data->id);?>';
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }
 

  </script>
