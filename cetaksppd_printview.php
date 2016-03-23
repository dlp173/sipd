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
    <div class="box-header">
                    </div><!-- /.box-header -->
                   
        <section class="invoice">
        
        <h3 style="text-align:center" > SURAT PERJALANAN DINAS  (SPD)</h3>
      
       

<div class="col-xs-6">
    <p style="text-align:left"> <br>
        Kementerian Negara / Lembaga <br> Kanwil Kementerian Agama  Provinsi Kepulauan Bangka Belitung    
     </p>
            </div><!-- /.col -->
           
<div class="col-xs-6">
                                    <p style="text-align:left">
    <br>
        Lembar ke : I.II.III.IV.V.VI.VII <br> 
        Kode no :  
           <?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }?> <br>
        Nomor : Kw.29.<?php echo $data->kode_satker?>/<?php echo $data->idsubbag?>/Ku.01.2/
            <?php 
            
       if ($data->no_spd == ''){
    echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp             ";

            
       }else {
           
      echo  $data->no_spd;
           
       }
            ?>/2016 
 </p>
 </div>
    <table class="table table-bordered" border ="1em">

        <tbody >
                          
                          
                  <tr> 
                      <td><small>1</small></td>
                        <td><small>Pejabat Pembuat Komitmen</small></td>
                        <td><small><?php echo $data->kop_ppk;?></small></td>
                  </tr>
                  <tr>
                      <td><small>2</small></td>
                      <td> <small>Nama / Nip Pegawai yang Melaksanakan Perjalanan dinas</small></td>
                      <td><small><?php

                               foreach ($statuskaryawan as $datas) {

                                    ?>
                          
                    
                      <?php echo $datas->nama;?> / <?php echo $datas->nip ;?>
                    <?php }?>   
                      </small>
                      </td>
                  </tr>
                   <tr>
                      <td>3</td>
                      <td><p> <small>a. Pangkat dan Golongan </small></p> 
                          <p> <small>b. Jabatan / Instansi</small> </p>
                          <p> <small>c. Tingkat Biaya Perjalanan Dinas</small> </p>
                        
                          
                      </td>
                      <td> 
                      
                      <p>   <small> <?php echo $datas->golongan ?> | <?php echo $datas->gol_ruang;?></small> </p> 
                           <p><small> <?php echo $datas->jabatan?> </small></p>
                          
                                  <p><small>
                                      
                                              <?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }?> 
                                      
                                      <?php echo $data->tingkatbiaya?></small></p>
                      
                      
                      
                      
                      
                      </td>
                  </tr>
                   <tr>
                      <td><small>4</small></td>
                      <td> <small>Maksud Perjalanan Dinas </small></td>
                     <small><?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }?></small> <td>   <small>
<?php echo $data->namasubkegiatans;?></small></td>
                  </tr>
                   <tr>
                      <td><small>5</small></td>
                      <td> <small>Alat Angkut yang dipergunakan</small></td>
                      <td> <small>Mobil</small></td>
                  </tr>
                   <tr>
                      <td><small>6</small></td>
                      <td> <small> <p> a. Tempat berangkat </p>
                          b. Tempat Tujuan </p>
                          </small>
                      </td>
                      <td>   <p><small><?php echo $data->kota;?></p>
                           <p> <?php echo $data->kotatujuan;?> </small></p>
                      
                      </td>
                  </tr>
                   <tr>
                      <td><small>7</small></td>
                      <td> 
                          <small> <p> a. Lamanya Perjalanan Dinas </p>
                          <p>  b. Tanggal Berangkat </p>
                          <p>  c. Tanggal harus kembali / tiba ditempat baru*)</p>
                          </small>
                         </td>
                         <td> <small><?php echo $data->hari;?> Hari </p>
                              <p> <?php echo tgl_indo($data->tgl_pergi);?> </p>
                            <p>   <?php echo tgl_indo($data->tgl_pulang);?></p>
                      
                      </small>
                      
                      
                      </td>
                  </tr>
                   
                       
                       <tr>
    <td><small>8</small></td>
    <td>  <small> Pengikut</small> <br>
       
      <small> <?php

                    foreach ($status as $data2) {

                                    ?>
       
            

       <?php echo $data2->nama;?>  | <?php echo 'Nip'.$data2->nip;?> <br> <br>s<?php }?> </td>
    </small>
    <td>
   
<small>
     <?php

                    foreach ($status as $data3) {

                                    ?>
  
       
  
         <br>
         
         <?php echo $data3->golongan;?> / <?php echo $data3->gol_ruang;?>  
    <?php echo $data3->jabatan;?> <?php }?> <br>
    </small>
    </td>
    
   
  </tr>
  
                       
                    
                   <tr>
                      <td><small>9<small></td>
                      <td> <small> <p> Pembebanan Negara </p>
                              <p> a. Instansi </p>  <br>
                              <p> b. Akun </p>
                        </small>  
                          
                      </td>
                      <td>
                          <small>
                          <p>&nbsp</p>
                          <p>Kanwil Kementrian Agama Provinsi Kep. Bangka Belitung </p>
                    <?php

                    foreach ($sql1 as $data) {

                                    ?> <p>
  <?php }?> <p><?php echo substr($data->program_id,0,4);?>.<?php echo substr($data->program_id,4,8);?>. <?php echo $data->idkegiatans?> </p>
                        
                     </p></small>   </td>
                  </tr>
                   <tr>
                      <td><small>10</small></td>
                      <td> <small>Keterangan Lain- Lain</small></td>
                      <td> </td>
                  </tr>
       
                  </tbody>
     
     </table>
            
               
        
                    <div class="col-xs-6">
              
            </div><!-- /.col -->
            
            <div class="col-xs-6">
                                    <p style="text-align:left">
    <br>

    <small>Dikeluarkan di Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?>  <br> 
    Pejabat Pembuatan Komitmen, <br><br><br> <br><br><br>
    <?php 

foreach ($details_by_id as $ppk ) {
  echo $ppk->namappk;
  echo "<br>";
  echo "NIP.".$ppk->nip;
  # code...
}

?>
    <!-- <?php

                    foreach ($printperintah as $pejabat) {
                    }
                                    ?>
<?php echo "$pejabat->pelimpahan"; ?>
        <br>
<br>
<br>
  <!-- <?php echo "$pejabat->jabatan";
   ?>  <br>  <?php echo "$pejabat->pejabat"; 

?> <br>   NIP.  <?php echo "$pejabat->nippejabat";

?> --> </small> 

  

  
    </section><!-- /.content -->
    
  <div class="clearfix"></div>
          
          
    </div>  
     


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



                                                                