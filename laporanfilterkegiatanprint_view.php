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
<?php
                       
                        foreach($result_display as $data){
                        
                        }
                    ?>
          

        <!-- Content Header (Page header) -->
      

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
       
              <div class="col-xs-12">
                  <h1 class="page-header">
                      <p class="text-center"> LAPORAN KEGIATAN PERJALANAN DINAS   KEMENTRIAN AGAMA PROVINSI BANGKA BELITUNG</p>
                    
                   
           <p class="text-center"> [<?php echo tgl_indo($date1);?> - <?php echo tgl_indo($date2);?> ]</p>
                
              </h1>
           

         
           </div><!-- /.col -->
        
          <!-- info row -->
         


          <div class="row invoice-info">
           
          
         <!-- /.col -->
            <!--<div class="col-sm-4 invoice-col">
        
              <address>
                <strong>Periode Bulan</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                Phone: (555) 539-1037<br>
                Email: john.doe@example.com
              </address>
            </div><!-- /.col -->
            <!-- <div class="col-sm-4 invoice-col">
              <b>Info Kegiatan</b><br>
              <br>
              <b>Total Kegiatan yang diikuti</b> 4F3S8J<br>
              <b>Total biaya </b> 2/22/2014<br>
              <b>Account:</b> 968-34567
            </div><!-- /.col -->
          </div><!-- /.row -->
          <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
              <table>
                <thead>
                  <tr>
                    <td><b>No</td>
                    <td><b>Peserta</td>
                    <td><b>Maksud</td>
                    <td><b>Tujuan</td>
                    <td><b>Tgl.Berangkat</td>
                    <td><b>Hari</td>
                    <td><b>Subtotal</td>
           
                  </tr>
                </thead>
                <tbody>
                    <?php
                     $total = 0;
                       $i=1;
                        foreach($result_display as $data){
                            $total += $data->totalbiaya;
                    ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $data->nama;?></td>
                    <td><?php echo $data->namasubkegiatans;?></td>
                    <td><?php echo $data->namakota;?></td>
                    <td><?php echo tgl_indo($data->tgl_pergi);?></td>
                    <td><?php echo $data->hari?></td>
   


                    <td><?php echo rupiah2($data->totalbiaya) ?> </td>
                  </tr>
                        <?php }?>
                </tbody>
              </table> 
              <b>  <p>  Total Peserta Kegiatan: <?php echo $i++ - 1;?>  | Total Biaya : <?php echo  rupiah2($total) ;?> </p> </b>
                           
                   
               
            </div><!-- /.col -->
          </div><!-- /.row -->

                    </section>

            </div><!-- /.col -->
            </section>
           </div><!-- /.row -->
</div></body></html>
    
    
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
     font-size: 0.7em;
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
   font-size: 0.5em;
}
 th {
   font-size: 0.7em;
}
</style>                        