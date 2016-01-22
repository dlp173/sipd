  <script type="text/javascript">
          $(document).ready(function(){


     $('#chosen_select3').chosen({allow_single_deselect:true, width:"200px", search_contains: true});

           
	
        });
        </script>
    
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2 class="page-header">
                <i class="fa fa-globe" center></i> Laporan kegiatan per periode 
          </h2>
        </section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
              <div class="col-xs-12">
               
            <form action="<?php echo base_url('index.php/laporankegiatan/periodefilterkegiatan')?>" method=POST>
                
                
          
         Dari Tanggal <input type=date name=date_from> Hingga Tanggal<input type=date name=date_to> <input type=submit value="cari">
            </form>
                     
                

                                    
           </div><!-- /.col -->
          </div>
          <!-- info row -->
         


        
            
            </section>
          </div><!-- /.row -->