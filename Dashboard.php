<!DOCTYPE html>

    <body class="skin-blue">
      

            
                                         
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>MONITORING DATA</small> 
            <small class="pull-right"> 
            
            
             <form action="<?php echo base_url('index.php/laporankegiatan/filterkegiatan')?>" method=POST>
                
                
          
        Start Date <input type=date name=date_from> End Date <input type=date name=date_to> <input type=submit value="cari">
            </form>
                     
            
            
            
            
            </small>
          </h1>
           
        
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Rekap Bulanan Perjalanan Dinas Tahun                
              <?php
$tgl = date('Y');
echo $tgl; 
?>  
      </h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->

             <div class="box-body">
                  <div class="row">
                    <div class="col-md-8">
                            
                      <div id="chart"></div>
                       
<!--                            <?php 
        
                 $this->load->model('program_model');  
                $this->load->helper('url');
                $this->load->helper('tglindonesia');
		$list = $this->program_model->getalldata();
              

		foreach ($list as $program) {
			

    echo  $program->satker ;
    echo  $program->idprogram;
    echo  $program->namaprogram;
        rupiah2($program->nominalprogram);
                }
        
        ?>
                    </div><!-- /.col -->
                  
                  </div><!-- /.row -->
                </div><!-- ./box-body -->
            
              </div><!-- /.box -->
       <!--   <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Striped Full Width Table</h3>
                </div><!-- /.box-headers
                <div class="box-body no-padding">
                  <table class="table table-striped">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th style="width: 40px">Label</th>
                    </tr>
                    <tr>
                      <td>1.</td>
                      <td>Update software</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-red">55%</span></td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Clean database</td>
                      <td>
                        <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-yellow" style="width: 70%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-yellow">70%</span></td>
                    </tr>
                    <tr>
                      <td>3.</td>
                      <td>Cron job running</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-primary" style="width: 30%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-light-blue">30%</span></td>
                    </tr>
                    <tr>
                      <td>4.</td>
                      <td>Fix and squish bugs</td>
                      <td>
                        <div class="progress progress-xs progress-striped active">
                          <div class="progress-bar progress-bar-success" style="width: 90%"></div>
                        </div>
                      </td>
                      <td><span class="badge bg-green">90%</span></td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
 </section><!-- /.content -->
</div><!-- /.content-wrapper -->
  
</body> 
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
<s
    <!-- Bootstrap 3.3.5 -->
  
    <!-- FastClick -->
    <script src="<?php echo base_url('assets/admin/plugins/fastclick/fastclick.min.js')?>"></script>
    <!-- AdminLTE App -->
   <script src="<?php echo base_url('assets/admin/plugins/sparkline/jquery.sparkline.min.js')?>"></script>
    <!-- Sparkline -->
 <script src="<?php echo base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
    <!-- jvectormap -->
 <script src="<?php echo base_url('assets/admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>

    <!-- SlimScroll 1.3.0 --><script src="<?php echo base_url('assets/admin/plugins/slimScroll/jquery.slimscroll.min.js')?>"></script>

    <!-- ChartJS 1.0.1 -->
    <script src="<?php echo base_url('assets/admin/plugins/chartjs/Chart.min.js')?>"></script>
     <script src="<?php echo base_url('assets/admin/dist/js/pages/dashboard2.js')?>"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   
    <!-- AdminLTE for demo purposes -->
                                 
<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/highcharts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/modules/exporting.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/highcharts/themes/skies.js"></script>
<script type="text/javascript">                                                                               
jQuery(function(){
	new Highcharts.Chart({
		chart: {
			renderTo: 'chart',
			type: 'line',
		},
		title: {
			text: 'Pengeluaran SPD ',
			x: -20
		},
		subtitle: {
			text: 'Total Pengeluaran Biaya Perjalanan Dinas',
			x: -20
		},
		xAxis: {
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun',
                    'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des']
		},
		yAxis: {
			title: {
				text: 'Pengeluaran SPD (Rp)'
			}
		},
		series: [

                
                
                {
			name: 'Pengeluaran SPD (Rp)',
			data: <?php echo json_encode($grafik); ?>
		},
 
    ]
	});
}); 

     

</script> 
             
<style>
		#chart
		{
			z-index:-10;
		}
		
</style>

	 
                

      