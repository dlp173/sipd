<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetaksurattugas_model extends CI_Model {

	var $table = 'tsurat';
	var $tsubkegiatans = 'tsubkegiatans';
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
            
                       
            $this->db->select('tsubkegiatans.no_spd as no_spd,tsurat.status_karyawan as status,tsurat.id as sid,tpegawai.nip as nip,tsubkegiatans.id as id, tsurat.pegawai_id as idpegawai,tpegawai.nama as nama, tgolongan.gol_ruang as gol_ruang,tgolongan.golongan as golongan,tpegawai.jabatan as jabatan');
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
        function get_datasurat($sid)
	{
		$this->_get_datatables_query();
		//if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
                $this->db->where('sid',$sid);
		$query = $this->db->get();

		return $query->result();
	}
        
         function get_datakepala($sid)
	{
		$this->_get_datatables_query();
		//if($_POST['length'] != -1)
		//$this->db->limit($_POST['length'], $_POST['start']);
                $this->db->where('tsurat.id',$sid);
            //    $this->db->where('tsurat.status_karyawan','kepala');
                
		$status = $this->db->get();

		return $status->result();
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
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->tsubkegiatans, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($sid)
	{
		$this->db->where('tsurat.id', $sid);
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
            
            
            $query = $this->db->query('select tsubkegiatans.id as id, tsubkegiatans.namasubkegiatans as namasubkegiatans from tsubkegiatans inner join tsatker on tsubkegiatans.satker_id = tsatker.idsatker
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
   
      
           $this->db->select('tsubkegiatans.no_spd as no_spd,tsatker.satker as namasatker,tpegawai.nama as namappk,tpegawai.nip as nip,tsubkegiatans.hari as hari,tkotapulang.namakota ,tsubkegiatans.id as id,tkota.namakota as kota,tsubkegiatans.tempat as tempat,tprogram.namaprogram as namaprogram, tkegiatans.namakegiatan as namakegiatan,tsubkegiatans.namasubkegiatans ,tsubkegiatans.tgl_pergi as tgl_pergi,
                    tsubkegiatans.tgl_pulang as tgl_pulang,tsatker.satker as satker, tsubkegiatans.tempat as tempat');
            $this->db->from('tsubkegiatans','tkota as kotapulang');
            $this->db->join('tsatker', 'tsubkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tprogram','tsubkegiatans.program_id = tprogram.idprogram','inner');
            $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id','inner');
            $this->db->join('tpegawai','tsatker.ppk_golongan_id = tpegawai.id','inner');
            $this->db->join('tkota','tsubkegiatans.kota_id = tkota.id','inner');
            $this->db->join('tkota as tkotapulang','tsubkegiatans.pulang_kota_id = tkotapulang.id','inner');
            $this->db->where('tsubkegiatans.id',$id);
            $sql = $this->db->get();

		return $sql->result();
         }
             public function showpegawai(){
        $this->load->database();
        $showpegawai = $this->db->get('tpegawai');
        return $showpegawai->result();
    }
     public function printperintah($id){
     
   $this->db->select('tsubkegiatans.pelimpahan as pelimpahan,tsubkegiatans.id as id,tpegawai.nama as pejabat,tpegawai.jabatan as jabatan,tpegawai.nip as nippejabat');
    $this->db->from('tsubkegiatans');
    $this->db->join('tpegawai','tsubkegiatans.perintah_pegawai_id = tpegawai.id','inner');
    $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
  
    
   

    
    $this->db->where('tsubkegiatans.id',$id);
    $printperintah = $this->db->get();
    return $printperintah->result();
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
    
    
            $this->db->select('tkota.namakota as kota,tsurat.subkegiatans_id as id, tpegawai.nama as nama,tgolongan.golongan as golongan, tpegawai.jabatan as jabatan,tgolongan.gol_ruang as gol_ruang,
                    tpegawai.nip as nip');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsubkegiatans.id = tsurat.subkegiatans_id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->join('tkota','tkota.id = tsubkegiatans.kota_id','inner');
            $this->db->join('tkota as kotas','kotas.id = tsubkegiatans.pulang_kota_id','inner');
           
            $this->db->where('tsurat.subkegiatans_id',$id);
            
    
             $sql = $this->db->get();
             return $sql->result();
    
    
}
    

function printtgskegiatan($id){
 //   $this->db->distinct('tsubkegiatans.namasubkegiatans,tsubkegiatans.tgl_pergi,tsubkegiatans.tgl_pulang,tsubkegiatans.tempat,tsubkegiatans.no_lampiran');
    $this->db->select('tkegiatans.idkegiatan as idkegiatans,tsatker.ppk_golongan_id as namappk,tsubkegiatans.program_id as program_id,tsubkegiatans.tingkatbiaya as tingkatbiaya,tsubkegiatans.transport as transport,tsubbagian.idsubbag as idsubbag,tsatker.kode_satker as kode_satker,tsatker.kop_ppk as kop_ppk,tsubkegiatans.no_spd as no_spd,tprogram.namaprogram as namaprogram,tsubkegiatans.id as idkegiatan,tsubkegiatans.no_lampiran as no_lampiran,tkota.namakota as kota,kotas.namakota as kotatujuan,tsubkegiatans.hari as hari,tsubkegiatans.namasubkegiatans as namasubkegiatans,tsubkegiatans.tgl_pergi,tsubkegiatans.tgl_pulang,tsubkegiatans.tempat,tsubkegiatans.no_lampiran');
    $this->db->from('tsurat');
    $this->db->join('tsubkegiatans','tsubkegiatans.id = tsurat.subkegiatans_id');

    $this->db->join('tprogram','tprogram.idprogram = tsubkegiatans.program_id','inner');
       $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id');
    $this->db->join('tsatker','tsatker.idsatker = tsubkegiatans.satker_id','inner');
    $this->db->join('tsubbagian','tsubkegiatans.subbag_id = tsubbagian.id','inner');
    $this->db->join('tpegawai','tpegawai.id = tsurat.pegawai_id');
    $this->db->join('tgolongan','tpegawai.golongan_id = tgolongan.id');
    $this->db->join('tkota','tkota.id = tsubkegiatans.kota_id','inner');
    $this->db->join('tkota as kotas','kotas.id = tsubkegiatans.pulang_kota_id','inner');
    $this->db->where('tsurat.subkegiatans_id',$id);
    $sql1 = $this->db->get();
    return $sql1->result();
}







     function get_id_kepala($id){
    
    
            $this->db->select('tsurat.subkegiatans_id as id, tpegawai.nama as nama,tgolongan.golongan as golongan, tpegawai.jabatan as jabatan,tgolongan.gol_ruang as gol_ruang,
                    tpegawai.nip as nip');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsubkegiatans.id = tsurat.subkegiatans_id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->where('tsurat.subkegiatans_id',$id);
           $this->db->where('tsurat.status_karyawan','kepala');
            
    
             $statuskaryawan = $this->db->get();
             return  $statuskaryawan->result();
    
    
}
    
function get_id_pengikut($id){
    
    
            $this->db->select('tsurat.subkegiatans_id as id, tpegawai.nama as nama,tgolongan.golongan as golongan, tpegawai.jabatan as jabatan,tgolongan.gol_ruang as gol_ruang,
                    tpegawai.nip as nip');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsubkegiatans.id = tsurat.subkegiatans_id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->where('tsurat.subkegiatans_id',$id);
           $this->db->where('tsurat.status_karyawan','pengikut');
            
    
             $status = $this->db->get();
             return  $status->result();
    
    
}

}
                



    
    





    
    
           
        
        
        
    
            
