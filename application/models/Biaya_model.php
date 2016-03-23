<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_model extends CI_Model {

	var $table = 'tbiaya';
        // ini field dalam table
	var $column = array('namakota','golongan','gol_ruang');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
            
            $this->db->select('tbiaya.id as id , tkota.namakota as namakota,tgolongan.golongan as golongan,tbiaya.biayainap as biayainap,tgolongan.gol_ruang as gol_ruang');
            $this->db->from('tbiaya');
            $this->db->join('tkota', 'tkota.id = tbiaya.kota_id','inner');
            $this->db->join('tgolongan','tgolongan.id = tbiaya.golongan_id','inner');

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
        public function showgol(){
        $this->load->database();
        $showgol = $this->db->get('tgolongan');
        return $showgol->result();
    }
     public function showkota(){
        $this->load->database();
        $showkota = $this->db->get('tkota');
        return $showkota->result();
     }



}
