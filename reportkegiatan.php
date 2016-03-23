
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Appsppd </title>
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
</style>
        
<body> 

          <!-- title row -->
          <div class="row">
            
                <h3>
                    <p class="text-center"> <b> RINCIAN BIAYA PERJALANAN DINAS  </b></p>
       
              </h3>
            </div><!-- /.col -->
                
           <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
 }
?>
          
             <div class="col-xs-8">
           
                 Lampiran SPD Nomor  : <?php echo $data->no_lampiran;?> <br>
       
        
              
      Tanggal  : <?php echo tgl_indo($data->tgl_pergi);?> s.d <?php echo tgl_indo($data->tgl_pulang);?><br>
       
                         </div><!-- /.col -->
         
           <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
 }
?>
      
	
                         
                                                                
 <?php     
 $i=1;
 foreach ($rincianprintnormative as $data) {
      
         
 
?>
   




      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Rincian</th>
            <th>Jumlah</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
					<td>
						<?php echo $i++; ?>
					</td>
					<td>
					
                                         <?php
                        if ($data->biayatiketpergi != 0 && $data->biayatiketpulang != 0)
                        { 
                            
                            echo "   <dd>   Transport $data->kotaasal - $data->kotatujuan + Boarding "
                                    . "<dd>   Transport $data->kotatujuan - $data->kotaasal + Boarding </dd></dd>";
                            
                        }
?>
                  
                      
                        <dd>   Biaya Harian</dd>
                        
            
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
                          <dd>   <?php echo rupiah2($data->biayatiketpergi);?></dd>
                            
                       <?php }
?>
                        
                        
                       
                        <dd>   <?php echo rupiah2($data->totalbiayaharian);?></dd>
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
                    
                        <dd> <?php echo rupiah2($data->biayarep); }
                    
                    ?>   </dd>                 
                    
                       
                
                        
                   
           
                                        
                                        
                              <td></td>            
                                        
                                      <tr>
                
                      <td></td>
                      <td>  TOTAL BIAYA  :
                          <br>
                          
                          Terbilang : 
                       
                       
                       
                       </td>
                       
                        <td> <?php echo  rupiah2($data->totalbiaya);?>
                            <br>
                            
                            <i> <?php echo ucwords(number_to_words($data->totalbiaya));?> </b></i>
                       
                        
                        </td>
                 
                 <td></td> 

               
                  

                
                  
 <?php  }?>
                  
                  
                  
                  </tr>   
           
        
        </tbody>
      </table>
    
	
                         <div class="row">
        
               <div class="col-sm-6 invoice-col">Telah dibayar Sejumlah : <br>
              
                  Rp :  <br>
              BENDAHARA PENGELUARAN
              <br>
              <br>
              <br>
             
              lAILAUTL
              NIP. 1010101010
              </div>
                             
           <div class="col-sm-6 invoice-col">
              <b>Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?> </b>
              <br>
              Telah menerima jumlah uang sebesar :<br>
              Rp <br>
              <br>
              <br>
             
              <b><?php echo $data->nama;?></b><br>
              NIP. <?php echo $data->nip;?>
            </div><!-- /.col --></div>
          
<div >
    <div class="col-xs-12"><h2 class="page-header"></h2>
                
                    <p class="text-center"> <b> PERHITUNGAN SPD RAMPUNG  </b></p><br> <br>
        <div class="col-sm-4 invoice-col">
                  
            </div><!-- /.col -->
              <div class="col-sm-4 invoice-col">
                  Ditetapkan Sejumlah :  <br>
                  Yang terlah dibayar semula Sejumlah :<br>
                  Sisa kurang/lebih:    <br>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col"><br> <br>
                PEJABAT PEMBUAT KOMITMEN  <br> <br><br> <br>
                
                   <b><?php echo $data->nama;?></b><br>
                   <b>NIP. <?php echo $data->nip;?></b>
            </div><!-- /.col -->
            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              
            </div>
          </div>
  
	
</body>
</html>



