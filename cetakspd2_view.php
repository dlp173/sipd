

<div class="content-wrapper">
<!-- Main content -->
    <div class="box-header">
                    </div><!-- /.box-header -->
                   
        <section class="invoice">
        
        
  
        <?php 
       
        foreach($sql as $data)
        
        {  
            
        }
        ?>
           
            
     <table class="table table-bordered">
                 

                      <tbody>
                  <tr> 
             
                        <td> </td>
                        <td>I. Berangkat dari :
                             <?php echo $data->kota;?> <br>
                            Ke : <?php echo $data->namakota;?>  <br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pergi);?> <br>
                 <?php

                    foreach ($printperintah as $pejabat) {
                    }
                                    ?>
 <?php if ($pejabat->pelimpahan != 'Kepala'){
        
         echo $pejabat->pelimpahan;
         echo "<br>";
         echo $pejabat->jabatan;
    } else if ($pejabat->pelimpahan === 'Kepala'){
        echo $pejabat->pelimpahan;
       
    }
    ?>
<br>
<br>
     <br>  <?php echo "$pejabat->pejabat"; 

?> <br>   NIP.  <?php echo "$pejabat->nippejabat";

?> 

     
                            
        
                            
                            
                        </td>
                  </tr>
                  <tr>
                
                      <td>  II. 
                            Tiba di  : <?php echo $data->namakota;?> <br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pergi);?> <br>
                            Kepala<br><br><br><br>
                            
                            
                          
                            
                          
                          
                          
                      </td>
                      <td>  Berangkat dari :  
                          <?php echo $data->namakota;?> <br>
                            Ke : <?php echo $data->kota;?> <br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pulang);?> <br>
                            Kepala <br><br><br><br>
                           
                            
                            
                                  
                            </td>
                  </tr>
                   <tr>
                
                      <td> III. Tiba di  : <br>
                            Pada Tanggal :  <br>
                            Kepala<br><br><br><br>
                            
                            
                      <br>       
                          
                          
                        
                          
                      </td>
                      <td>   Berangkat dari : <br>
       
                            Ke : <br>
                            Pada Tanggal :<br>
                            Kepala <br><br><br><br>
                 
                            
                            
                                         
                      </td>
                  </tr>
                   <tr>
                      <td>  IV. Tiba di  : <br>
                            Pada Tanggal : <br> 
                            Kepala<br><br><br><br>
                            
                            
                         
                      </td><td> Tiba di  : <br>
                            Pada Tanggal : <br> 
                            Kepala<br><br><br><br>  </td>
                  </tr>
                
<tr>
                      <td>V.Tiba di  :<br>
                            Pada Tanggal :  <br>
                            Kepala<br>
                            
                                                 
                          
                      
                      </td>
                      <td>
                          Berangkat dari :<br>
         
                            Ke :<br>
                            Pada Tanggal : <br>
                             Kepala<br><br><br><br>
                           
                            
                            </td>
                  </tr>
                 
  
 <tr>
     <td>VI.Tiba di  : <?php echo $data->kota;?><br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pulang);?> <br>
                            Pejabat Pembuat Komitmen, <br><br><br><br><br><br><br><br>
                            
                            
                            <?php echo $data->namappk?><br>
                            Nip.   <?php echo $data->nip?>            
                             
                          
                      </td>
                      <td>Telah diperiksa dengan keterangan bahwa<br>
                         Perjalanan tersebut atas perintahnya dan <br>
                         semata-mata untuk kepentingan jabatan dalam <br>
                         waktu yang sesingkat-singkatnya <br>
                         
                           Pejabat Pembuat Komitmen, <br><br><br><br>  <br><br>
                            
                            
                            <?php echo $data->namappk?><br>
                            Nip.   <?php echo $data->nip?>            
                             
                          
                      </td>
 
 
 
 
 </tr>
 <tr>
                      <td>VII.Catatan Lain<br>
                            
                            
                                                 
                          
                      
                      </td>
                      <td>
                         
                            
                            </td>
                  </tr>
       
                  </tbody></table>
  
      
     
        <br>
        VIII. PERHATIAN </p>
        PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba,serta bendahara pengeluaran bertanggung jawab berdasarkan 
        perarturan-peraturan keuangan negara apabila negara menderita rugi akibat kesalahan,kelalaian, dan kealpaannya <br> <br> <br>
    <a href="<?php echo base_url('index.php/printsurat/cetakspd3/'.$data->id)?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print SPD Halaman 2</a>
     
    </section><!-- /.content -->      <div class="clearfix"></div> 
</div>
 
    

          
          
 <link href="<?php echo base_url('assets/bootstrap/css/stpdf.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
