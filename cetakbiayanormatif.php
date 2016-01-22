
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
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/css/ont-awesome.min.css')?>">
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

      <!-- Content Wrapper. Contains page content -->
    <div class="wrapper">
        <!-- Content Header (Page header) -->
        

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
            <div class="col-xs-12">
                <h3 class="page-header">
              <p class="text-center"> DAFTAR NORMATIF PERJALANAN DINAS LAINNYA </p>
       
              </h3>
            </div><!-- /.col -->
            
          </div>
          <!-- info row -->
          
           <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
 }
?>
          
            <div class="row">
            <div class="col-xs-12 table-responsive">
              <table >
                <thead>
                  <tr>
                      <th><small><span class="small">No</span></small></th>
                      <th><small><span class="small">Nama Pejabat</span></small></th>
                      <th><small><span class="small">Gol </span> </small></th>
                      <th><small><span class="small">Tujuan</span></small></th>
                      <th><small><span class="small">Tgl<br>Berangkat</span></small></th>
                      <th><small><span class="small">Lama <br>Perjalanan <br>
                                  Dinas (Hari)</span></small></th>
                                  <th><small><span class="small">Uang <br>Harian</span></small></th>
                    <th><small><span class="small">Uang <br> Transport</span></small></th>
                    <th><small><span class="small">Biaya <br> Penginapan</span></small></th>
                  <?php 
                  
                    if ($data->jabatan = 'Kakanwil'){
                    
                        echo "<th><small><span class='small'>Biaya <br>Representative</span></small></th>";                    
                    
                       
                    }                  
                    
                    ?>
                    <th><small><span class="small">Biaya yang <br>diperlukan (Rp.)</span></small></th>
                    <th> <small><span class="small">Ket</span></small></th>
               
                  
                  </tr>
                </thead>
                <tbody>
                                        
 <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
    
?>
                  <tr>
                      <td><small><span class="small"> <?php echo $i++ ?></span></small></td>
                    <td><small><span class="small"><?php echo $data->nama;?></span></small></td>
                    <td><small><span class="small"><?php echo $data->gol_ruang;?></span></small></td>
                    <td><small><span class="small"><?php echo $data->namasubkegiatans;?> </span></small></td> 
                    <td><small><span class="small"><?php echo tgl_indo($data->tgl_pergi);?></span></small></td>
                    <td><small><span class="small"><?php echo $data->hari;?></span></small></td>
                    <td><small><span class="small"><?php echo rupiah2($data->totalbiayaharian);?></span></small></td>    
                 
                    <td><small><span class="small"><?php $a = $data->biayatiketpulang + $data->biayatiketpergi + $data->totalbiayataksi + $data->totalbiayataksikotatujuan + $data->transportluarkotamasihbangka + $data->totalbiayataksidepatiamir;?>
                            
                            <?php echo rupiah2($a);?>
                            </span></small></td>
                   
                     <?php 
                  
                        if ($data->totalbiayainap == 0 && $data->biayatanpainap == 0){
                        //   if (!empty($data->biayainap) && !empty($data->biayatanpainap)){
                        
                        echo " <td> - </td>";
                    }else if  ($data->totalbiayainap > 0 && $data->biayatanpainap == 0){
               ?>
                           <td><small><span class='small'> <?php echo rupiah2($data->totalbiayainap);?> </span></small></td>
                    <?php } else if ($data->totalbiayainap == 0 && $data->biayatanpainap > 0){ ?>
                    ?>
                           <td><small> <span class='small'><?php echo rupiah2($data->biayatanpainap);?></span></small> </td>
                    
                   <?php  
                    }  else { 
                        ?>
                       <td><small> <span class='small'>Biaya Inap : <?php echo rupiah2($data->totalbiayainap);?> <br> Biaya Tanpa Inap : <?php echo rupiah2($data->biayatanpainap);?> </span></small></td>
                        
                        
                    <?php }?>
                   <?php 
                  
                    if($data->jabatan = 'Kakanwil'){
                       ?> 
                    <td><small> <span class='small'><?php echo rupiah2($data->biayarep);?> </span></small></td>
                   <?php  } ?>
                        
                    
         
                   <!-- <td><?php echo $data->biayainap;?></td>
                   --> <td><small> <span class="small"><?php echo rupiah2($data->totalbiaya)
                            
                           //+$data->totalbiayainap +
                           //$data->biayatanpainap + 
                           //$data->biayatiketpulang + 
                          // $data->biayatiketpergi
                           
                           ;?></span></small></td>
                                  <small> <span class="small">   <?php 
                    if($data->jabatan = 'Kakanwil'){
                        
                        echo "<td>
</td>";
                    }
                        
                  
                    ?>
                                      </span>
                   </small>
                  </tr>
 <?php }?>
                  
                 
                  <tr>
                  <th></th>
                  <td colspan="9"><small><span class="small">Total Biaya:</span></small> </td>
                  
   
         
                  <th>
                  
                      <small>
                          <span class="small">
                  <?php
                  $total = 0;
foreach ($printnormative as $row) {
   // echo $row->totalbiayaharian;
    $total += $row->totalbiaya;
}; ?>
<?php echo rupiah2($total); ?>
                          </span>
                  </small>
                  
                  
                  </th>
                  

                
                  
                 <?php    if($data->jabatan = 'Kakanwil'){
                        
                        echo "<td>
</td>";
}?>
                  
                  
                  
                  </tr>
                </tbody>
              </table>
                 
            </div><!-- /.col -->
          </div><!-- /.row -->

          <br>
          
          <div class="row invoice-info">
         
            <div class="col-sm-4 invoice-col pull-right">
                <b><small><span class="small"> Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?>  </span> </small></b>
              <br>
            <small><span class="small">  Yang Memerintahkan Perjalanan Dinas<br>
              Kepala </span> </small><br>
              <br>
              <br>
              <br>
              <br>
           <small><span class="small">  Yang Memerintahkan Perjalanan Dinas<br>    <b>Drs. H.Andi M.Darlis, M.Pd.I</b><br>
              NIP. 196012271990011001</span> </small>
            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
              <a href="rencanabiaya/downloadbiayanormative" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          
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

<style>


h1 {
    font-size: 2.5em;
}

h2 {
    font-size: 1.875em;
}

p {
    font-size: 0.875em;
}table {
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
    border: 1px solid black;
    padding-top: 0.5em;
    padding-right: 0.5em;
    padding-bottom:0.5em;
    padding-left: 0.5em;
    font-size:1 em;
}
</style>                                                                                       