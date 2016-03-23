

<div id='container'>
    <div class="row"> 
         <div class="col-lg-4 col-lg-offset-4">
             <table style="border: 0px;">
                 
                 <tr style="border: 0px ";>
                     <td style="border: 0px ";>
                         <h3 style="text-align:center">
                             <img src="<?php echo base_url('assets/image/logo.png')?>"width="140" height="150"> 
                    
                         </h3>
                     </td>
                     <td style="border: 0px ";">
                         
                         <b>   <p style="text-align:center;"Times New Roman";"> KEMENTERIAN AGAMA</p></b>
                          
                         <b>  <p style="text-align:center;font-size: 14px;font-family: "Times New Roman", Times, serif;">  KANTOR WILAYAH PROPINSI KEPULAUAN BANGKA BELITUNG   </p></b>         
                         <p style="text-align:center;font-size: 12px;font-family: "Times New Roman";">Komplek Perkantoran Gubernur Kepulauan Bangka Belitung No. 1 Kelurahan Air Itam </p>
                <p style="text-align:center;font-size: 12px;font-family: "Times New Roman";"> (0717) 439464-439465 Fax (0717) 439466 PANGKALPINANG 33117</p>
                     </td>
                     </tr>
                 
                 
             </table>
                 <hr border="5px">
         </div>
            <div class="col-lg-4 col-lg-offset-4">
                       
                       <b> <h4 style="text-align:center">S U R A T      T U G A S </h4> </b
                        <h5 style="text-align:center"> <?php

                                foreach ($sql1 as $data) {

                                                ?>

                                        <?php echo $data->no_lampiran;?>

                                           <?php }

                                           ?></h5>
       </div>
        <div class="col-lg-4 col-lg-offset-4">
                        <span style="text-align:center"> 
                            Yang bertanda tangan di bawah ini Kepala Kantor Wilayah Kementerian Agama Propinsi Kepulauan Bangka Belitung, dengan ini kami menugaskan : </span>
                         <br>
                          <br> 


                        <table id="table" width="100%">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Nama / Nip</th>
                              <th>Pangkat / Golongan</th>
                              <th>Jabatan</th>
                          </tr>
                          </thead>

                          <tbody>
                               <?php
                                     $i=1;
                                      foreach ($sql as $data) 
                                      {
                                        ?>
                                          <tbody>
                                      <tr> 
                                      <td> <?php echo $i++ ?></td>


                                      <td class="info"> <?php echo $data->nama ;?> / <?php echo $data->nip;?></td>
                                      <td> <?php echo $data->golongan;?> / <?php echo $data->gol_ruang;?></td>
                                      <td>  <?php echo $data->jabatan;?></td>

                                      </tr> 

                                      <?php }

                                      ?>
                          </tbody>

                            </table>
        </div>
      
   <div class="col-lg-4 col-lg-offset-4">
       <br>
       <p style="text-align:left">Untuk melakukan<b>
    <?php

                    foreach ($sql1 as $data) {

                                    ?>

                                   <?php echo $data->jeniskegiatan;?>

                                      <?php }

                                      ?>
    </b>
                        yang akan dilaksanakan  pada tanggal <b> <?php

                    foreach ($sql1 as $data) {

                                    ?>


                                   <?php echo $data->tgl_pergi;?>
                            sampai dengan    <?php echo $data->tgl_pulang;?>

                                      <?php } 

                                      ?> </b>bertempat di <b>                  



                                       <?php

                    foreach ($sql1 as $data) {

                                    ?>

                                   <?php echo $data->tempat;?>


                                      <?php }

                                      ?>  
                                      </b>


                                    <br>
                                    <br>
   </div> </p>
        <div class="col-lg-4 col-lg-offset-4">
                                    <p style="text-align:left">Demikian Surat Tugas ini dibuat dengan sebenarnya, untuk dapat dipergunakan sebagaimana mestinya.</p>

                    
        </div>
   <div class="col-lg-4 col-lg-offset-4">
                                    <p style="text-align:right">
    <br>
    <br>
    Pangkalpinang, 3 Agustus  2015 <br>
    <br>
    
Plh. Kepala,
<br>
<br>
<br>
Kepala Bidang Penyelenggaraan Haji Dan Umrah
<br>
						          

			                                      Drs. H. Abdul Aziz, MH
                                                              <br>
                                                              NIP. 196505041988011001 </p>

   </div>
    </div>
</div>

 <link href="<?php echo base_url('assets/bootstrap/css/stpdf.css')?>" rel="stylesheet">
<script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
