<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subbagian_model extends CI_Model {

	var $table = 'tsubbagian';
        // ini field dalam table
	var $column = array('tsubbagian.satker_id','subbagian');
	var $order = array('tsubbagian.satker_id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
            
            $this->db->select('*');
            $this->db->from('tsubbagian');
            $this->db->join('tsatker','tsatker.idsatker = tsubbagian.satker_id','inner');
             $this->db->join('tpegawai','tpegawai.id = tsubbagian.kasubbag_pegawai_id','left');
             //  $this->db->join('tpegawai', 'tpegawai.id = tsatker.ppk_golongan_id','inner');
            
           

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

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}
       public function showpegawai(){
       $this->load->database();
       $showpegawai = $this->db->get('tpegawai');
       return $showpegawai->result();
       }
       public function showsatker(){
       $this->load->database();
       $showsatker = $this->db->get('tsatker');
       return $showsatker->result();
       }
       
       public function info_by_id($idsatker){
           
            $this->db->select('ppk.id as ppk_golongan_id, bendahara.id as bendahara_pegawai_id,tsatker.idsatker as idsatker,ppk.nama as namappk, bendahara.nama as namabendahara,tsatker.idsatker as idsatker,tsatker.satker as satker');
            $this->db->from('tsatker');
            $this->db->join('tpegawai as ppk', 'tsatker.ppk_golongan_id = ppk.id','inner');
            $this->db->join('tpegawai as bendahara', 'tsatker.bendahara_pegawai_id = bendahara.id','inner');
            $this->db->where('tsatker.idsatker',$idsatker);
            $infosatker = $this->db->get();
	    return $infosatker->result();
           
       }

}
