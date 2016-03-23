                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>-</title>
    <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/bootstrap/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/AdminLTE.css')?>" rel="stylesheet">
    
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/skins/_all-skins.min.css')?>">

    <!-- Tambahan -->
      <link href="<?php echo base_url('assets/date_picker_bootstrap/bootstrap-datetimepicker.min.css')?>" rel="stylesheet">
      <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
      <script src="<?php echo base_url('assets/jquery/jquery-1.8.2.min.js')?>"></script>
      <script src="<?php echo base_url('assets/jquery/jquery.autocomplete.js')?>"></script>
        <link href="<?php echo base_url('assets/jquery/jquery.autocomplete.css')?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body onload="window.print();">
<div class="wrapper">
<!-- Main content -->
    
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
                        <td><small>I. Berangkat dari : <?php echo $data->kota;?> <br>
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
    <br>  <br><?php echo "$pejabat->pejabat"; 

?> <br>   NIP.  <?php echo "$pejabat->nippejabat";

?> 
        
                            
                            
                            </small>
                            
                        </td>
                  </tr>
                  <tr>
                
                      <td> <small> II. 
                            Tiba di  : <?php echo $data->namakota;?> <br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pergi);?> <br>
                            Kepala<br><br><br>
                            
                            
                          
                            
                          
                          </small>
                          
                      </td>
                      <td> <small> Berangkat dari : 
                             <?php echo $data->namakota;?> <br>
                            Ke : <?php echo $data->kota;?> <br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pergi);?> <br>
                            Kepala <br><br><br>
                           
                            
                            </small>
                                  
                            </td>
                  </tr>
                   <tr>
                
                      <td> <small>III. Tiba di  : <br>
                            Pada Tanggal :  <br>
                            Kepala<br><br><br>
                            
                            
                      <br>       
                          
                          
                        
                          </small>
                      </td>
                      <td> <small>  Berangkat dari : <br>
       
                            Ke : <br>
                            Pada Tanggal :<br>
                            Kepala <br><br><br>
                 
                            
                            
                           </small>              
                      </td>
                  </tr>
                   <tr>
                      <td> <small> IV. Tiba di  : <br>
                            Pada Tanggal : <br> 
                            Kepala<br><br><br>
                            
                            </small>
                         
                      </td><td> <small>Tiba di  : <br>
                            Pada Tanggal : <br> 
                            Kepala<br><br><br> </small> </td>
                  </tr>
                
<tr>
                      <td><small>V.Tiba di  :<br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pulang);?><br>
                            Kepala</small><br>
                            
                                                 
                          
                      
                      </td>
                      <td>
                        <small>  Berangkat dari :<br>
         
                            Ke :<br>
                            Pada Tanggal : <br>
                             Kepala<br><br><br>
                           
                          </small>  
                            </td>
                  </tr>
                 
  
 <tr>
     <td><small>VI.Tiba di  : <?php echo $data->kota;?><br>
                            Pada Tanggal : <?php echo tgl_indo($data->tgl_pulang);?> <br>
                            Pejabat Pembuat Komitmen, <br><br><br><br><br><br><br><br>
                            
                            
                            
                            <?php echo $data->namappk?><br>
                            Nip.   <?php echo $data->nip?>            
                             
                          </small>
                      </td>
                      <td><small>Telah diperiksa dengan keterangan bahwa
                         Perjalanan tersebut <br> atas  perintahnya dan 
                         sematamata  untuk kepentingan  jabatan <br> dalam 
                         waktu yang sesingkat-singkatnya. <br>
                         Pejabat Pembuat Komitmen, <br><br><br><br><br><br><br>
                            
                            
                            <?php echo $data->namappk?><br>
                            Nip.   <?php echo $data->nip?>            
                             
                        </small>  
                      </td>
 
 
 
 
 </tr> <tr>
                      <td>VII.Catatan Lain<br>
                            
                            
                                                 
                          
                      
                      </td>
                      <td>
                         
                            
                            </td>
                  </tr>
       
                  </tbody></table>
  
      

            <small>    VII. PERHATIAN <br>
        PPK yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab berdasarkan 
        perarturan-peraturan keuangan negara apabila negara menderita rugi akibat kesalahan,kelalaian, dan kealpaannya
  </small>
    </section><!-- /.content -->       
</div>
 
    
<div class="clearfix"></div>
          
 </body></html>
    
    
  <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url('assets/admin/plugins/jQuery/jQuery-2.1.4.min.js')?>"></script>
    <!-- Bootstrap 3.3.5 -->
     <script src="<?php echo base_url('assets/admin/bootstrap/js/bootstrap.min.js')?>"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/admin/plugins/fastclick/fastclick.min.js')?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('assets/admin/dist/js/app.min.js')?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('assets/admin/dist/js/demo.js')?>"></script>
     
                 <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
                 <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
                 <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
                 <script src="<?php echo base_url('assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js')?>"></script>
<script src="<?php echo base_url('assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js')?>"></script>

<script src="<?php echo base_url('assets/a/chosen/gofrendi.chosen.ajaxify.js')?>"></script>

<script src="<?php echo base_url('assets/chosen/jquery.chained.js')?>"></script>
<link href="<?php echo base_url('assets/a/chosen/chosen.min.css')?>" rel="stylesheet">



                                                                