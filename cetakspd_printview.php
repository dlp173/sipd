<div class="content-wrapper">
<!-- Main content -->
    <div class="box-header">
                    </div><!-- /.box-header -->
                   
        <section class="invoice">
        
        <h2 style="text-align:center" > SURAT PERJALANAN DINAS  (SPD)</h2>
        Kementerian Negara / Lembaga Kanwil Kementerian Agama  Provinsi Kepulauan Bangka Belitung  </br>
        Lembar ke : I.II.III.IV.V.VI.VII <br> 
        Kode no :  
          <?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }?> <br>
        Nomor : <?php echo $data->no_spd;?> 
             <table class="table table-bordered">

        <tbody>
                          
                          
                  <tr> 
                        <td>1</td>
                        <td> Pejabat Pembuat Komitmen</td>
                        <td><?php echo $data->namaprogram;?></td>
                  </tr>
                  <tr>
                      <td>2</td>
                      <td> Nama / Nip Pegawai yang Melaksanakan Perjalanan dinas</td>
                      <td><?php

                               foreach ($statuskaryawan as $datas) {

                                    ?>
                          
                    
                      <?php echo $datas->nama;?> / <?php echo $datas->nip ;?>
                    <?php }?>   
                      
                      </td>
                  </tr>
                   <tr>
                      <td>3</td>
                      <td><p> a. Pangkat dan Golongan </p> 
                           <p> b. Jabatan / Instansi </p>
                            <p>c. Tingkat Biaya Perjalanan Dinas </p>
                        
                          
                      </td>
                      <td> 
                      
                      <p>    <?php echo $datas->golongan ?> | <?php echo $datas->gol_ruang;?> </p> 
                           <p> <?php echo $datas->jabatan?> </p>
                            <p>D</p>
                      
                      
                      
                      </td>
                  </tr>
                   <tr>
                      <td>4</td>
                      <td> Maksud Perjalan Dinas </td>
                     <?php

                    foreach ($sql1 as $data) {

                                    ?>
  <?php }?> <td>   
<?php echo $data->namasubkegiatans;?> </td>
                  </tr>
                   <tr>
                      <td>5</td>
                      <td> Alat Angkut yang dipergunakan</td>
                      <td> Mobil</td>
                  </tr>
                   <tr>
                      <td>6</td>
                      <td>  <p> a. Tempat berangkat </p>
                          b. Tempat Tujuan </p>
                          
                      </td>
                      <td>   <p><?php echo $data->kota;?></p>
                           <p> <?php echo $data->kotatujuan;?> </p>
                      
                      </td>
                  </tr>
                   <tr>
                      <td>7</td>
                      <td> 
                           <p> a. Lamanya Perjalanan Dinas </p>
                          <p>  b. Tanggal Berangkat </p>
                          <p>  c. Tanggal harus kembali / tiba ditempat baru*)</p>
                          
                         </td>
                         <td> <?php echo $data->hari;?> Hari </p>
                              <p> <?php echo tgl_indo($data->tgl_pergi);?> </p>
                            <p>   <?php echo tgl_indo($data->tgl_pulang);?></p>
                      
                      
                      
                      
                      </td>
                  </tr>
                   
                       
                       <tr>
    <td>8</td>
    <td>   Pengikut <br>
       
       <?php

                    foreach ($status as $data2) {

                                    ?>
       
    
        <p> <?php echo $data2->nama;?>  | <?php echo 'Nip'.$data2->nip;?> <?php }?> </p><br> </td>
    
    <td>
   

     <?php

                    foreach ($status as $data3) {

                                    ?>
  
            <br>
     <p> 
         
         
         <?php echo $data3->golongan;?> / <?php echo $data3->gol_ruang;?>  
    <?php echo $data3->jabatan;?> <?php }?> </p> <br>
    
    </td>
    
   
  </tr>
  
                       
                    
                   <tr>
                      <td>9</td>
                      <td>  <p> Pembebanan Negara </p>
                           <p> a. Instansi </p>
                         <p>   b. Akun </p>
                          
                          
                      </td>
                      <td> <br>Kanwil Kementrian Agama PRovinsi Kep. Bangka Belitung</td>
                  </tr>
                   <tr>
                      <td>10</td>
                      <td> Keterangan Lain- Lain</td>
                      <td> </td>
                  </tr>
       
                  </tbody>
     
     </table>
            
                                      
        
        <div class="col-xs-4"> 
           
            </div><!-- /.col -->
            <div class="col-xs-4"> 
           
            </div><!-- /.col -->
             <div class="col-xs-4"> 
                <p style="text-align:left">
    <br>
    <br>
    Dikeluarkan di Pangkalpinang, <?php echo tgl_indo(date("Y-m-d"));?>  <br>
   
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
    
         
        
     
            </div><!-- /.col -->
            
          
    
    
         <a href="<?php echo base_url('index.php/printsurat/printcetakspd/'.$data->idkegiatan)?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print SPD Halaman 1</a>
        
     
    </section><!-- /.content -->
    
  <div class="clearfix"></div>
          
          
    </div>  
     



















 
          
 <link href="<?php echo base_url('assets/bootstrap/css/stpdf.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
