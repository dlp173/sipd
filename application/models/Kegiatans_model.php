<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatans_model extends CI_Model {

	var $table = 'tkegiatans';
        // ini field dalam table
	var $column = array('namakegiatan','tipekegiatan','program_id','nominalkegiatan','sisaanggaran');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
            
            $this->db->select('tkegiatans.sisaanggaran as sisaanggaran,tkegiatans.nominalkegiatan as nominal,tkegiatans.nominalkegiatan as nominalkegiatan,tprogram.namaprogram as namaprogram,tsatker.satker as satker,tkegiatans.satker_id as satker_id,tkegiatans.id as id,tkegiatans.idkegiatan as idkegiatan, tkegiatans.tipekegiatan as tipekegiatan,tkegiatans.namakegiatan as namakegiatan ,tprogram.idprogram, tkegiatans.program_id as program_id');
            $this->db->from('tkegiatans');
            $this->db->join('tsatker', 'tkegiatans.satker_id = tsatker.idsatker','inner');
            $this->db->join('tprogram','tkegiatans.program_id = tprogram.idprogram','inner');
         
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

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
	}
        
        
        public function details_by_id($id)
	{
		 $this->db->select('tkegiatans.id as id,tkegiatans.nominalkegiatan as nominalkegiatan,tsatker.satker as satker,tkegiatans.satker_id as satker_id,tkegiatans.idkegiatan as idkegiatan, tkegiatans.tipekegiatan as tipekegiatan,tkegiatans.namakegiatan as namakegiatan ,tprogram.idprogram, tkegiatans.program_id as program_id, tprogram.namaprogram as namaprogram');
                 $this->db->from('tkegiatans');
                 $this->db->join('tsatker', 'tkegiatans.satker_id = tsatker.idsatker','inner');
                 $this->db->join('tprogram','tkegiatans.program_id = tprogram.idprogram','inner');
		 $this->db->where('tkegiatans.id',$id);
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
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
        public function updatesisa($where, $data3)
	{
		$this->db->update($this->table, $data3, $where);
		return $this->db->affected_rows();
	}
          public function updateanggaran($where, $hasil)
	{
		$this->db->update($this->table, $hasil, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
       


}
