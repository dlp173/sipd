<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatans extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
			 $this->load->helper(array('url','html','tglindonesia'));
		$this->load->model('kegiatans_model','kegiatans');
	 $this->load->library('session');

                $this->is_logged_in();
                }
                  public function is_logged_in(){
                 $is_logged_in=$this->session->userdata('role')=='Administrator';
                        if(!isset($is_logged_in)||$is_logged_in!= true) {
                        redirect(base_url());
                        } 
	}


	public function index()
	{
            
               $this->load->model('kegiatans_model');    
	       $this->load->helper('url');
             
   
             $this->load->model('program_model');    

             
   $data = array(
              'showsatker' => $this->program_model->showsatker(),
              'showprogram' => $this->program_model->showprogram(),
            
                ); 
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('kegiatans_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
         
		$list = $this->kegiatans->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kegiatans) {
			$no++;
			$row = array();
                        $row[] = $kegiatans->satker;
                        $row[] = $kegiatans->idkegiatan;
                        $row[] = $kegiatans->namaprogram;
                        $row[] = $kegiatans->namakegiatan;
                        $row[] = $kegiatans->sisaanggaran;
                        $row[] = $kegiatans->tipekegiatan;
                    
                       
                   
  
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kegiatans('."'".$kegiatans->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kegiatans('."'".$kegiatans->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                  <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="detail_kegiatans('."'".$kegiatans->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>
				  ';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kegiatans->count_all(),
						"recordsFiltered" => $this->kegiatans->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kegiatans->get_by_id($id);
		echo json_encode($data);
	}
        public function ajax_detail($id)
	{
            
            
		$data = $this->kegiatans->details_by_id($id);
                echo json_encode($data);
                  
           
		
              
	
                
	}

	public function ajax_add()
	{
	
                $data = array(
                                'tipekegiatan' => $this->input->post('tipekegiatan'),
			               	'idkegiatan' => $this->input->post('idkegiatan'),
				      'satker_id' => $this->input->post('satker_id'),
                                'program_id' => $this->input->post('program_id'),
                                'namakegiatan' => $this->input->post('namakegiatan'),
                                'nominalkegiatan' => $this->input->post('nominalkegiatan'),
                                'sisaanggaran' => $this->input->post('nominalkegiatan'),
                                
			);
                
		$insert = $this->kegiatans->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
                                'tipekegiatan' => $this->input->post('tipekegiatankegiatan'),
				'idkegiatan' => $this->input->post('idkegiatan'),
				'satker_id' => $this->input->post('satker_id'),
                                'program_id' => $this->input->post('program_id'),
                                'tipekegiatan' => $this->input->post('tipekegiatan'),
                                'namakegiatan' => $this->input->post('namakegiatan'),
                    
                                'nominalkegiatan' => $this->input->post('nominalkegiatan'),
                                'sisaanggaran' => $this->input->post('nominalkegiatan'),
			);
		$this->kegiatans->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kegiatans->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


