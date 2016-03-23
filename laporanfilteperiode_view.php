  <?php
                       
                        foreach($result_display as $data){
                        
                        }
                    ?>
          
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2 class="page-header">
                <i class="fa fa-globe"></i> Laporan Kegiatan Perjalanan Dinas
                
                
                
              </h2>
        </section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
       
              <div class="col-xs-12">
                  <h1 class="page-header">
               <p class="text-center"> LAPORAN KEGIATAN PERJALANAN DINAS </p>
                   
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
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Kota Tujuan</th>
                    <th>Tgl.Berangkat</th>
                    <th>Hari</th>
           
                    <th>Option</th>
           
                  </tr>
                </thead>
                <tbody>
                    <?php
                     
                       $i=1;
                        foreach($result_display as $data){
                         
                    ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $data->namasubkegiatans;?></td>
                    <td><?php echo $data->namakota;?></td>
                    <td><?php echo tgl_indo($data->tgl_pergi);?></td>
                    <td><?php echo $data->hari?></td>
   


 
                  </tr>
                        <?php }?>
                </tbody>
              </table>
                Total Peserta Kegiatan: <?php echo $i++ - 1;?>  
                             <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Cari Lagi</button>
                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Print</button
               
            </div><!-- /.col -->
          </div><!-- /.row -->

                    </section>

            </div><!-- /.col -->
            </section>
          </div><!-- /.row -->
</div>