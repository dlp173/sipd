<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan2_model extends CI_Model {

	var $table = 'tsubkegiatans';
         var $trcb ='terencanabiaya';
           var $tl ='tlaporan';
                    var $ts='tsubkegiatans';
        // ini field dalam table
	var $column = array('nama');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
   

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
            
                       
            $this->db->select('tpegawai.nip as nip,tsubkegiatans.id as id, tsurat.pegawai_id as idpegawai,tpegawai.nama as nama, tgolongan.gol_ruang as gol_ruang,tgolongan.golongan as golongan,tpegawai.jabatan as jabatan');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsurat.subkegiatans_id = tsubkegiatans.id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            
        
            
            
	/* $i = 0;
	
		foreach ($this->column as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}*/
	}


	function get_datatables($id)
	{
		$this->_get_datatables_query();
		//if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
                $this->db->where('tsubkegiatans.id',$id);
		$query = $this->db->get();

		return $query->result();
	}

	function count_filtered($id)
	{
		$this->_get_datatables_query();
                $this->db->where('tsubkegiatans.id',$id);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}

	public function save($data)
	{
            
		$this->db->insert($this->tl,$data);
                return $this->db->insert_id();
	}
 public function laporan($id)
        {
            
            $this->db->select('tlaporan.id as idlap,tpegawai.nip as nip,tsubkegiatans.id as id, tsurat.pegawai_id as idpegawai,tpegawai.nama as nama, tgolongan.gol_ruang as gol_ruang,tgolongan.golongan as golongan,tpegawai.jabatan as jabatan');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsurat.subkegiatans_id = tsubkegiatans.id','inner');
            $this->db->join('tlaporan','tlaporan.subkegiatans_id = tsubkegiatans.id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->where('tsurat.id',$id);
            $sql = $this->db->get();
            return $sql->result();
    
        
            
            
        }
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
public function updatelaporan($where, $laporanid)
	{
		$this->db->update($this->ts, $laporanid, $where);
		return $this->db->affected_rows();
	}
	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
        public function delete_by_id_peserta($id)
	{
		
                
               $this->db->where('id', $id);
		$this->db->delete($this->table);
                return $this->db->affected_rows();;
    	
	}
        public function getsubkegiatans() {
            
            $this->db->select('*');
            $this->db->from('tsubkegiatans');
            
            $query = $this->db->get();
	    return $query->result();
            
        }
        public function getalldata(){
            
            
            $query = $this->db->query('select tsubkegiatans.id as id, tsubkegiatans.laporan_id as laporan_id,tsubkegiatans.namasubkegiatans as namasubkegiatans from tsubkegiatans inner join tsatker on tsubkegiatans.satker_id = tsatker.idsatker
                    inner join tprogram on tsubkegiatans.program_id = tprogram.idprogram
                    inner join tkegiatans on tsubkegiatans.kegiatans_id = tkegiatans.id');
             
            return $query->result();
        /*    $this->db->select('*');
            $this->db->from('tsubkegiatans');
            $this->db->join('tsatker', 'tsubkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tprogram','tsubkegiatans.program_id = tprogram.idprogram','inner');
            $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id','inner');
            $query = $this->db->get();
*/
		
            
        }
         public function details_by_id($id){
      
      
           $this->db->select('tsubkegiatans.id as id,tkota.namakota as kota,tsubkegiatans.tempat as tempat,tprogram.namaprogram as namaprogram, tkegiatans.namakegiatan as namakegiatan,tsubkegiatans.namasubkegiatans ,tsubkegiatans.tgl_pergi as tgl_pergi,
                    tsubkegiatans.tgl_pulang as tgl_pulang,tsatker.satker as satker, tsubkegiatans.tempat as tempat');
            $this->db->from('tsubkegiatans');
            $this->db->join('tsatker', 'tsubkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tprogram','tsubkegiatans.program_id = tprogram.idprogram','inner');
            $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id','inner');
            $this->db->join('tkota','tsubkegiatans.kota_id = tkota.id','inner');
            $this->db->where('tsubkegiatans.id',$id);
            $sql = $this->db->get();

		return $sql->result();
         }
             public function showpegawai(){
        $this->load->database();
        $showpegawai = $this->db->get('tpegawai');
        return $showpegawai->result();
    }
    
    public function details_pegawai($id)
            {
        
        
         $this->db->select('tsubkegiatans.id as id');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsurat.subkegiatans_id = tsubkegiatans.id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
        $this->db->where('tsubkegiatans.id',$id);
            $sql = $this->db->get();

		return $sql->result();
            }
            function printtgs($id){
    
    
            $this->db->select('tsurat.subkegiatans_id as id, tpegawai.nama as nama,tgolongan.golongan as golongan, tpegawai.jabatan as jabatan,tgolongan.gol_ruang as gol_ruang,
                    tpegawai.nip as nip');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsubkegiatans.id = tsurat.subkegiatans_id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->where('tsurat.subkegiatans_id',$id);
    
    
             $sql = $this->db->get();
                     return $sql->result();
    
    
}
    

function printtgskegiatan($id){
    $this->db->distinct('tsubkegiatans.namasubkegiatans,tsubkegiatans.tgl_pergi,tsubkegiatans.tgl_pulang,tsubkegiatans.tempat,tsubkegiatans.no_lampiran');
    $this->db->select('*');
    $this->db->from('tsurat');
    $this->db->join('tsubkegiatans','tsubkegiatans.id = tsurat.subkegiatans_id');
    $this->db->join('tpegawai','tpegawai.id = tsurat.pegawai_id');
    $this->db->join('tgolongan','tpegawai.golongan_id = tgolongan.id');
    $this->db->where('tsurat.subkegiatans_id',$id);
    $sql1 = $this->db->get();
                     return $sql1->result();
    

                



    
    
}


    function rincianbiayanormatif($idsub,$idpeg,$idkota){
        
        $this->db->select('tsurat.subkegiatans_id as idsub, tsurat.pegawai_id as idpeg');
        $this->db->from('tsurat');
        $this->db->join('tsubkegiatans','tsubkegiatans.id = tsurat.subkegiatans_id','inner');
        $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
        $this->db->join('tkota','tsubkegiatans.kota_id = tkota.id','inner');
        $this->db->join('tgolongan','tpegawai.gologngan_id = tgolongan.id','inner');
        $this->db->join('tbiaya','tbiaya.golongan_id = tpegawai.golongan_id','inner');
        $this->db->where('tsurat.subkegiatans_id',$idsub);
        $this->db->where('tsurat.pegawai_id', $idpeg);
        $this->db->where('tbiaya.kota_id',$idkota) ;
            $sqlnormatif = $this->db->get();
                return $sqlnormatif->result();
    

                

        
        
    }
      public function detailsa_by_id($id){
      
      
           $this->db->select('tsubkegiatans.id as id,tkota.namakota as kota,tsubkegiatans.tempat as tempat,tprogram.namaprogram as namaprogram, tkegiatans.namakegiatan as namakegiatan,tsubkegiatans.namasubkegiatans ,tsubkegiatans.tgl_pergi as tgl_pergi,
                    tsubkegiatans.tgl_pulang as tgl_pulang,tsatker.satker as satker, tsubkegiatans.tempat as tempat');
            $this->db->from('tsubkegiatans');
            $this->db->join('tsatker', 'tsubkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tprogram','tsubkegiatans.program_id = tprogram.idprogram','inner');
            $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id','inner');
            $this->db->join('tkota','tsubkegiatans.kota_id = tkota.id','inner');
            $this->db->where('tsubkegiatans.id',$id);
            $sql = $this->db->get();

		return $sql->result();
         }
        
     public function getsurattugas($id){
         
         $this->db->select('tsurat.statusbiaya as statusbiaya,tsurat.id as idsurat,tsurat.statusbiaya as statusbiaya,tsubkegiatans.hari as hari,tsubkegiatans.tgl_pergi as tgl_pergi,tsubkegiatans.tgl_pulang as tgl_pulang,kotatujuan.namakota as kotatujuan,tkota.namakota as kotaberangkat,tsubkegiatans.tempat as tempat,tsubkegiatans.namasubkegiatans as namasubkegiatans,tsubkegiatans.id as idkegiatan,tsurat.subkegiatans_id as id,tpegawai.id as idpegawai,tpegawai.nama as nama,tprogram.namaprogram as namaprogram,tsatker.satker as satker');
         $this->db->from('tsurat');
         $this->db->join('tsubkegiatans','tsubkegiatans.id = tsurat.subkegiatans_id','inner');
         $this->db->join('tpegawai','tpegawai.id = tsurat.pegawai_id','inner');
         $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
         $this->db->join('tsatker','tsatker.idsatker = tsubkegiatans.satker_id','inner');
         $this->db->join('tprogram','tprogram.idprogram = tsubkegiatans.program_id','inner');
         $this->db->join('tkegiatans','tkegiatans.id = tsubkegiatans.kegiatans_id','inner');
         $this->db->join('tkota','tkota.id = tsubkegiatans.kota_id','inner');
         $this->db->join('tkota as kotatujuan','kotatujuan.id = tsubkegiatans.pulang_kota_id','inner');
         $this->db->where('tsurat.subkegiatans_id',$id);
         
         $sqlsurattugas = $this->db->get();
         
         
              return $sqlsurattugas->result();         
     }
     public function detilasrincianbiaya($id){
         
         $this->db->select('tbiaya.biayainap as biayainap,tsubkegiatans.namasubkegiatans as namasubkegiatans,tbiaya.id as idbiaya ,tsubkegiatans.id as id, tpegawai.id as idpegawai,tbiaya.golongan_id as golidbiaya, 
                            tpegawai.golongan_id as golpeg,
                            tgolongan.gol_ruang as ruanggol,
tsubkegiatans.namasubkegiatans as kegiatan,
tbiaya.id as idbiaya,tbiaya.biayainap as biayainap,
tkota.namakota as kota, tpegawai.nama as nama ');
         $this->db->from('tbiaya');
         $this->db->join('tpegawai','tpegawai.golongan_id = tbiaya.golongan_id','inner');
         $this->db->join('tsubkegiatans','tsubkegiatans.kota_id = tbiaya.kota_id','inner');
         $this->db->join('tkota','tkota.id = tsubkegiatans.kota_id','inner');
         $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
       //  $this->db->where(array('tsubkegiatans.id' => $id,'tpegawai.id' => $idpegawai));
         $this->db->where('tsubkegiatans.id',$id);
        // $this->db->where('tpegawai.id',21);
         $sqlrincianbiaya = $this->db->get();
              return $sqlrincianbiaya->result();         
     }
 public function detilasrincianbiayapegawai($idkegiatan,$idpegawai){
         
         $this->db->select('tsatker.satker as satker,tsubkegiatans.no_lampiran as no_lampiran,tgolongan.golongan as golongan,tgolongan.gol_ruang as gol_ruang,tpegawai.nip as nip ,tsubkegiatans.tgl_pergi as tgl_pergi ,tsubkegiatans.tgl_pulang as tgl_pulang,tsubkegiatans.hari as hari,tsubkegiatans.satker_id as idsatker,tsubkegiatans.program_id as idprogram,tsubkegiatans.kegiatans_id as idkegiatans,tpegawai.jabatan as jabatan,tbiayaharian.id as biayainap_id,tbiayaharian.kota_id as kotaidbiaya,tbiayaharian.biayaluarkota as luarkota,tbiayaharian.biayadiklat as diklat, tsubkegiatans.kota_id as kota_id,tbiayaharian.biayadalamkota as dalamkota,(tbiayaharian.biayadalamkota * tsubkegiatans.hari) as totalharian,
             (tbiayaharian.biayaluarkota * tsubkegiatans.hari) as totalharianluar,(tbiayaharian.biayadiklat * tsubkegiatans.hari) as totalhariandiklat,tsubkegiatans.tipekegiatan as tipekegiatan,tbiaya.biayainap as biayainap,tsubkegiatans.namasubkegiatans as namasubkegiatans,tbiaya.id as idbiaya ,tsubkegiatans.id as idkegiatan, tpegawai.id as idpegawai,tbiaya.golongan_id as golidbiaya, 
                            tpegawai.golongan_id as golpeg,
                            tgolongan.gol_ruang as ruanggol,
tsubkegiatans.namasubkegiatans as kegiatan,
tbiaya.id as idbiaya,tbiaya.biayainap as biayainap,
tkota.namakota as kota, tpegawai.nama as nama ');
         $this->db->from('tbiaya');
         $this->db->join('tpegawai','tpegawai.golongan_id = tbiaya.golongan_id','inner');
         $this->db->join('tsubkegiatans','tsubkegiatans.kota_id = tbiaya.kota_id','inner');
         $this->db->join('tkota','tkota.id = tsubkegiatans.kota_id','inner');
         $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
         $this->db->join('tbiayaharian','tbiayaharian.kota_id = tsubkegiatans.kota_id','inner');
         $this->db->join('tsatker','tsatker.idsatker = tsubkegiatans.satker_id','inner');
      //   $this->db->join('tsurat','tsurat.subkegiatans_id = tsubkegiatans.id','inner');
     //    $this->db->join('tsurat as tsur','tsur.pegawai_id = tpegawai.id','inner');
       //  $this->db->where(array('tsubkegiatans.id' => $id,'tpegawai.id' => $idpegawai));
     //    $this->db->join('tsatker','tsatker.idsatker = tsubkegiatans.satker_id','inner');
       //  $this->db->join('tprogram','tprogram.idprogram = tsubkegiatans.program_id','inner');
        // $this->db->join('tkegiatans','tkegiatans.idkegiatan = tsubkegiatans.kegiatans_id','inner');
         
        $this->db->where('tsubkegiatans.id',$idkegiatan);
        $this->db->where('tpegawai.id',$idpegawai);
        $sqlrincianbiayapegawai = $this->db->get();
      //   $query = $getData = $this->db->get('photo', $perPage, $uri);
              //  if($sqlrincianbiayapegawai->num_rows() > 0){
            //    return $sqlrincianbiayapegawai->result();
           //    }
                
           //         else
           //         {
           //         echo "TIDAK ADA DATA";
          //          }
             return $sqlrincianbiayapegawai->result();    
             
 }
 
 public function suratid($idkegiatan,$idpegawai){
     $this->db->select('*');
     $this->db->from('tsurat');
     $this->db->where('tsurat.subkegiatans_id',$idkegiatan);
     $this->db->where('tsurat.pegawai_id',$idpegawai);
     $suratid = $this->db->get();
      return $suratid->result();
     
     
 }
 public function inputbiaya($id){
     
     $this->load->database();
       $this->db->select('terencanabiaya.subkegiatans_id as id,terencanabiaya.pegawai_id as idpeg');
         $this->db->from('terencanabiaya');
          $this->db->where('terencanabiaya.subkegiatans_id',$id);
          
         
// $this->db->where('tpegawai.id',$idpegawai);
  
          $inputbiaya = $this->db->get();
     
     return $inputbiaya->result();
     
     
 }
  public function showsatker(){
        $this->load->database();
        $showsatker = $this->db->get('tsatker');
        return $showsatker->result();
    }
     public function showprogram(){
        $this->load->database();
        $showprogram = $this->db->get('tprogram');
        return $showprogram->result();
    }
     public function showkegiatan(){
        $this->load->database();
        $showkegiatan = $this->db->get('tkegiatans');
        return $showkegiatan->result();
    }
    public function printnormatif($idkegiatan,$idpegawai){
          
     $this->db->select('*');
     $this->db->from('tsurat');
     $this->db->where('tsurat.subkegiatans_id',$idkegiatan);
     $this->db->where('tsurat.pegawai_id',$idpegawai);
     $printnormatif = $this->db->get();
     return $printnormatif->result();
     
                       
    }
    
    public function printnormative($id){

        $this->db->select('*');
        $this->db->from('terencanabiaya');
        $this->db->join('tpegawai','tpegawai.id = terencanabiaya.pegawai_id','inner');
        $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
        $this->db->join('tsubkegiatans','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
       
        $this->db->where('terencanabiaya.subkegiatans_id',$id);
        
        $printnormative = $this->db->get();
        return $printnormative->result();
        
        
    }
     
   
    Public function laporanpegawai(){
        
        $this->db->select('*');
        $this->db->from('terencanabiaya');
        $this->db->join('tpegawai','tpegawai.id = terencanabiaya.pegawai_id','inner');
        $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
        $this->db->join('tsubkegiatans','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
        $this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');
        
        $laporanpegawai = $this->db->get();
        return $laporanpegawai->result();
        
    }
function tampil(){

        $this->db->select('*');
        $this->db->from('terencanabiaya');
        $this->db->join('tpegawai','tpegawai.id = terencanabiaya.pegawai_id','inner');
        $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
        $this->db->join('tsubkegiatans','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
        $this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');
        $result_display = $this->db->get();
    return $result_display->result();
 }
 function caridata(){
        $c = $this->input->POST ('cari');
        $this->db->like('nama', $c);
        $this->db->select('*');
        $this->db->from('terencanabiaya');
        $this->db->join('tpegawai','tpegawai.id = terencanabiaya.pegawai_id','inner');
        $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
        $this->db->join('tsubkegiatans','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
        $this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');
        
        
        $tampil = $this->db->get();
    return $tampil->result();
 }
 public function show_data_by_date_range($data) {
    // $condition = "emp_id =" . "'" . $id . "'";
$condition = "tsubkegiatans.tgl_pergi BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('terencanabiaya');
$this->db->join('tpegawai','tpegawai.id = terencanabiaya.pegawai_id','inner');
$this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
$this->db->join('tsubkegiatans','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
$this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');
$this->db->like('nama',$data['nama']);
$this->db->where("tsubkegiatans.tgl_pergi BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'");
$this->db->order_by('tgl_pergi','ASC');
$result_display = $this->db->get();
if ($result_display->num_rows() > 0) {
return $result_display->result();
} else {
return false;
}
}
public function show_data_by_periode($data) {
    // $condition = "emp_id =" . "'" . $id . "'";
$condition = "tsubkegiatans.tgl_pergi BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('tsubkegiatans');
$this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');
$this->db->join('terencanabiaya','tsubkegiatans.id = terencanabiaya.subkegiatans_id','inner');
$this->db->join('tpegawai','tpegawai.id = terencanabiaya.pegawai_id','inner');
//$this->db->group_by('tsubkegiatans.id');
$this->db->order_by('tgl_pergi','ASC');

$this->db->where($condition);
$result_display = $this->db->get();
if ($result_display->num_rows() > 0) {
return $result_display->result();
} else {
return false;
}
}
public function show_data_by_kegiatan($data) {
    // $condition = "emp_id =" . "'" . $id . "'";
$condition = "tsubkegiatans.tgl_pergi BETWEEN " . "'" . $data['date1'] . "'" . " AND " . "'" . $data['date2'] . "'";
$this->db->select('*');
$this->db->from('tsubkegiatans');
$this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');


//$this->db->group_by('tsubkegiatans.id');
$this->db->order_by('tgl_pergi','ASC');

$this->db->where($condition);
$result_display = $this->db->get();
if ($result_display->num_rows() > 0) {
return $result_display->result();
} else {
return false;
}
}
public function viewnotadinas($id){
     $this->db->select('*');
     $this->db->from('tlaporan');
     $this->db->join('tsubkegiatans','tsubkegiatans.id = tlaporan.subkegiatans_id','inner');
    
     $this->db->where('tlaporan.subkegiatans_id',$id);
     $notadinas = $this->db->get();
      return $notadinas->result();
     
     
 }


}
    


    
           
        
        
        
    
            
