


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
                <i class="fa fa-globe"></i> <p class="text-center"> DAFTAR NORMATIF PERJALANAN DINAS LAINNYA </p>
       
              </h2>
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
              <table class="table table-striped" border="1">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Pejabat</th>
                    <th>Gol.</th>
                    <th>Tujuan</th>
                    <th>Tgl.Berangkat</th>
                    <th>Lama Perjalanan Dinas</th>
                    <th>Uang Harian </th>
                    <th>Uang Transport</th>
                    <th>Biaya Penginapan </th>
                  <?php 
                  
                    if ($data->jabatan = 'Kakanwil'){
                    
                        echo "<th>Biaya Representative </th>";                    
                    
                       
                    }{
                        
                        echo "";                
                    }
                    
                    ?>
                    <th>Biaya yang diperlukan (Rp.)</th>
                    <th> Ket. </th>
               
                  
                  </tr>
                </thead>
                <tbody>
                                        
 <?php     
 $i=1;
 foreach ($printnormative as $data) {
      
         
    
?>
                  <tr>
                    <td> <?php echo $i++ ?></td>
                    <td><?php echo $data->nama;?></td>
                    <td><?php echo $data->gol_ruang;?></td>
                    <td><?php echo $data->namasubkegiatans;?></td>
                    <td><?php echo tgl_indo($data->tgl_pergi);?></td>
                    <td><?php echo $data->hari;?></td>
                    <td><?php echo $data->totalbiayaharian;?></td>
                    <td><?php echo $data->biayatiketpulang + $data->biayatiketpergi + $data->totalbiayataksi + $data->totalbiayataksikotatujuan + $data->transportluarkotamasihbangka + $data->totalbiayataksidepatiamir;?></td>
                    <?php 
                 
                        if ($data->totalbiayainap == 0 && $data->biayatanpainap == 0){
                        //   if (!empty($data->biayainap) && !empty($data->biayatanpainap)){
                        
                        echo " <td> - </td>";
                    }else if ($data->totalbiayainap > 0 && $data->biayatanpainap == 0){
                         echo " <td> $data->totalbiayainap </td>";
                    }else if ($data->totalbiayainap == 0 && $data->biayatanpainap > 0){
                        echo " <td> $data->biayatanpainap </td>";
                    }
                    
                    else {
                        echo " <td>Biaya Inap : $data->totalbiayainap <br> Biaya Tanpa Inap : $data->biayatanpainap</td>";
                        
                        
                    }
                    
                    ?>
                   <?php 
                    if($data->jabatan = 'Kakanwil'){
                        
                        echo "<td>$data->biayarep</td>";
                    }
                        
                    
                    ?>
                   <!-- <td><?php echo $data->biayainap;?></td>
                   --> <td><?php echo $data->totalbiaya
                            
                           //+$data->totalbiayainap +
                           //$data->biayatanpainap + 
                           //$data->biayatiketpulang + 
                          // $data->biayatiketpergi
                           
                           ;?></td>
                                      <?php 
                    if($data->jabatan = 'Kakanwil'){
                        
                        echo "<td>
</td>";
                    }
                        
                    
                    ?>
                 
                  </tr>
 <?php }?>
                  
                 
                  <tr>
                  <th>Total Biaya:</th>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
                  <td> </td>
   <td> </td>
         
                  <th>
                  
                  
                  <?php
                  $total = 0;
foreach ($printnormative as $row) {
   // echo $row->totalbiayaharian;
    $total += $row->totalbiaya;
}; ?>
<?php echo rupiah2($total); ?>
                  
                  
                  
                  
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

          
          
          <div class="row invoice-info">
           <div class="col-md-8"></div>
            <div class="col-sm-4 invoice-col">
              <b> Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?></b>
              <br>
              Yang Memerintahkan Perjalanan Dinas<br>
              Kepala<br>
              <br>
              <br>
              <br>
              <br>
              <b>Drs. H.Andi M.Darlis, M.Pd.I</b><br>
              NIP. 196012271990011001
            </div><!-- /.col -->
          </div><!-- /.row -->


          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
          
              <a href="<?php echo base_url('index.php/Rencanabiaya/cetakbiayanormatif/'.$data->id)?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print</a>
             
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
            