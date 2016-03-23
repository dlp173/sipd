<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkegiatans_model extends CI_Model {

	var $table = 'tsubkegiatans';
        var $tsurat = 'tsurat';
        // ini field dalam table
	var $column = array('namasubkegiatans','satker','tgl_pergi');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
            $this->db->select('tsubkegiatans.program_id as program_id,tsubkegiatans.hari as hari,tkota.namakota as kotatujuan,tprogram.namaprogram as namaprogram, tkegiatans.namakegiatan as namakegiatan,tsubkegiatans.namasubkegiatans,tsubkegiatans.id as id,tsubkegiatans.tgl_pergi as tgl_pergi,
                    tsubkegiatans.tgl_pulang as tgl_pulang,tsatker.satker as satker, tsubkegiatans.tempat as tempat');
            $this->db->from('tsubkegiatans');
            $this->db->join('tsatker', 'tsubkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tprogram','tsubkegiatans.program_id = tprogram.idprogram','inner');
            $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id','inner');
            $this->db->join('tkota','tsubkegiatans.pulang_kota_id = tkota.id','inner');

		$i = 0;
	
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
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
            public function showkota(){
        $this->load->database();
        $showkota = $this->db->get('tkota');
        return $showkota->result();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		            $query = $this->db->get();

		return $query->row();
	}





  public function details_by_id($id){
      
      
      $this->db->select('tsubbagian.subbag as subbag,tsubkegiatans.no_lampiran as no_lampiran,perintah.nama as perintah,
      	tpegawai.nama as namapegawai,tprogram.namaprogram as namaprogram,
      	tkegiatans.namakegiatan as namakegiatan,
      	tsubkegiatans.namasubkegiatans as namasubkegiatan,tsubkegiatans.id as id,
      	tsubkegiatans.tgl_pergi as tgl_pergi,
        tsubkegiatans.tgl_pulang as tgl_pulang,
        tsatker.satker as satker, tsubkegiatans.tempat as tempat,tsubkegiatans.hari as hari,
        tkegiatans.tipekegiatan as tipekegiatan,
        tsatker.satker as satker,
        tprogram.namaprogram as namaprogram,
        tkegiatans.namakegiatan as namakegiatan,
        tsubkegiatans.tempat as tempat,


        ');
            $this->db->from('tsubkegiatans');
            $this->db->join('tsatker', 'tsubkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tsubbagian', 'tsubkegiatans.subbag_id = tsubbagian.id','inner');
            $this->db->join('tprogram','tsubkegiatans.program_id = tprogram.idprogram','inner');
            $this->db->join('tkegiatans','tsubkegiatans.kegiatans_id = tkegiatans.id','inner');
            $this->db->join('tpegawai','tpegawai.id = tsubkegiatans.pegawai_id','inner');
            $this->db->join('tpegawai as perintah','perintah.id = tsubkegiatans.perintah_pegawai_id','inner');
            $this->db->where('tsubkegiatans.id',$id);
      
            $details_by_id = $this->db->get();
		return $details_by_id->row();
      
  }
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}
        public function savepegawai($datapegawai)
	{
		$this->db->insert($this->tsurat, $datapegawai);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
       

public function get_satker(){
        $this->load->database();
        $get_satker = $this->db->get('tsatker');
        return $get_satker->result();
	}
        public function get_subbagian(){
        $this->load->database();
        $get_subbagian = $this->db->get('tsubbagian');
        return $get_subbagian->result();
	}
        public function showpegawai(){
        $this->load->database();
        $showpegawai = $this->db->get('tpegawai');
        return $showpegawai->result();
	}
	 public function showkegiatans(){
        $this->load->database();
        $showkegiatans = $this->db->get('tkegiatans');
        return $showkegiatans->result();
	}
   
   

    public function getLastInserted() {
	  $this->db->select('*');
          $this->db->from('tsubkegiatans');
          $this->db->order_by('id','DESC');
          $this->db->limit('1');
   



$lastid = $this->db->get();
         
         return $lastid->result();
          
 }
 }