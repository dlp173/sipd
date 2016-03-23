<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subbagian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('subbagian_model','subbagian');
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
            
               $this->load->model('subbagian_model');    
	       $this->load->helper('url');
               $data = array (
                   
                 'showpegawai' => $this->subbagian->showpegawai(),
                 'showsatker' => $this->subbagian->showsatker(),
               );
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('subbagian_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
               
                
                $this->load->helper('tglindonesia');
		$list = $this->subbagian->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $subbagian) {
			$no++;
			$row = array();
                        $row[] = $subbagian->satker;
			$row[] = $subbagian->idsubbag;
                        $row[] = $subbagian->subbag;
                        $row[] = $subbagian->nama;
                 
                  
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_satker('."'".$subbagian->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_satker('."'".$subbagian->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
		                  <a class="btn btn-sm btn-success" href="javascript:void()" title="Edit" onclick="detail_satker('."'".$subbagian->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->subbagian->count_all(),
						"recordsFiltered" => $this->subbagian->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->subbagian->get_by_id($id);
		echo json_encode($data);
	}
        
        public function ajax_detail($idsatker){
               // $this->load->model('satker_model','cst');
	       // $this->load->helper('tglindonesia');
            
            //   $data = array (
             //    'info_by_id' => $this->cst->info_by_id($idsatker),
                
               
  
             //   );
             //   $this->load->view('templates/header');
              //  $this->load->view('templates/navigation');
		// $this->load->view('satker_view_detail',$data);
              //  $this->load->view('templates/footer');
        //         echo json_encode($data);
            $data = $this->satker->get_by_id($idsatker);
		echo json_encode($data);
        }
	public function ajax_add()
	{
	
                $data = array(
				'satker_id' => $this->input->post('satker_id'),
				'idsubbag' => $this->input->post('idsubbag'),
                                'subbag' => $this->input->post('subbag'),
                                 'kasubbag_pegawai_id' => $this->input->post('kasubbag_pegawai_id'),
                                
				
                               
			);
                
		$insert = $this->subbagian->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'satker_id' => $this->input->post('satker_id'),
				'idsubbag' => $this->input->post('idsubbag'),
                                'subbag' => $this->input->post('subbag'),
                                 'kasubbag_pegawai_id' => $this->input->post('kasubbag_pegawai_id'),
                                
				
                                
			);
		$this->subbagian->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->subbagian->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


