  <script type="text/javascript">
          $(document).ready(function(){


     $('#chosen_select3').chosen({allow_single_deselect:true, width:"200px", search_contains: true});

           
	
        });
        
         $(document).ready(function () {
                
                $('#example1').datepicker({
                    format: "dd/mm/yyyy"
                });  
            
            });
        </script>
    
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h2 class="page-header">
                <i class="fa fa-globe" center></i> Laporan kegiatan pegawai per periode 
          </h2>
        </section>

        <!-- Main content -->
        <section class="invoice">
          <!-- title row -->
          <div class="row">
              <div class="col-xs-12">
               
            <form action="<?php echo base_url('index.php/laporankegiatan/select_by_date_range')?>" method=POST>
                
                               <label class="control-label col-md-3"></label>
                                                          
                                                              
                                                          

                                                         <select type=text  name="nama" class="form-control" id="chosen_select3">
                                            <option>- Pilih Pegawai -</option>
                                            <?php foreach($showpegawai as $pegawai){
                                                    echo '<option value="'.$pegawai->nama.'">'.$pegawai->nama.'</option>';
                                            } ?>
                                    </select>
                  
          
         Dari Tanggal <input type=date name=date_from > Hingga Tanggal<input type=date name=date_to> <input type=submit value="cari">
            </form>
                     
                

                                    
           </div><!-- /.col -->
          </div>
          <!-- info row -->
         


        
            
            </section>
          </div><!-- /.row -->