<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		 $this->load->helper(array('url','html','tglindonesia'));
		$this->load->model('program_model','program');
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
            
               $this->load->model('program_model');    
	       $this->load->helper('url');
	        $this->load->helper('tglindonesia');
             
   $data = array(
              'showsatker' => $this->program_model->showsatker(),
            
                ); 
               
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('program_view',$data);
                
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
           
     $this->load->helper('url');
                $this->load->helper('tglindonesia');
		$list = $this->program->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $program) {
			$no++;
			$row = array();
                        $row[] = $program->satker;
                        $row[] = $program->idprogram;
		        $row[] = $program->namaprogram;
                        $row[] = $program->nominalprogram;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_program('."'".$program->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_program('."'".$program->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
				  ';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->program->count_all(),
						"recordsFiltered" => $this->program->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->program->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'idprogram' => $this->input->post('idprogram'),
				'satker_id' => $this->input->post('satker_id'),
				'namaprogram' => $this->input->post('namaprogram'),
                'nominalprogram' => $this->input->post('nominalprogram'),
                               
			);
                
		$insert = $this->program->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		 $data = array(
				'idprogram' => $this->input->post('idprogram'),
				'satker_id' => $this->input->post('satker_id'),
				'namaprogram' => $this->input->post('namaprogram'),
                                'nominalprogram' => $this->input->post('nominalprogram'),
                               
                               
			);
		$this->program->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->program->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


