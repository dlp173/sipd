<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subkegiatans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
                $this->load->helper(array('url','html','tglindonesia'));
		$this->load->model('subkegiatans_model','subkegiatans');
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
            
               $this->load->model('subkegiatans_model');    
	       $this->load->helper('url');
                $this->load->helper('tglindonesia');
             
   
             $this->load->model('program_model');    

             
                $data = array(
                           'showsatker' => $this->program_model->showsatker(),
                           'showprogram' => $this->program_model->showprogram(),
                          'showkegiatans' => $this->subkegiatans_model->showkegiatans(), 
                           'showkota'=>  $this->subkegiatans_model->showkota(),
                           'lastid' => $this->subkegiatans_model->getLastInserted(),
                           'showpegawai'=>$this->subkegiatans_model->showpegawai(),
                    'get_subbagian'=>$this->subkegiatans_model->get_subbagian(),
                           
                             ); 
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('subkegiatans_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
    $this->load->model('cetaksurattugas_model');    
	$this->load->helper('tglindonesia');
         
		$list = $this->subkegiatans->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $subkegiatans) {
			$no++;
			$row = array();
                        $row[] = $subkegiatans->satker;
                        $row[] = $subkegiatans->namasubkegiatans;
                        $row[] = tgl_indo($subkegiatans->tgl_pergi);
                        $row[] = $subkegiatans->hari;
                        $row[] = $subkegiatans->kotatujuan;
                       
                     
                      
                   
                        
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_subkegiatans('."'".$subkegiatans->id."'".')"> <i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_subkegiatans('."'".$subkegiatans->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                    <a class="btn btn-sm btn-success" href="javascript:void()" title="Detail" onclick="detail_subkegiatans('."'".$subkegiatans->id."'".')"><i class="glyphicon glyphicon-trash"></i> Detail</a>
                               ';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->subkegiatans->count_all(),
						"recordsFiltered" => $this->subkegiatans->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->subkegiatans->get_by_id($id);
		echo json_encode($data);
	}
      
           
		public function ajax_detail($id)
	{
		$data = $this->subkegiatans->details_by_id($id);
		echo json_encode($data);
	}
      
              
	
                
	

	public function ajax_add()
	{
	
                $data = array(
                                'idsubkegiatans' => $this->input->post('idsubkegiatans'),
                        	'satker_id' => $this->input->post('satker_id'),
                                'subbag_id' => $this->input->post('subbag_id'),
                                'program_id' => $this->input->post('program_id'),
                                'kegiatans_id'=>$this->input->post('kegiatans_id'),
                                'pegawai_id'=> $this->input->post('pegawai_id'),
                                'perintah_pegawai_id'=> $this->input->post('perintah_pegawai_id'),
                                'pelimpahan'=> $this->input->post('pelimpahan'),
                                'no_lampiran'=>$this->input->post('no_lampiran'),
                                'transport' => $this->input->post('transport'),
                                'tingkatbiaya' => $this->input->post('tingkatbiaya'),
                                'tipekegiatan' => $this->input->post('tipekegiatan'),
				'tgl_pergi' => $this->input->post('tgl_pergi'),
                                'tgl_pulang' => $this->input->post('tgl_pulang'),
			        'hari' => $this->input->post('hari'),
		                'namasubkegiatans' => $this->input->post('namasubkegiatans'),
                                'tempat'=>$this->input->post('tempat'),
                                'pulang_kota_id'=>$this->input->post('pulang_kota_id'),
                                'kota_id'=>$this->input->post('kota_id'),
                             //   'nominalsubkegiatans' => $this->input->post('nominalsubkegiatans'),
                                'laporan_id' => $this->input->post('laporan_id'),
                                
			);
                $datapegawai = array ('subkegiatans_id' =>$this->input->post('subkegiatans_id'),
                                       'pegawai_id' =>$this->input->post('pegawai_id'),
                    'status_karyawan' =>$this->input->post('status_karyawan'),
                    'statusbiaya' =>$this->input->post('statusbiaya'),
                    
                    
                    );
                $insertpegawai = $this->subkegiatans->savepegawai($datapegawai);
		$insert = $this->subkegiatans->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		 $data = array(
                                'idsubkegiatans' => $this->input->post('idsubkegiatans'),
                        	'satker_id' => $this->input->post('satker_id'),
                                'program_id' => $this->input->post('program_id'),
                                'kegiatans_id'=>$this->input->post('kegiatans_id'),
                                'pegawai_id'=> $this->input->post('pegawai_id'),
                                'perintah_pegawai_id'=> $this->input->post('perintah_pegawai_id'),
                                'pelimpahan'=> $this->input->post('pelimpahan'),
                                'subbag_id' => $this->input->post('subbag_id'),
                                'no_lampiran'=>$this->input->post('no_lampiran'),
                                'tingkatbiaya' => $this->input->post('tingkatbiaya'),
                                'transport' => $this->input->post('transport'),
                                'tipekegiatan' => $this->input->post('tipekegiatan'),
				'tgl_pergi' => $this->input->post('tgl_pergi'),
                                'tgl_pulang' => $this->input->post('tgl_pulang'),
			        'hari' => $this->input->post('hari'),
		                'namasubkegiatans' => $this->input->post('namasubkegiatans'),
                                'tempat'=>$this->input->post('tempat'),
                                'pulang_kota_id'=>$this->input->post('pulang_kota_id'),
                                'kota_id'=>$this->input->post('kota_id'),
                         //     'nominalsubkegiatans' => $this->input->post('nominalsubkegiatans'),
                                
			);
                $datapegawai = array ('subkegiatans_id' =>$this->input->post('subkegiatans_id'),
                                       'pegawai_id' =>$this->input->post('pegawai_id'),
                    'status_karyawan' =>$this->input->post('status_karyawan'),
                    'statusbiaya' =>$this->input->post('statusbiaya'),
                    
                    
                    );
		$this->subkegiatans->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->subkegiatans->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
        
        function add_ajax_subbag($idsatker){
		    $query = $this->db->get_where('tsubbagian',array('satker_id'=>$idsatker));
		    $data = "<option value=''>- Select Subbag -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->subbag."</option>";
		    }
                    echo $data;
		   // echo json_encode($data);
        }
        function add_ajax_program($idsatker){
		    $query = $this->db->get_where('tprogram',array('satker_id'=>$idsatker));
		    $data = "<option value=''>- Select program -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->idprogram."'>".$value->namaprogram."</option>";
		    }
                    echo $data;
		   // echo json_encode($data);
        }
        function add_ajax_kegiatans($idprogram){
                    $query = $this->db->get_where('tkegiatans',array('program_id'=>$idprogram));
		    $data = "<option value=''>- select kegiatan -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->namakegiatan."  [".$value->tipekegiatan."]</option>";
		    }
		    echo $data;
		}
		
		function add_ajax_des($id_kec){
		    $query = $this->db->get_where('wilayah_desa',array('kecamatan_id'=>$id_kec));
		    $data = "<option value=''> - Pilih Desa - </option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->nama."</option>";
		    }
		    echo $data;
		}
               function lastid() {
                   
            
               return $lastid->result();
        }

	}


        