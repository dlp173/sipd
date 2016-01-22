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
               <?php 
               foreach ($printkwitansi as $data){}
               
               
               
               
               ?>
                <h4><p class="text-center"> <b> KUITANSI PEMBAYARAN LANGSUNG  </b></p></h4> 
       
                    <hr>
            </div><!-- /.col -->
            <div class="col-xs-8"> 
            </div>
           <div class="col-xs-4"> TA   &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo date('Y');?> <br>
                No. Bukti &nbsp : <?php echo $data->no_bukti ;?><br>
                AKUN &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php echo $data->akun ;?>
            </div>
             <div class="col-xs-12">
               
                  <h5>   <p class="text-center"> <b> KUITANSI / BUKTI PEMBAYARAN  </b></p></h5> 
       
                    <HR>
            </div><!-- /.col -->
            <DIV class="ROW">

  <div class="col-xs-3">
               
                    <p class="text-right"> <b> SUDAH TERIMA DARI </b></p>
       
                  
            </div><!-- /.col -->
 <div class="col-xs-9">
               
       <p> Pejabat Pembuat Komitmen Program Dukungan Manajemen dan Pelaksanaan Tugas Teknis Lainnya Kementerian Agama dan Program Peningkatan Sarana dan Prasarana Aparatur Kementerian Agama Kanwil Kementerian Agama Prov.Kep.Bangka Belitung </p>
                     
     
            </div><!-- /.col -->
<div class="col-xs-3">
               
                      <p class="text-RIGHT"> <b> JUMLAH UANG </b></p>
   
                   
            </div><!-- /.col -->
            
            <div class="col-xs-9">
               
                    <p> <?php echo rupiah2($data->jumlahbiaya); ?> </p>
       
                   
            </div>
            <div class="col-xs-3">
               
                      <p class="text-RIGHT"> <b> Terbilang</b></p>
   
                   
            </div><!-- /.col -->
            
            <div class="col-xs-9">
               
                    <p> <?php echo ucwords(number_to_words($data->jumlahbiaya)); ?> </p>
       
                   
            </div>
              <div class="col-xs-3">
               
                      <p class="text-RIGHT"> <b>Untuk Pembayaran</b></p>
   
                  
            </div><!-- /.col -->
              
              
            <div class="col-xs-9">
               
                    Perjalanan dinas, 
                    Atas Nama  : <br>
                     <?php 
                     $i=1;
                     foreach ($printkwitansijumlah as $jumlah){
                    
                     ?>
                    <?php echo $i++;?>.  <?php echo $jumlah->nama ;?>, sebesar  <?php echo rupiah2($jumlah->totalbiaya) ?> <br>
                
                     <?php }?>
                     Dalam Rangka  <?php echo $jumlah->namasubkegiatans?> pada tanggal  
                     <?php echo tgl_indo($jumlah->tgl_pergi); ?> sampai dengan
                            <?php echo tgl_indo($jumlah->tgl_pulang); ?>



                     <br> 
             
                     
                  
                   
            </div>
          
              <div class="col-xs-7">
               
                 
                   
            </div><!-- /.col -->
            
                <div class="col-xs-5">
                 <br>  <br>  <br> 
                    Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?><br>Penerima </br> <br><br><br>
                    
                    
                    <?php echo $data->nama ;?> 
       
                   
            </div>
          
            
            <div class="col-xs-12">
                
                <hr>
            </div>
              <div class="col-xs-1">
                 </div>
             <div class="col-xs-5">
                  a.n. Kuasa Pengguna Anggaran <br>
                  Pejabat Pembuat Komitmen,<br><br><Br><br><br>
                  
                 <?php echo $data->namappk ;?> <br>
                 Nip <?php echo $data->nipppk ;?> 
            </div>
             <div class="col-xs-1">
                
                 
            </div>
             <div class="col-xs-5" >
               
                  Bendahara Pengeluaran<br>
                  <br><br><br><Br><br>
                  
                   
                 <?php echo $data->namabendahara ;?><br>
                  Nip <?php echo $data->nipbendahara ;?> 
            </div>
            </DIV>
            

     
<div class="row invoice-info">
    <div class="col-xs-12">
                
         


          <!-- this row will not appear when printing 
          
            <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>
              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Download PDF</button> -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="printsurat/prints/18/9" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          
           
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



                                                                                                                             