
<div class="content-wrapper">
<!-- Main content -->
    <div class="box-header">
                    </div><!-- /.box-header -->
                   
        <section class="invoice">
            
                                <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1"></div>
                                                <div class="col-md-1"></div>
                                               
                                                <div class="col-md-4"> 
                                                   <div class="row">


                                                                 <h2 style="text-align:center;"Times New Roman";">

                                                                    KEMENTRIAN AGAMA <BR>



                                                              </h2>
                                                              <h4 style="text-align:center;"Times New Roman";" > KANTOR WILAYAH PROPINSI KEPULAUAN BANGKA BELITUNG <BR> </h4>
                                                              <h5 style="text-align:center;"Times New Roman";" >   Komplek Perkantoran Gubernur Kepulauan Bangka Belitung No. 1 Kelurahan Air Itam <Br></h5>
                                                              <h6 style="text-align:center;"Times New Roman";"> (0717) 439464-439465 Fax (0717) 439466 PANGKALPINANG 33117   </h6>
                                                              </div>
                                               </div>


                           </div>
                                        <div class="row">

                                         <h2  class="page-header" > </h2>

                                        </div>
                           
          <!-- title row -->
   

             <h3 style="text-align:center">LAPORAN</h3> 
             
             <?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }

                                      ?>

 <h4 style="text-align:center">Nomor <?php echo $data->no_lampiran ?> </h4> 

                        

     <!-- Table row -->
          <div class="row">
            <div class="col-xs-12 table-responsive">
                <div class="row">
                 <div class="col-xs-12 table-responsive">
                <span style="text-align:center"> 
                            Yang bertanda tangan di bawah ini Kepala Kantor Wilayah Kementerian Agama Propinsi Kepulauan Bangka Belitung, dengan ini kami menugaskan : </span>
                         <br>
                          <br> 
                 </div>
                </div>
                <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                              <th>Nama / Nip</th>
                              <th>Pangkat / Golongan</th>
                              <th>Jabatan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php
                                     $i=1;
                                      foreach ($sql as $data) 
                                      {
                                        ?>
                                          <tbody>
                                      <tr> 
                                      <td> <?php echo $i++ ?></td>


                                      <td > <?php echo $data->nama ;?> / <?php echo $data->nip;?></td>
                                      <td> <?php echo $data->golongan;?> / <?php echo $data->gol_ruang;?></td>
                                      <td>  <?php echo $data->jabatan;?></td>

                                      </tr> 

                                      <?php }

                                      ?>
                  </tr>
                  
                </tbody>
              </table>
                    </div>
            </div><!-- /.col -->
          </div><!-- /.row -->


 
     

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-12">
                        <p style="text-align: justify; text-indent: 0.5in;">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
      Untuk melakukan<b>
    <?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }

                                      ?>
                                   <?php echo $data->namasubkegiatans;?>

                                    
    </b>
                        yang akan dilaksanakan  pada tanggal <b> 

   


                                   <?php echo tgl_indo($data->tgl_pergi);?>
                            sampai dengan    <?php echo tgl_indo($data->tgl_pulang);?>

                                      

                                    </b>bertempat di <b>                  




                                   <?php echo $data->tempat;?>


                                    
                                      </b>        </p>
              
            </div><!-- /.col -->
              <div class="col-xs-12">
                                     <p style="text-align: justify; text-indent: 0.5in;"> Demikian Surat Tugas ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.</p>

                    
        </div>
            
              <div class="row invoice-info">
              <div class="col-md-4">
              </div>
           
                 <div class="col-md-4"></div>
            <div class="col-sm-4 invoice-col">
              <br>
    Pangkalpinang, <?php echo tgl_indo(date("Y-m-d") );?> 
    <br>
     <?php

                    foreach ($printperintah as $pejabat) {
                    }
                                    ?>
<?php echo "$pejabat->pelimpahan";

?>
<br>
<br>
<br>
<br>
 
<?php echo "$pejabat->jabatan";

?>
<br>
						          

			                                     <?php echo "$pejabat->pejabat";

?>
                                                              <br>
                                                              NIP.  <?php echo "$pejabat->nippejabat";

?>
            </div><!-- /.col -->
          </div><!-- /.row -->
            
     
              <div class="col-xs-6">
              
            </div><!-- /.col -->
                   <!--
            <div class="col-xs-6">
                                    <p style="text-align:right">
    <br>
    <br>
    Pangkalpinang, <?php echo tgl_indo(date("Y-m-d") );?> <br>
    <br>
     <?php

                    foreach ($printperintah as $pejabat) {
                    }
                                    ?>
<?php echo "$pejabat->pelimpahan";

?>
<br>
<br>
<br>

 
<?php echo "$pejabat->jabatan";

?>
<br>
						          

			                                     <?php echo "$pejabat->pejabat";

?>
                                                              <br>
                                                              NIP.  <?php echo "$pejabat->nippejabat";

?> </p>
  
   </div> --> 
        </div>















   
              <a href="<?php echo base_url('index.php/printsurat/printviewpdf/'.$data->idkegiatan)?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Surat Tugas</a>
        

 </section><!-- /.content -->
  <div class="clearfix"></div></div>  
          
          
            
                           
                    
                  
    