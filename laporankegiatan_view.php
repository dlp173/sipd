  <?php
                       
                        foreach($result_display as $data){
                        
                        }
                    ?>
          
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2 class="page-header">
                <i class="fa fa-globe"></i> Laporan kegiatan pegawai per periode [<?php echo $data->nama;?> | <?php echo $data->nip;?>
                
                 <?php echo tgl_indo($date1);?> hingga <?php echo tgl_indo($date2);?>
                ]
              
                
              </h2>
        </section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
              <div class="col-xs-12">
               
             <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Cari Lagi</button>
         
           </div><!-- /.col -->
          </div>
          <!-- info row -->
         


          <div class="row invoice-info">
           
           <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              <address>
                <strong>Info Data.</strong><br>
                Nama : <?php echo $data->nama;?><br>
                Nip : <?php echo $data->nip;?><br>
                Golongan : <?php echo $data->golongan;?> <b> / </b> <?php echo $data->gol_ruang;?> <br>
                Jabatan : <?php echo $data->jabatan;?><br>
                Satuan Kerja : 
              </address>
            </div><!-- /.col -->
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
          Rincian Kegiatan
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
                    <th>Sub Total biaya</th>
                    <th>Option</th>
           
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $total =0;
                    $totalhari=0;
                       $i=1;
                        foreach($result_display as $data){
                            $total += $data->totalbiaya;
                            $totalhari += $data->hari;
                    ?>
                  <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $data->namasubkegiatans;?></td>
                    <td><?php echo $data->namakota;?></td>
                    <td><?php echo tgl_indo($data->tgl_pergi);?></td>
                    <td><?php echo $data->hari;?></td>
                    <td><?php echo rupiah2($data->totalbiaya);?></td>
                    <td>Detail </td>
                  </tr>
                        <?php }?>
                </tbody>
                <b> <td>Total Kegiatan : <?php echo $i++ - 1;?> </td><td>
                
                [ <?php echo tgl_indo($date1);?> hingga <?php echo tgl_indo($date2);?>
                ]</td>  <td></td> <td>Total Hari : <?php echo $totalhari;?></td> <td>Total Biaya </td><td><?php echo rupiah2($total);?></td><td></td> </b> <br>
          
              </table>
                <form action="<?php echo base_url('index.php/laporankegiatan/select_by_date_range_print')?>" target="_blank"method=POST>  
                    <input hidden="true" type=date name=date_from value="<?php echo $date1;?>" > 
                    <input hidden="true"type=date name=date_to value="<?php echo $date2;?>">
                    <input hidden="true"type=text name=nama value="<?php echo $data->nama;?>">
                <!-- <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Print</butto>
                    --> 
                     <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-print"></i> Print </button>
                 </form>
            </div><!-- /.col -->
          </div><!-- /.row -->

        
            </div><!-- /.col -->
            </section>
          </div><!-- /.row -->
</div>