    
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
    <style>
   hr {
       border-top: 2px solid #000000 !important;
       margin-bottom:5px !important; 
       margin-top:5px !important;
     
   }
</style>
  </head>
<body onload="window.print();">  

<div class="wrapper">
        <!-- Content Header (Page header) -->
<section class="content-header">
         
        </section>

        <!-- Main content -->
        <section class="invoice">
            
            <table >
                
                <th> <img src="<?php echo base_url('assets/image/logo.png')?>"width="130" height="130"> </th>
                <th>  
                            <h3 style="text-align:center;"Times New Roman";">
                          <b>     KEMENTRIAN AGAMA </b> <BR>
                                                                 </h3>
                                <b> <h4 style="text-align:center;"Times New Roman";"> KANTOR WILAYAH PROPINSI KEPULAUAN BANGKA BELITUNG <BR> </h4>
                                   </b>                                       
                <h5 style="text-align:center;"Times New Roman";">   Komplek Perkantoran Gubernur Kepulauan Bangka Belitung No. 1 Kelurahan Air Itam <Br></h5>
                                                                  <h6 style="text-align:center;"Times New Roman";"> (0717) 439464-439465 Fax (0717) 439466 PANGKALPINANG 33117   </h6>
                                                            </th>
                
            </table><?php     
 $i=1;
 $total = 0;
 foreach ($printnormative as $data) {
      $total += $data->totalbiaya;
      $orang = $i++;
         
 }
?>
            
     
      
            <hr> <h5 style="text-align:center">SURAT PERNYATAAN TANGGUNG JAWAB BELANJA </h5>
            <h5 style="text-align:center">   Nomor  : Kw.29.<?php 
            
            
            
            
            echo $data->kode_satker?>/<?php echo $data->idsubbag ?>/Kp.01.2/

             <?php if($data->no_sptjb != ""){
                echo $data->no_sptjb;}
                else{
              echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                }

             ?>

         /2016 </h5>
                     <div class="row">
            <div class="col-xs-12 table-responsive">
         


                <p>
                1.   Kode Satuan Kerja	        : <?php echo $data->idsatker ;?> <br>
                2.   Nama Satuan Kerja 		: Kanwil Kementerian Agama Prop. Kep. Bangka Belitung <br>
                3.   Tanggal / No. DIPA		: <?php echo $data->no_dipa ;?> <br> 
                4.   Klasifikasi Anggaran	: <?php echo $data->mataanggaran;?> <br>
                
                <!--
                01/03/01/<?php echo substr($data->program_id,0,4);?>/<?php echo substr($data->program_id,4,7);?>/5241 <br><br>
               -->
                </p>
          
          <p > Yang bertanda tangan di bawah ini atas nama Kuasa Pengguna Anggaran Satuan Kerja Kantor Wilayah Kementerian Agama Prop. 
              Kep. Bangka Belitung menyatakan bahwa saya bertanggung jawab penuh secara formal dan material dan kebenaran perhitungan 
              pemungutan pajak atas segala pembayaran tagihan yang telah kami perintahkan dalam SPM ini dengan perincian sebagai berikut : </p>
          <br>
         
        
       
            </div><!-- /.col -->
          </div><!-- /.row -->            
          <!-- title row -->
   
    <div class="col-xs-12 table-responsive">
          <table>
                <thead>   
                  <tr>
                                 <td rowspan="2"><b><p>No</p></td>
                    <td rowspan="2"><b><p>Akun</p></td>
                    <td rowspan="2" width="25%"><b><p>Penerimaan</p></td>
                    <td rowspan="2"><b><p >Uraian</p></td>
                    <td rowspan="2" width="17%"><b><p >Jumlah</p></td>  
                    <td colspan="2"><b><p >Pajak yang dipungut</p></td>
          </tr>
          <tr> 
             
              <td><b><p> PPN </p></th>  <td><b><p > PPH </p></td> </tr>
             
                </thead>
                      <tbody>
  <tr>
      <td  border-top: none;><p > 1 </p> </td>
                  <td><p> 524111 </p></td>
                  <?php 
            
foreach ($statuskaryawan as $datas){
   
}
            
            
 ?> <?php 
            
foreach ($printkota as $kota){
   
}
            
            
 ?>
                  <td> <p> <?php echo $datas->nama;?></p></td>
                  <td> <p>Biaya Perjalanan Dinas Ke <?php echo ($kota->namakota); ?> sebanyak <?php echo  $orang ;?> orang  
                      <?php echo tgl_indo($data->tgl_pergi); ?> -
                            <?php echo tgl_indo($data->tgl_pulang); ?>,
                            dalam rangka  <?php echo $data->namasubkegiatans ;?>  di <?php echo $data->tempat ;?> berdasarkan SPD nomor Kw.29.
                                <?php echo $data->kode_satker ;?>/<?php echo $data->idsubbag ;?>/KU.01.2/                                
                                <?php echo $data->no_spd;?>/2016 
                     </p></td>
                  <td>  <p><?php echo rupiah2($total); ?> </p></td>
                  <td> </td>
                        <td> </td>
                         
                      
                      
              </tr>
                                    
              <tr><td colspan="4"><p>Jumlah </p></td>
                  <td coslspan="2"><p><?php echo rupiah2($total); ?></p></td>
              <td> </td>
              <td> </td>
              
              </tr>
               
                  
                </tbody>
              </table>
           <br>  
</div>




          <p> Bukti-bukti pengeluaran anggaran dan asli setoran pajak (SSP/BPN) tersebut diatas disimpan oleh Pengguna Anggaran/Kuasa Pengguna Anggaran untuk kelengkapan administrasi dan pemeriksaan aparat pengawasan fungsional.

Demikian Surat Pernyataan ini dibuat dengan sebenarnya.





</p>
     

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-12">
                 
              
            </div><!-- /.col -->
              <div class="col-xs-8">
              
            </div><!-- /.col -->
            
            <div class="col-xs-4">
                                    <p style="text-align:left">
    <br>
    <br>
    Pangkalpinang, <?php echo tgl_indo(date("Y-m-d") );?> <br>
   Pejabat Pembuat Komitmen,
<br>
<br>
<br>

<br>
						          
          <?php 
            
foreach ($printkwitansi as $datappk){
   
}
            
            
 ?>
			                                    <?php echo $datappk->namappk;?>

                                                              <br>
                                                             Nip.<?php echo $datappk->nipppk;?> </p>
  
   </div> 
        </div>

















 </section><!-- /.content -->
  <div class="clearfix"></div></div>  
 
                                                                                                              
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



                                                                                                                                                                                   
          
            
              <style>

p {
    font-size: 0.875em;
}

table {
    border-collapse: collapse;
    width: 100%;
    
}

 td {
    border: 1px solid black;
    padding-top: 0.5em;
    padding-right: 0.5em;
    padding-bottom:0.5em;
    padding-left: 0.5em;
    font-size: 0.875em;
}
 th {
   
    padding-top: 0.5em;
    padding-right: 0.5em;
    padding-bottom:0.5em;
    padding-left: 0.5em;
    font-size:1.5 em;
}
</style>                                                   
                    
                  
              
            
                           
                    
                  
    