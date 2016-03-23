<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('surattugas_model','surattugas');
	
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
            
               $this->load->model('surattugas_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/suarttugas/create'),
               'showkeg' => $this->surattugas_model->showkeg(),
               'showpeg' => $this->surattugas_model->showpeg(),
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('surat_view',$data);
                $this->load->view('templates/footer');
                 
	}
        
        public function surattugasprint()
	{
            
               $this->load->model('surattugas_model');    
               $this->load->helper('url');
               $data = array(
               'action' => base_url('index.php/suarttugas/create'),
               'showkeg' => $this->surattugas_model->showkeg(),
               'showpeg' => $this->surattugas_model->showpeg(),
               'printsurattugas' => $this->surattugas_model->printsurattugas(),
            
                ); 
   
            function add_ajax_kegiatans($idprogram){
                    $query = $this->db->get_where('tkegiatans',array('program_id'=>$idprogram));
		    $data = "<option value=''>- select kegiatan -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->namakegiatan."</option>";
		    }
		    echo $data;
		}
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('surattugasprint_view',$data);
                $this->load->view('templates/footer');
                 
	}
        public function printsurattugas(){
            
            
            
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('surattugas_print');
                $this->load->view('templates/footer');  
            
            
        }
	public function ajax_list()
	{
                
            
		$list = $this->surattugas->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $surattugas) {
			$no++;
			$row = array();
			$row[] = $surattugas->jeniskegiatan;
			$row[] = $surattugas->nama;
                        $row[] = $surattugas->nip;
                        $row[] = $surattugas->tempat;
                        $row[] = $surattugas->golongan;
                       
                
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_surattugas('."'".$surattugas->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_surattugas('."'".$surattugas->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->surattugas->count_all(),
						"recordsFiltered" => $this->surattugas->count_filtered(),
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
      
              function add_multiple_post($banyak_data=0) {
        $this->load->database();$this->load->database();
        if($_POST==NULL) {
            $data['banyak_data'] = $banyak_data;
            $this->load->view('add_multiple_form',$data);
        }else {
            foreach($_POST['data'] as $d){
                $this->db->insert('mahasiswa',$d);
             
            }
            redirect('data_mahasiswa/lihat_data');
        }
    }
		
        
     

