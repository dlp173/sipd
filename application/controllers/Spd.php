<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spd extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Spd_model','spd');
	 $this->load->library('session');

                $this->is_logged_in();
                }
                  public function is_logged_in(){
                $is_logged_in=$this->session->userdata('is_logged_in');
                        if(!isset($is_logged_in)||$is_logged_in!= true) {
                        redirect(base_url());
                        } 
	}


	public function index()
	{
            
               $this->load->model('spd_model','surattugas_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/spd/create'),
               'showkeg' => $this->surattugas_model->showkeg(),
               'showpeg' => $this->surattugas_model->showpeg(),
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('spd_view',$data);
                $this->load->view('templates/footer');
                 
	}
        
        
	public function ajax_list()
	{
                
            
		$list = $this->spd->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $spd) {
			$no++;
			$row = array();$row[] = $spd->nama;
			$row[] = $spd->namasubkegiatans;
			$row[] = $spd->tempat;
                        $row[] = $spd->kota_id;
                        $row[] = $spd->tgl_pergi;
                        $row[] = $spd->tgl_pulang;
                       
                
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_surattugas('."'".$spd->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_surattugas('."'".$spd->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->spd->count_all(),
						"recordsFiltered" => $this->spd->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->surattugas->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'kegiatan_id' => $this->input->post('kegiatan_id'),
				'pegawai_id' => $this->input->post('pegawai_id'),
				
			);
                
		$insert = $this->surattugas->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'kegiatan_id' => $this->input->post('kegiatan_id'),
				'pegawai_id' => $this->input->post('pegawai_id'),
			);
		$this->surattugas->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->surattugas->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
                public function printst(){
                $this->load->model('surattugas_model');    
		$this->load->helper('url');
		$search=  $this->input->post('search');
		$query = $this->surattugas_model->getSurattugas($search);
		echo json_encode ($query);
	}

        
        // PENCARIAN DATA KEGIATAN MULTI OUTPUT
       public function aa(){
                $this->load->model('surattugas_model');    
		$this->load->helper('url');

		$this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('surattugasprint_view');
                $this->load->view('templates/footer');
        }
	public function get_search()
	{
		// tangkap variabel keyword dari URL
             $keyword = $this->uri->segment(3);
             $this->db->select('jeniskegiatan,tempat,tipekegiatan,nama,golongan,gol_ruang');
             $this->db->from('tsurattugas');
             $this->db->join('tkegiatan', 'tkegiatan.id = tsurattugas.kegiatan_id');
             $this->db->join('tpegawai','tpegawai.id = tsurattugas.pegawai_id');
             $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id');
           
             $this->db->like('jeniskegiatan',$keyword);
             $this->db->group_by('jeniskegiatan');
             $data = $this->db->get();

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
 function get_uanginap($gol_ruang){
 $this->load->model('surattugas_model');
 echo(json_encode($this->surattugas_model->get_uanginap($gol_ruang)));
}
  }
      
             
		
        
     

