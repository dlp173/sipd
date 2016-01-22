
<?php

       $i=1;
foreach ($editrincianprintnormative as $data) 
    
{
  ?>
        



<?php }?>
 

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        
                     
        
        
        
        <form action="#" id="form" class="form-horizontal"> 
        <section class="content-header">
               
            
        <input hidden="true" name="id" value="<?php echo $data->id;?>">
           
           
               
               <input hidden="true" name="statusbiaya" value="1">
         
          <h1>
       <i class="fa fa-globe"></i> 
       Rincian Biaya Perjalanan Dinas 
           [<?php echo $data->tipekegiatan?>] [No.Lampiran : <?php echo $data->no_lampiran?>] 
       [SATKER : <?php echo $data->satker?>] <small class="pull-right">Tanggal hari ini: 2/10/2014</small>
          </h1>
        
        </section>

    
        <section class="invoice">
          <!-- title row -->
          <div class="row">
              
            <div class="col-xs-12">
             
                <i class="fa fa-bank"></i> Pilih Program biaya yang digunakan 
               
                      </div><!-- /.col -->
          </div>
          <div class="page-header"> <div class="row">
              <div class="col-xs-2 table-responsive"> <input name='pegawai_id' hidden="true" value="<?php echo $data->idpegawai;?>">
                     
                            <select name="biaya_satker_id" class="form-control" id="chosen_select">
                                            <option> - Pilih Satker - </option>
                                            <?php foreach($showsatker as $satker){
                                                    echo '<option value="'.$satker->idsatker.'">'.$satker->satker.'</option>';
                                            } ?>
                            </select>
              </div>
               <div class="col-xs-2 table-responsive"> 
               
                             <select name="biaya_program_id" class="form-control" id="chosen_select">
                                        <option>- Pilih program- </option>
                                        <?php foreach($showprogram as $satker){
                                                echo '<option value="'.$satker->idprogram.'">'.$satker->namaprogram.'</option>';
                                        } ?>
                            </select>
                   
              </div>
                  
                  
               <div class="col-xs-2 table-responsive"> 
                            <select name="biaya_kegiatan_id" class="form-control" id="chosen_select">
                                    <option>- Pilih Kegiatan- </option>
                                    <?php foreach($showkegiatan as $satker){
                                            echo '<option value="'.$satker->idkegiatan.'">'.$satker->namakegiatan.'</option>';
                                    } ?>
                            </select> 
		</select>
              </div>
                <div class="col-xs-2 table-responsive"> 
                    <input readonly=""/>
                    </div>
                </div>         </div>
          
          <br>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Info Kegiatan
              <address>
                 <input name='satker_id' value="<?php echo $data->satker_id;?>" hidden="true">   
                <input name='program_id' value="<?php echo $data->program_id;?>" hidden="true">      
                <input name='kegiatan_id' value="<?php echo $data->kegiatan_id;?>" hidden="true">
                <input name='subkegiatans_id' value="<?php echo $data->subkegiatans_id;?>" hidden="true">

                <strong><?php echo $data->namasubkegiatans;?></strong><br>
                  Kota Tujuan : <?php echo $data->kotatujuan ?><br> 
                  Tanggl Berangkat : <?php echo tgl_indo($data->tgl_pergi);?> </br>
                  Tanggl Pulang : <?php echo tgl_indo($data->tgl_pulang);?>  </br>
                  Total Hari : <?php echo $data->hari?> Hari  </br>
                          
              </address>
            </div><!-- /.col -->
            
            <div class="col-sm-4 invoice-col">
              Info Data Pegawai
              <address>
                <strong><?php echo $data->nama ?></strong><br>
                Nip : <?php echo $data->nip ?><br>
                Gol : <?php echo $data->golongan ?> - <?php echo $data->gol_ruang ?><br>
                Jabatan : <?php echo $data->jabatan ?><br>
              </address>
            </div><!-- /.col -->
            <div class="col-sm-4 invoice-col">
              <b>Pejabat Pembuat Komitmen <?php echo $data->no_lampiran?></b><br>
              <br>
              <b>Bendahara:</b> 4F3S8J<br>
              <b>Tanggal dibuat</b> 2/22/2014<br>
             </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Table row -->
          
                  <div>
            <div class="col-xs-12 table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Rincian Biaya</th>
                    <th>Nominal (Rp.)</th>
                    <th>Hari</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                 
                     <tr>
                         <?php

       $i=1;
foreach ($editsqlricianbiayapegawai as $dataa) 
    
{
  ?>
        
<?php }?>                  <?php


                                if ($dataa->kotaidbiaya === $dataa->kota_id && $dataa->tipekegiatan === 'Dalam Kota')
                                {

                                    echo "<td> <input  hidden='true' type='number' name='biayaharian_id' value=$dataa->kotaidbiaya readonly>   Biaya Harian </td> "
                                            . "<td>  <input  hidden='true' name='tipekegiatan' value=$dataa->tipekegiatan >"
                                            . "<input type='number' name='biayaharian' value=$dataa->dalamkota readonly> </td>"
                                            . "<td><input type='number' value=$dataa->hari  readonly> </td> <td> "
                                            . "<input name='totalbiayaharian' type='number' value=$dataa->totalharian readonly> </td>" ;
                                 }  elseif ($dataa->kotaidbiaya == $dataa->kota_id && $dataa->tipekegiatan == 'Luar Kota')
                                {
                                            echo "<td> <input hidden='true' name='tipekegiatan' value=$dataa->tipekegiatan > "
                                                    . "<input hidden='true' type='number' name='biayaharian_id' value=$dataa->kotaidbiaya readonly> Biaya Harian </td>"
                                                    . "<td> <input name='biayaharian' type='number' value=$dataa->luarkota readonly> </td>  "
                                                    . "<td><input type='number' value=$dataa->hari  readonly></td>  " 
                                                    . "<td><input type='number' value=$dataa->totalharianluar  readonly> </td> "  ;


                                }
                                elseif($dataa->kotaidbiaya === $dataa->kota_id && $dataa->tipekegiatan === 'Diklat')
                                {


                                    echo "<td> <input hidden='true' name='tipekegiatan' value=$dataa->tipekegiatan > "
                                            . "<input hidden='true' type='number' name='biayaharian_id' value=$dataa->kotaidbiaya readonly> Biaya Harian</td> "
                                            . "<td> <input name='biayaharian' type='number' value=$dataa->diklat readonly> "
                                            . "<td><input type='number' value=$dataa->hari  readonly></td>   " 
                                            . "<td><input type='number' value=$dataa->totalhariandiklat  readonly> </td> "  ;


                                }




                                ?>
                                <?php ;?>
                     
                          </tr>
                  
                     <tr> 
                      <?php 
                      // jika kotanya bangka dan tipe keigaiatan Luar kota maka biaya taxi tidak ada, ubah subkategori id 2 pada no kota_id nya menjadi dari 1 ke 2 malah nama pegawai id 1 tidak muncul
                      if
                      ($dataa->kota_id != 2 && $dataa->kotaidbiaya != 2 && $dataa->tipekgiatan ='diklat')
                      {
                          
                          echo "<tr><td>Biaya Taxi Bandara Depati Amir (PP)</td>  <td> <input name='totalbiayataksi' type='number'  value=$dataa->biayainap></td>
                       <td> <input type='number' ng-model='price'> </td><td> </td></tr><tr>
                       <td>Biaya Taxi $dataa->kota (PP)</td>  <td> <input type='number'  value=$dataa->biayainap></td>
                       <td> <input type='number' ng-model='price'> </td></tr>
                       <tr>
 <td>Transport $dataa->kota - $dataa->kota + Bording Pass </td>  <td> <input name='biayatiketpergi' type='number'   value=0> </td>
                       <td> </td><td> </td><td> </td>
                          </tr> <tr>
                          <td>Transport $dataa->kota - $dataa->kota + Bording Pass </td>  <td> <input name='biayatiketpulang' type='number'  value=0> </td>
                       <td> </td></tr>
                      ";     
                      }
                    
                          
                      ?>
                      
                          </tr> 
                  <tr> 
                       <td>Biaya Penginapan </td>  
                       <td> 
                            <input class="a2" name="biayainap" onkeyup="hitung2();"  type="number"  value="<?php echo $dataa->biayainap;?>" readonly /> </td>
                                             
                           <input hidden="true" name="biayainap_id" value="<?php echo $dataa->biayainap_id;?>" type="text" readonly />
                            <input class="a2" name="biayainap" onkeyup="hitung2();" hidden="true" type="number"  value="<?php echo $dataa->biayainap;?>" readonly /> </td>
                            <td> <input class="b2" name="hariinap" onkeyup="hitung2();"  type="number"  value=0 /> </td> 
                              
                            <td> <input class="c2" name="totalbiayainap" type="text" readonly /></td>
                       </tr> 
                            <tr> 
                       <td>Biaya Tanpa Penginapan </td>  
                       <td> <input hidden="true"class="a3" name="biayainap" onkeyup="hitung3();"  type="number"  value="<?php echo $dataa->biayainap;?>" readonly /> </td>
                            <td> <input class="b3" name="haritanpainap" onkeyup="hitung3();"  type="number"  value=0 /> </td> 
                           
                            <td> <input class="c3" name="biayatanpainap" type="text" readonly /></td>
                       </tr> 
                                                
                           <tr> 
                               <?php 
                               if ($dataa->jabatan == 'Kakanwil')
                               {
                                 echo " <td>Biaya Representative</td>  <td>  <input name='biayarep' value=$dataa->biayainap ></td><td> </td><td> </td>
                       <td> 
                          </tr> ";
                               }
                              
                               ?>
                           </tr>
                         
                  
                </tbody>
              </table>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <p class="lead">Catatan : </p>
             
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
             Pilih Biaya yang akan digunakan terlebih 
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Pembayaran Tanggal : 25 Oktober 2015 </p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                       
                                
                    <th style="width:50%">Total Biaya</th>
                     <td><input class="totalbiayakeseluruhan" name="totalbiaya" type="text" readonly /></td>
                  </tr>
                 
                </table>
              </div>
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- this row will not appear when printing -->
          <div class="row no-print">
            <div class="col-xs-12">
                 
<a href="<?php echo base_url('index.php/rencanabiaya/biayakegiatans/' .$data->idkegiatan);?>" class="btn btn-danger pull-right"> <i class="fa fa-credit-card"></i> Batal</a>


            
              <button type="button" id="btnSave" onclick="save()" class="btn btn-primary pull-right" style="margin-right: 5px;"> <i class="fa fa-save"></i> Simpan</button>
              
            </div>
          </div>
        </section><!-- /.content -->
        <div class="clearfix"></div>
    </form>
      </div><!-- /.content-wrapper -->
     

     

<script>
    $(document).ready(function() {
$('#submit').click(function(e) {
// Initializing Variables With Form Element Values
var firstname = $('#firstname').val();
var addr = $('#addr').val();
var zip = $('#zip').val();
var state = $('#state').val();
var username = $('#username').val();
var email = $('#email').val();
// Initializing Variables With Regular Expressions
var name_regex = /^[a-zA-Z]+$/;
var email_regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
var add_regex = /^[0-9a-zA-Z]+$/;
var zip_regex = /^[0-9]+$/;
// To Check Empty Form Fields.
if (firstname.length == 0) {
$('#head').text("* All fields are mandatory *"); // This Segment Displays The Validation Rule For All Fields
$("#firstname").focus();
return false;
}
// Validating Name Field.
else if (!firstname.match(name_regex) || firstname.length == 0) {
$('#p1').text("* For your name please use alphabets only *"); // This Segment Displays The Validation Rule For Name
$("#firstname").focus();
return false;
}
// Validating Username Field.
else if (!(username.length >= 6 && username.length <= 8) || username.length == 0) {
$('#p2').text("* Please enter between 6 and 8 characters *"); // This Segment Displays The Validation Rule For Username
$("#username").focus();
return false;
}
// Validating Email Field.
else if (!email.match(email_regex) || email.length == 0) {
$('#p3').text("* Please enter a valid email address *"); // This Segment Displays The Validation Rule For Email
$("#email").focus();
return false;
}
// Validating Select Field.
else if (state == "Please Choose") {
$('#p4').text("* Please Choose any one option"); // This Segment Displays The Validation Rule For Selection
$("#state").focus();
return false;
}
// Validating Address Field.
else if (!addr.match(add_regex) || addr.length == 0) {
$('#p5').text("* For Address please use numbers and letters *"); // This Segment Displays The Validation Rule For Address
$("#addr").focus();
return false;
}
// Validating Zip Field.
else if (!zip.match(zip_regex) || zip.length == 0) {
$('#p6').text("* Please enter a valid zip code *"); // This Segment Displays The Validation Rule For Zip
$("#zip").focus();
return false;
} else {
alert("Form Submitted Successfuly!");
return true;
}
});
});
    
function hitung2() {
    var biayainap = $(".a2").val();
    var hariinap = $(".b2").val();
    totalbiayainap = biayainap * hariinap; //a kali b
    $(".c2").val(totalbiayainap);
    }
    
    function hitung3(){
        
        var biayainap = $(".a3").val();
        var haritanpainap = $(".b3").val();
        biayatanpainap = (biayainap * haritanpainap)*0.3;
        $(".c3").val(biayatanpainap);
    }
    
    function totalbiaya(){
        
        var total
       $(".c4").val(biayatanpainap);
        
        
    }
    
    function add_rencanabiaya()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
    //  $('#modal_form').modal('show'); // show bootstrap modal
     // $('.modal-title').text('Tambah Peserta Kegiatan '); // Set Title to Bootstrap modal title
     //  $('#chosen_multi_select').chosen({allow_single_deselect:true, width:"200px", search_contains: true});
    }
    
    function edit_cetaksurattugas(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals

      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ceetaksurattugas/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
           
            $('[name="id"]').val(data.id);
            $('[name="pegawai_id"]').val(data.pegawai_id);
            $('[name="subkegiatans_id"]').val(data.subkegiatans_id);
            $('[name="status_karyawan"]').val(data.status_karyawn);
            
            
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Surattugas'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

    function save()
    {
      
      var url;
      save_method = 'add';
      if(save_method == 'add') 
      {
        url = "<?php echo site_url('Rencanabiaya/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('rencanabiaya/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
             //  $('#modal_form').modal('hide');
              // reload_table();
              alert('Data berhasil dimasukkan');
             window.location = '<?php echo base_url('index.php/rencanabiaya/biayakegiatans/' .$data->idkegiatan);?>';


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

    function delete_cetaksurattugas(id)
    {
      if(confirm('Are you sure delete this data?'))
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('cetaksurattugas/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
         
      }
    }
</script>
   <script src="<?php echo base_url('assets/jquery/jquery-2.1.4.min.js')?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
            <script src="<?php echo base_url('assets/chosen/chosen.jquery.min.js')?>"></script>
<script src="<?php echo base_url('assets/a/chosen/gofrendi.chosen.ajaxify.js')?>"></script>
<script src="<?php echo base_url('assets/a/chosen/jquery-1.11.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/chosen/jquery.chained.js')?>"></script>
       <link href="<?php echo base_url('assets/a/chosen/chosen.min.css')?>" rel="stylesheet">
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

<script src="<?php echo base_url('assets/date_picker_bootstrap/js/bootstrap-datetimepicker.js')?>"></script>
<script src="<?php echo base_url('assets/date_picker_bootstrap/js/locales/bootstrap-datetimepicker.id.js')?>"></script>


      

    
  