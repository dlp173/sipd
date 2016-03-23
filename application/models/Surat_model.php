<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surattugas_model extends CI_Model {

	var $table = 'tsurattugas';
        var $t ='tkegiatan';
        // ini field dalam table
	var $column = array('nama','jeniskegiatan','tempat','nip','golongan');
	var $order = array('id' => 'desc');

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query()
	{
		
		// $this->db->from($this->table);
            
                       
            $this->db->select('*');
            $this->db->from('tsurattugas');
            $this->db->join('tpegawai', 'tsurattugas.pegawai_id = tpegawai.id','inner');
            $this->db->join('tkegiatan','tsurattugas.kegiatan_id = tkegiatan.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');

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
       public function showpeg(){
        $this->load->database();
        $showpeg = $this->db->get('tpegawai');
        return $showpeg->result();
    }
    public function showkeg(){
        $this->load->database();
        $showkeg = $this->db->get('tkegiatan');
        return $showkeg->result();
    }

 public function printsurattugas(){
     $this->load->database();
     $printsurattugas =$this->db->query('SELECT DISTINCT tkegiatan.jeniskegiatan,tkegiatan.tgl_pulang, tkegiatan.tgl_pergi,tkegiatan.tempat '
             . 'from tkegiatan inner join tsurattugas on tsurattugas.kegiatan_id = tkegiatan.id where tsurattugas.kegiatan_id = "26"');
   
return $printsurattugas->result();
     
 }
function getSurattugas($search){
		$this->db->select('jeniskegiatan,tempat');
		$whereCondition = array('jeniskegiatan' =>$search);
		$this->db->where($whereCondition);
		$this->db->from('tkegiatan');
		$query = $this->db->get();
		return $query->result();
	}
        
        function get_allkegiatan() {
        $this->db->from($this->t);
        $query = $this->db->get();
 
        //cek apakah ada data
        if ($query->num_rows() > 0) { //jika ada maka jalankan
            return $query->result();
        }
    }
function printtgs(){
    
            $sql = $this->db->query('select * from tsurattugas join tkegiatan on tkegiatan.id = tsurattugas.kegiatan_id join tpegawai on tpegawai.id = tsurattugas.pegawai_id join
                 tgolongan on tpegawai.golongan_id = tgolongan.id       where tkegiatan.id = 26');
                     return $sql->result();
    
    
}
function printtgskegiatan(){
    
            $sql1 = $this->db->query('select distinct tkegiatan.jeniskegiatan,tkegiatan.tgl_pergi,tkegiatan.tgl_pulang,tkegiatan.tempat, tkegiatan.no_lampiran from tsurattugas join tkegiatan on tkegiatan.id = tsurattugas.kegiatan_id join tpegawai on tpegawai.id = tsurattugas.pegawai_id join
                 tgolongan on tpegawai.golongan_id = tgolongan.id where tkegiatan.id = 26');
                     return $sql1->result();
    
    
}

function printsurat($id){
      
               $surattugas = $this->db->query('select distinct tkegiatan.jeniskegiatan,tkegiatan.tgl_pergi,tkegiatan.tgl_pulang,tkegiatan.tempat, tkegiatan.no_lampiran from tsurattugas join tkegiatan on tkegiatan.id = tsurattugas.kegiatan_id join tpegawai on tpegawai.id = tsurattugas.pegawai_id join
                 tgolongan on tpegawai.golongan_id = tgolongan.id as tables');
               return $surattugas->result();
 	}


function getByIdKegiatan($id) {
        return $this->db->get_where('tkegiatan', array('id' => $id))->row();
    }

}
