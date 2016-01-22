<html>
    <head>
  <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
            <script src="<?php echo base_url('assets/chosen/chosen.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/a/chosen/gofrendi.chosen.ajaxify.js')?>"></script>
<script src="<?php echo base_url('assets/a/chosen/jquery-1.11.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/chosen/jquery.chained.js')?>"></script>
       <link href="<?php echo base_url('assets/a/chosen/chosen.min.css')?>" rel="stylesheet">
<script type="text/javascript">
          $(document).ready(function(){
            $('#chosen_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
           
            $("#series").chained("#mark");
              $('#series,#mark').chosen({width: '300px'})

                    $('#series, #mark').on('change', function(){
                        $('#series, #mark').trigger('chosen:updated');
                });

        </script>
    </head>
    <body>
   peserta kegiatan
           <form action="<?php echo base_url('index.php/surat/ajax_surat');?>" method="post" enctype="multipart/form-data">
            <select name="pegawai_id[]"id="chosen_multi_select" multiple>
                <?php foreach($showpeg as $each){ ?>
                                        <option value="<?php echo $each->id; ?>"> <?php echo $each->nama; ?> </option>;
                                    <?php } ?>
               
            </select>
        <input type="submit" value="simpan" />
        
        
         <select id="mark" name="mark">
  <option value="">--</option>
  <option value="bmw">BMW</option>
  <option value="audi">Audi</option>
</select>
<select id="series" name="series">
  <option value="">--</option>
  <option value="series-3" class="bmw">3 series</option>
  <option value="series-5" class="bmw">5 series</option>
  <option value="series-6" class="bmw">6 series</option>
  <option value="a3" class="audi">A3</option>
  <option value="a4" class="audi">A4</option>
  <option value="a5" class="audi">A5</option>
</select>
    </form>
        <script type="text/javascript" src="../jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="../chosen/chosen.jquery.min.js"></script>
        <script type="text/javascript" src="../gofrendi.chosen.ajaxify.js"></script>
        <script type="text/javascript">
            $('#chosen_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
            $('#chosen_multi_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});

            $('#ajax_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
            chosen_ajaxify('ajax_select', 'server.php?keyword=');

            $('#ajax_multi_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
            chosen_ajaxify('ajax_multi_select', 'server.php?keyword=');
        </script>
    </body>
</html>
