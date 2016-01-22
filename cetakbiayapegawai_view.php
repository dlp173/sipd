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
    <!-- Site wrapper -->
    <div class="wrapper">

      <!-- Content Wrapper. Contains page content -->
    
        <!-- Content Header (Page header) -->
        
<section class="content-header">
         
        </section>
        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
               
                    <h4 class="text-center"> <b> RINCIAN BIAYA PERJALANAN DINAS </b></h4>
       
                    <hr>
            </div><!-- /.col -->
                
           <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
 }
?>
          
             <div class="col-xs-12">
           
               Lampiran SPD Nomor  : <?php echo $data->no_spd;?><br>
       
         Tanggal  : <?php echo tgl_indo($data->tgl_pergi);?> s.d <?php echo tgl_indo($data->tgl_pulang);?>              
    
         <br> <br>
                         </div><!-- /.col -->
          </div>
          <!-- info row -->
      
            <div class="row">
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped" border="1">
                <thead>
                  <tr>
                 <!--     <td><b><p> No </p></b></td>
                   --> <td border-bottom ="1"><b><p> Rincian Biaya </p></b></td>
                    <td width="17%"><b><p> Jumlah </p></b></td>
                    <td width="17%"><b><p> Keterangan </p></b></td>
                    
               
                  
                  </tr>
                </thead>
                <tbody>
                                        
 <?php     
 $i=1;
 foreach ($rincianprintnormative as $data) {
      
         
    
?>
                  <tr>
                 <!--   <td> 
                        
               </td> -->
                    <td>  
                        <?php
                        if ($data->biayatiketpergi != 0 && $data->biayatiketpulang != 0)
                        { 
                            
                            echo "<small>     Transport $data->kotaasal - $data->kotatujuan + Boarding  </small> <br>"
                                    . "<small>    Transport $data->kotatujuan - $data->kotaasal + Boarding  </small> ";
                            
                        }
?>
                   <?php
                        if ($data->totalbiayataksi != 0 && $data->totalbiayataksidepatiamir != 0)
                        { 
                            ?>
                <dd> <small>  Transport Taksi <?php echo $data->kotatujuan;?> </small></dd>
                <dd> <small>  Transport Bandara Depati Amir (PP) </small></dd>
                                  
                       <?php }
?>
                            
                      
                        <small>   <dd>   Biaya Harian</dd>   </small>
                        
          <?php  if ($data->transportluarkotamasihbangka != 0)
                        { 
                            ?>
                        <dd>  <small>Transport </small></dd>
                            
                                  
                       <?php }
?>
                        <?php 
                 
                        if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap == 0){
                        //   if (!empty($data->biayainap) && !empty($data->biayatanpainap)){
                        
                     
                    }else if ($data->totalbiayainap != 0 && $data->totalbiayatanpainap == 0){
                         echo " <small> <dd>Biaya Penginapan </dd> </small>";
                    }else if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap != 0){
                        echo "<small> <dd> Biaya Tanpa Penginapan </dd> </small>";
                    }
                    
                    else {
                        echo "<small> <dd>Biaya Penginapan  :  </dd> <dd> Biaya Tanpa penginapan : </dd> </small>";
                        
                        
                    }
                    
                    ?>
                        
                           <?php 
                  
                    if ($data->biayarep != 0){
                    
                        echo " <small> <dd>   Biaya Representative </dd> </small>";                    
                    
                       
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
                          <small>  <dd>   <?php echo rupiah2($data->biayatiketpergi);?></dd></small>
                            <small> <dd>   <?php echo rupiah2($data->biayatiketpulang);?></dd></small>
                            
                       <?php }
?>
                        
                           <?php
                        if ($data->totalbiayataksi != 0 && $data->totalbiayataksidepatiamir != 0)
                        { 
                            ?>
                <dd> <small>   <?php echo rupiah2($data->totalbiayataksi );?> </small></dd>
                <dd> <small>  <?php echo rupiah2($data->totalbiayataksidepatiamir );?> </small></dd>
                                  
                       <?php }
?>
                       
                        <dd>  <small>  <?php echo rupiah2($data->totalbiayaharian);?> </small></dd>
                       
  <?php  if ($data->transportluarkotamasihbangka != 0)
                        { 
                            ?>
                        <dd>  <small><?php echo rupiah2($data->transportluarkotamasihbangka );?> </small></dd>
                            
                                  
                       <?php }
?>
                          <?php 
                 
                        if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap == 0){
                        //   if (!empty($data->biayainap) && !empty($data->biayatanpainap)){
                        
                       
                    }else if ($data->totalbiayainap != 0 && $data->totalbiayatanpainap == 0){
                        ?>  
                        
                        
                        
                    <dd>     <small>   <?php echo rupiah2($data->totalbiayainap);?> </dd>    </small> <?php }?>
                    
                    
                    <?php  if ($data->totalbiayainap == 0 && $data->totalbiayatanpainap != 0){
                        ?>
                    
                      <dd>     <small> <?php echo rupiah2($data->totalbiayatanpainap);?> </small> </dd><?php }?>  
                    <?php 
                    
                     if ($data->totalbiayainap != 0 && $data->totalbiayatanpainap != 0){
                         
                         ?>
                     
                        <dd>    <small>  <?php echo rupiah2($data->totalbiayainap);?> </dd> <dd>   <?php echo rupiah2($data->totalbiayatanpainap); ?>    </small></dd>
                     <?php }?>
                        
                        
                    
                        
                           <?php 
                  
                    if ($data->biayarep != 0){
                        
                    ?>    
                    
                        <small>   <?php echo rupiah2($data->biayarep); ?>    </small>                  
                    
                       
                
                        
                   <?php }
                    
                    ?>
                 
                    </td>
                    <td>
                        
                       
                 
                    </td></td>
                  
                  
                    
                 
                  
           
                 
                  </tr>

         
                 
                  <tr>
                
                     
                     <td><small>Total Biaya  : </small> <br>
                          <br>
                          
                          <small> Terbilang :  <i> <?php echo ucwords(number_to_words($data->totalbiaya));?> </i>
                       
                       
                        </td>
                     <td> <small><?php echo  rupiah2($data->totalbiaya);?></small>
                            <br><br>
                       </td>
                       
                        <td> 
                            
                         <!--   <i><small> <?php echo ucwords(number_to_words($data->totalbiaya));?></small> </b></i>
                       -->
                        
                        </td>
                 
               <!--  <td></td>
                   -->    
                 
                
              
 <?php }?>
               
                  

                
                  
               
                  
                  
                  
                  </tr>
                </tbody>
              </table>
                 
            </div><!-- /.col -->
          </div><!-- /.row -->

          
          
          <div class="row invoice-info">
              <div class="col-sm-3 invoice-col">
      
            <address>
              <small>    <strong>Telah dibayar Sejumlah : <br></strong>  </small>
               <small> Rp : <?php echo  rupiah2($data->totalbiaya);?><br>  </small>
              <small>  BENDAHARA PENGELUARAN<br><br><br><br>   </small>
               <small>  <b>   <?php echo $data->namabendahara;?> </b>  <br>  </small>
             <small>    NIP. <?php echo $data->nipbendahara;?>   </small>
             
            </address>
          </div>
        
            <div class="col-sm-12 pull-right">
     
            <address>
                <small><strong> Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?></strong><br></small>
               <small>  Telah menerima jumlah uang sebesar :<br>  </small>
            <small>     <?php echo  rupiah2($data->totalbiaya);?><br>   </small>
             <br>
              <br>
              <br>
             <small>   <b><?php echo $data->nama;?></b><br>  </small>
           <small>     NIP. <?php echo $data->nip;?>   </small>
            </address>
                 </div><!-- /.row --> 
        
        <!-- /.row -->
 
<div class="row invoice-info">
    <div class="col-xs-12"><hr>
                
             <small>       <p class="text-center"> <b> PERHITUNGAN SPD RAMPUNG  </b></p> </small>
        <div class="col-xs-4 ">
                 <small> Ditetapkan Sejumlah   <br> </small> 
                 <small> Yang telah dibayar semula Sejumlah  <br></small> 
                 <small>   Sisa kurang/lebih  <br></small> 
            </div><!-- /.col -->
              <div class="col-xs-4 ">
                  <small>: <?php echo  rupiah2($data->totalbiaya);?> <br> </small> 
                  <small>:  - <br></small> 
                  <small>:<?php echo  rupiah2($data->totalbiaya);?>   <br></small> 
            </div><!-- /.col -->
            <div class="col-xs-4"><br> <br><br>
                  <small>  PEJABAT PEMBUAT KOMITMEN  <br> <br><br> <br><br>    </small>
                
                     <small>  <b><?php echo $data->namappk;?></b><br>    </small>
                     <small>  <b>NIP. <?php echo $data->nipppk;?></b>    </small>
            </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="printsurat/prints/18/9" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          
              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Download PDF</button>
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
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



                                                                                                                             