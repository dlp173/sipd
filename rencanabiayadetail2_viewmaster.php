
<?php

       $i=1;
foreach ($sqlricianbiayapegawai as $data) 
    
{
  ?>
        



<?php }?>
 

 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        
        
                     <section class="content-header">
        
        
        
        <form action="#" id="form" class="form-horizontal"> 
        <section class="content-header">
                 <?php

       $i=1;
foreach ($suratid as $dataa) 
    
{
  ?>
        

            
  
        <!-- Main content -->
        <?php }?>

            
        <input hidden="true" name="id" value="<?php echo $dataa->id;?>">
           
           
               
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
               
                            <select name="biaya_satker_id" class="form-control" id="satker">
                                            <option> - Pilih Satker - </option>
                                            <?php foreach($showsatker as $satker){
                                                    echo '<option value="'.$satker->idsatker.'">'.$satker->satker.'</option>';
                                            } ?>
                            </select>
              </div>
               <div class="col-xs-2 table-responsive"> 
               
                             <select name="biaya_program_id" class="form-control" id="program">
                                       <option value=''>Select Kabupaten</option>
                            </select>
                   
              </div>
                  
                  
               <div class="col-xs-2 table-responsive"> 
                            <select name="biaya_kegiatan_id" class="form-control" id="kegiatans" >
                                    <option value=''>Select Kegiatan</option>
                            </select> 
		</select>
              </div>
                  Mata Anggagran Yang digunakan <br>
                  No Bukti <br>
                  Akun <br>
                  <div class="col-xs-2 table-responsive"> 
                            <select name="biaya_kegiatan_id" class="form-control" id="kegiatans" >
                                    <option value=''>Select Kegiatan</option>
                            </select> 
		</select>
              </div>
                <div class="col-xs-2 table-responsive"> 
                       
                   <select name="biaya_kegiatan_id" class="c12" id="anggarans" >
                        <option value=''> Anggaran Kegiatan</option>
                                     </select> 
                                
                          
                           
                    </div>
                </div>         </div>
          
          <br>
          <!-- info row -->
          <div class="row invoice-info">
            <div class="col-sm-4 invoice-col">
              Info Kegiatan
              <address>
                  <input name='satker_id' value="<?php echo $data->idsatker;?>" hidden="true">   
                <input name='program_id' value="<?php echo $data->idprogram;?>" hidden="true">      
                <input name='kegiatan_id' value="<?php echo $data->idkegiatans;?>" hidden="true">
                <input name='subkegiatans_id' value="<?php echo $data->idkegiatan;?>"hidden="true">

                <strong><?php echo $data->namasubkegiatans;?></strong><br>
                  Kota Tujuan : <?php echo $data->kotatujuan ?><br> 
                  Tanggl Berangkat : <?php echo $data->tgl_pergi?> </br>
                  Tanggl Pulang : <?php echo $data->tgl_pulang?>  </br>
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

                                  // kotaidbiaya adalah kota_id pada table biaya harian
                                  // idsubkotatujuan adalah pulang_kota_id pada table tsubkegiatans.
                                if ($data->kotaidbiaya === $data->idsubkotatujuan && $data->tipekegiatan === 'Dalam Kota')
                                {

                                    echo "<td> <input  hidden='true' type='number' name='biayaharian_id' value=$data->kotaidbiaya readonly>   Biaya Harian </td> "
                                            . "<td>  <input  hidden='true' name='tipekegiatan' value=$data->tipekegiatan >"
                                            . "<input type='number' name='biayaharian' value=$data->dalamkota readonly> </td>"
                                            . "<td><input type='number' class='jumlahhari' value=$data->hari  readonly> </td> <td> "
                                            . "<input class='c6' name='totalbiayaharian' type='number' value=$data->totalharian readonly> </td>" ;
                                 }  elseif ($data->kotaidbiaya == $data->idsubkotatujuan && $data->tipekegiatan == 'Luar Kota')
                                {
                                            echo "<td> <input hidden='true' name='tipekegiatan' value=$data->tipekegiatan > "
                                                    . "<input hidden='true' type='number' name='biayaharian_id' value=$data->kotaidbiaya readonly> Biaya Harian </td>"
                                                    . "<td> <input name='biayaharian' type='number' value=$data->luarkota readonly> </td>  "
                                                    . "<td><input type='number' value=$data->hari  readonly></td>  " 
                                                    . "<td><input name='totalbiayaharian' type='number' class='c6' value=$data->totalharianluar  readonly> </td> "  ;


                                }
                                elseif($data->kotaidbiaya === $data->idsubkotatujuan && $data->tipekegiatan === 'Diklat')
                                {


                                    echo "<td> <input hidden='true' name='tipekegiatan' value=$data->tipekegiatan > "
                                            . "<input hidden='true' type='number' name='biayaharian_id' value=$data->kotaidbiaya readonly> Biaya Harian</td> "
                                            . "<td> <input name='biayaharian' type='number' value=$data->diklat readonly> "
                                            . "<td><input type='number' value=$data->hari  readonly></td>   " 
                                            . "<td><input name='totalbiayaharian' type='number' class='c6' value=$data->totalhariandiklat  readonly> </td> "  ;


                                }




                                ?>
                                <?php ;?>
                     
                          </tr>
                  
                     <tr> 
                      <?php 
                      // jika kotanya bangka dan tipe keigaiatan Luar kota maka biaya taxi tidak ada, ubah subkategori id 2 pada no kota_id nya menjadi dari 1 ke 2 malah nama pegawai id 1 tidak muncul
                      if
                      ($data->idkotatujuan != 2)
                      {
                          
                          echo "<tr><td>Biaya Taxi Bandara Depati Amir (PP)</td> <td> </td><td> </td> <td> <input name='totalbiayataksi' class='c9' onkeyup='hitung2();' type='number'  value=0></td>
                       </td></tr><tr>
                       <td>Biaya Taxi $data->kotatujuan (PP)</td><td> </td><td> </td>  <td> <input class='c10' name='totalbiayataksidepatiamir' onkeyup='hitung2();' type='number'  value=0></td>
                       </tr>
                       <td> <input class='c11' name ='biayarill' type='number' onkeyup ='hitung2();'  value=0 hidden='true'></td>;
                       <tr>
 <td>Transport $data->kota - $data->kotatujuan + Bording Pass </td><td> </td><td> </td>  <td> <input class='c7' onkeyup='hitung2();'  name='biayatiketpergi' type='number'   value='0'> </td>
                        </td>
                          </tr> <tr>
                          <td>Transport $data->kotatujuan - $data->kota + Bording Pass </td><td> </td><td> </td>  <td> <input class='c8' onkeyup='hitung2();' name='biayatiketpulang' type='number'  value='0'> </td>
                       </tr>
                      ";     
                      }elseif
                      ($data->idkotatujuan == 2 && $data->tipekegiatan == 'Luar Kota')
                      {
                          
                          echo "<input hidden ='true'class='c9'  onkeyup='hitung2();' type='number'  value=0></td>"
                          . "<input hidden ='true'class='c8'  onkeyup='hitung2();' type='number'  value=0></td>"
                          ."<input hidden ='true'class='c7'  onkeyup='hitung2();' type='number'  value=0></td>"
                                  ."<input hidden ='true'class='c10'  onkeyup='hitung2();' type='number'  value=0></td>"
                                  . "<td>Biaya Transport Luar Kota ($data->kotatujuan)</td> <td> </td><td> </td> <td> <input class='c11' name ='transportluarkotamasihbangka' type='number' onkeyup ='hitung2();'  value=$data->biayainap></td>";
                          
                      }
                      else if ($data->idkotatujuan == 2 && $data->tipekegiatan == 'Dalam Kota'){
                          
                          
                          
                      }
                    
                          
                      ?>
                      
                          </tr> 
                  <tr> 
                       <td>Biaya Penginapan </td>  
                       <td> 
                            <input class="a2" name="biayainap" onkeyup="hitung2();"  type="number"  value="<?php echo $data->biayainap;?>" readonly /> </td>
                                             
                           <input hidden="true" name="biayainap_id" value="<?php echo $data->biayainap_id;?>" type="text" readonly />
                            <input class="a2" name="biayainap" onkeyup="hitung2();" hidden="true" type="number"  value="<?php echo $data->biayainap;?>" readonly /> </td>
                            <td> <input class="b2" name="hariinap" onkeyup="hitung2();"  type="number"  value=0 /> </td> 
                              
                            <td> <input class="c2" name="totalbiayainap" type="number" readonly /></td>
                       </tr> 
                            <tr> 
                       <td>Biaya Tanpa Penginapan </td>  
                       <td> <input hidden="true"class="a3" name="biayainap" onkeyup="hitung2();"  type="number"  value="<?php echo $data->biayainap;?>" readonly /> </td>
                            <td> <input class="b3" name="haritanpainap" onkeyup="hitung2();"  type="number"  value=0 /> </td> 
                           
                            <td> <input class="c3" name="biayatanpainap" type="number" value=0 readonly /></td>
                             
                       </tr> 
                                                
                           <tr> 
                               <?php 
                               if ($data->jabatan == 'Kakanwil')
                               {
                                 echo " <td>Biaya Representative</td></td><td> </td><td>  <td>  <input class='c5' name='biayarep' value=$data->biayainap > </td>
                       <td> 
                          </tr> ";
                               }else{
                                   
                                   echo " <input hidden=true class='c5' name='biayarep' value=0 > ";
                                   
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
                <p class="lead">Catatan :  Sisa Anggaran <input class="sisaanggaran" name="sisaanggasran" onkeyup="hitung3();" readonly="true" type="number"  value=0 /> </p>
             
              <p id="anggaran" class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
             Pilih Biaya yang akan digunakan terlebih 
              </p>
            </div><!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Pembayaran Tanggal : 25 Oktober 2015  </p>
              <div class="table-responsive">
                <table class="table">
                  <tr>
                       
                                
                    <th style="width:50%">Total Biaya</th>
                    <td><input class="c4" name="totalbiaya" readonly="true" type="text" value=0 /></td>
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
        
    </form></section><!-- /.content -->
        <div class="clearfix"></div>
      </div><!-- /.content-wrapper -->
   
   
            
       
     

<script>
    
    $(document).ready(function(){




            $("#satker").change(function (){
                var url = "<?php echo site_url('rencanabiaya/add_ajax_program');?>/"+$(this).val();
                $('#program').load(url);
                return false;
            })
			
			$("#program").change(function (){
                var url = "<?php echo site_url('rencanabiaya/add_ajax_kegiatans');?>/"+$(this).val();
                var x = "<?php echo site_url('rencanabiaya/add_ajax_anggaran');?>/"+$(this).val();
                $('#kegiatans').load(url);
                     $('#anggarans').load(x);
                return false;
            })
			 
			$("#kegiatans").change(function (){
              
                var x = "<?php echo site_url('rencanabiaya/add_ajax_anggaran');?>/"+$(this).val();
        
                     $('#anggarans').load(x);
                return false;
            })
        });
    
    
function hitung2() {

    var biayainap = $(".a2").val();
    var hariinap = $(".b2").val();
    var biayainap = $(".a3").val();
    var haritanpainap = $(".b3").val();
    var biayarep = parseInt($(".c5").val());
    var totalbiayaharian = parseInt($(".c6").val());
  //  var totalbiayatiketpergi = parseInt($(".c7").val());
  //  var totalbiayatiketpulang = parseInt($(".c8").val());
    var totalbiayatiketpergi = parseInt($(".c7").val());
    var totalbiayatiketpulang = parseInt($(".c8").val());
    var totalbiayataksikotatujuan = parseInt($(".c9").val());
    var totalbiayataksidepatiamir = parseInt($(".c10").val());
    var transportluarkotamasihbangka = parseInt($(".c11").val());
    var ab = parseInt($(".c12").val());
    totalbiayainap = biayainap * hariinap; //a kali b
    biayatanpainap = (biayainap * haritanpainap)*0.3;
    totalbiaya =
            totalbiayainap + biayatanpainap 
           + totalbiayaharian 
           + biayarep 
           + totalbiayatiketpergi 
           + totalbiayatiketpulang 
           + totalbiayataksikotatujuan
           + totalbiayataksidepatiamir
           + transportluarkotamasihbangka;
  $(".c2").val(totalbiayainap);
    $(".c3").val(biayatanpainap);
    $(".c4").val(totalbiaya);
    sisa = ab - totalbiaya;
    $(".sisaanggaran").val(sisa);
   
    
    
if (totalbiaya > ab ) {
     document.getElementById("btnSave").disabled = true;
      document.getElementById("anggaran").innerHTML ="<p style='color:red'> Mohon Maaf, Anggaran kegiatan yang anda pilih tidak mencukupi. Silahkan pilih program biaya yang digunakan </p>";
     
} else 
{
    
  document.getElementById("btnSave").disabled = false;  
  document.getElementById("anggaran").innerHTML ="Anggaran Kegiatan Dapat Digunakan";
   
}
//if (totalhariinap > jumlahhari){
    
  //   document.getElementById("btnSave").disabled = true;
    // document.getElementById("anggaran").innerHTML ="<p style='color:red'> Jumlah Hari Menginap Melebihi Jumlah Hari Kegiatan </p>";
   
    
//}else{
    
  //document.getElementById("btnSave").disabled = false;  
  //document.getElementById("anggaran").innerHTML ="Pilih Program biaya yang digunakan ";
   
//}
        

    
}
     function hitung4(){
    var jumlahhari = parseInt($(".jumlahhari").val());
    var totalhariinap = $(".b2").val() + $(".b3").val();
    var biayainap = $(".a2").val();
    var hariinap = $(".b2").val();
    var biayainap = $(".a3").val();
    var haritanpainap = $(".b3").val();
    var biayarep = parseInt($(".c5").val());
    var totalbiayaharian = parseInt($(".c6").val());
    var transportluarkotamasihbangka = parseInt($(".c11").val());
    totalbiayainap = biayainap * hariinap; //a kali b
    biayatanpainap = (biayainap * haritanpainap)*0.3;
    totalbiaya = totalbiayainap + biayatanpainap + totalbiayaharian + biayarep + transportluarkotamasihbangka;
    $(".c2").val(totalbiayainap);
    $(".c3").val(biayatanpainap);
    $(".c4").val(totalbiaya);
   
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


      

    
  