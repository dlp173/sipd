<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        <!-- Content Header (Page header) -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              
             
                    
        
              <div class="box">
                 <div class="box-header">
                  <h3 class="box-title">        <div class="panel-heading">Rincian Biaya Kegiatan  </p> </b></div>  </div><!-- /.box-header -->
                   
                 
                    <div class="box-body">
    
  

                  
                   
 
                   

                          <table class="table table-bordered">


                              <thead>
                          <tr>
                  <th >No</th>


                  <th>Nama Kegiatan</th>
      
                  <th>Option</th>
                  </tr>
                      </thead>

                  <?php



                  $i=1;
                  foreach ($query as $data) 
                  {
                    ?>
                      <tbody>
                  <tr> 
                  <td> <?php echo $i++ ?></td>
                  <td> <?php echo $data->namasubkegiatans;?></td>

    
                  <td> 
                      <a href="<?php echo base_url('index.php/rencanabiaya/biayakegiatans/'  .$data->id) ?>" class="btn btn-primary">Detail Kegiatan</a> 

                  </tr> 

                  <?php }

                  ?>
                  </tbody></table>


      </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
   <script src="<?php echo base_url('assets/chosen/chosen.jquery.min.js')?>"></script>
  <script src="<?php echo base_url('assets/a/chosen/gofrendi.chosen.ajaxify.js')?>"></script>
<script src="<?php echo base_url('assets/a/chosen/jquery-1.11.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/chosen/jquery.chained.js')?>"></script>
       <link href="<?php echo base_url('assets/a/chosen/chosen.min.css')?>" rel="stylesheet">


<script src="<?php echo base_url('assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js')?>"></script>
<script src="<?php echo base_url('assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js')?>"></script>
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
    
   


