<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencanabiaya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rencanabiaya_model','rencanabiaya');
	}

	public function index()
	{
            
               $this->load->model('rencanabiaya_model');    
	       $this->load->helper('url');
             
   
             $this->load->model('pegawai_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/rencanabiaya/create'),
               'showpeg' => $this->rencanabiaya_model->showpeg(),
               'showkeg' => $this->rencanabiaya_model->showkeg(),
               'showinap' => $this->rencanabiaya_model->showinap(),
            
                ); 
   
            
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('rencanabiaya_view',$data);
                $this->load->view('templates/footer');
                 
	}
        public function addrencana()
	{
            
               
                $this->load->model('surattugas_model');    
		$this->load->helper('url');

		$this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('rencanabiaya_addview');
                $this->load->view('templates/footer');
        }
	public function get_search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		//$data = $this->db->from('tkegiatan')->like('jeniskegiatan',$keyword)->get();	
         
             $this->db->select('jeniskegiatan,tempat,tipekegiatan,nama,golongan,gol_ruang');
             $this->db->from('tsurattugas');
             $this->db->join('tkegiatan', 'tkegiatan.id = tsurattugas.kegiatan_id');
             $this->db->join('tpegawai','tpegawai.id = tsurattugas.pegawai_id');
             $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id');
               
             $this->db->like('jeniskegiatan',$keyword);
           //  $this->db->group_by('jeniskegiatan');
             $data = $this->db->get();
             
             
		// format keluaran di dalam array
		foreach($data ->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->jeniskegiatan,
				'nama'=>$row->nama,
			        'tipekegiatan'	=>$row->tipekegiatan,
                                'tempat'	=>$row->tempat,
                                'golongan' =>$row->golongan,
                                'gol_ruang' =>$row->gol_ruang,

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
        
                 

	public function ajax_list()
	{
                
            
		$list = $this->rencanabiaya->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $rencanabiaya) {
			$no++;
			$row = array();
                        $row[] = $biayaharian->totalhari;
		
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_rencanabiaya('."'".$rencanabiaya->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_rencanabiaya('."'".$rencanabiaya->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->rencanabiaya->count_all(),
						"recordsFiltered" => $this->rencanabiaya->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->rencanabiaya->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'pegawai_id' => $this->input->post('pegawai_id'),
				'kegiatan_id' => $this->input->post('kegiatan_id'),
				'biayainap_id' => $this->input->post('biayainap_id'),
				'biayainap' => $this->input->post('biayainap'),
                                'biayaharian_id' => $this->input->post('biayaharian_id'),
                                'biayaharian' => $this->input->post('biayaharian'),
                                'biayarill_id' => $this->input->post('biayarill_id'),
				'biayarill' => $this->input->post('biayarill'),
                                'totalhari' => $this->input->post('totalhari'),
                                'totalbiaya' => $this->input->post('totalbiaya'),
                                'ppk_id' => $this->input->post('ppk_id'),
                                'spd_id' => $this->input->post('spd_id'),
                               
			);
                
		$insert = $this->rencanabiaya->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'pegawai_id' => $this->input->post('pegawai_id'),
				'kegiatan_id' => $this->input->post('kegiatan_id'),
				'biayainap_id' => $this->input->post('biayainap_id'),
				'biayainap' => $this->input->post('biayainap'),
                                'biayaharian_id' => $this->input->post('biayaharian_id'),
                                'biayaharian' => $this->input->post('biayaharian'),
                                'biayarill_id' => $this->input->post('biayarill_id'),
				'biayarill' => $this->input->post('biayarill'),
                                'totalhari' => $this->input->post('totalhari'),
                                'totalbiaya' => $this->input->post('totalbiaya'),
                                'ppk_id' => $this->input->post('ppk_id'),
                                'spd_id' => $this->input->post('spd_id'),
			);
		$this->rencanabiaya->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->rencanabiaya->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
