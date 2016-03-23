<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayarep extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('biayarep_model','biayarep');
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
            
               $this->load->model('biayarep_model');    
	       $this->load->helper('url');
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('biayarep_view');
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->biayarep->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $biayarep) {
			$no++;
			$row = array();
                        $row[] = $biayarep->jenis_ref;
			$row[] = $biayarep->nominal;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_biayarep('."'".$biayarep->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_biayarep('."'".$biayarep->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->biayarep->count_all(),
						"recordsFiltered" => $this->biayarep->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->biayarep->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'jenis_ref' => $this->input->post('jenis_ref'),
				'nominal' => $this->input->post('nominal'),
				
                               
			);
                
		$insert = $this->biayarep->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'jenis_ref' => $this->input->post('jenis_ref'),
				'nominal' => $this->input->post('nominal'),
			);
		$this->biayarep->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->biayarep->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
