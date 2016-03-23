<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayarill extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('biayarill_model','biayarill');
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
            
               $this->load->model('biayarill_model');    
	       $this->load->helper('url');
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('biayarill_view');
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->biayarill->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $biayarill) {
			$no++;
			$row = array();
                        $row[] = $biayarill->jenis;
			$row[] = $biayarill->nominal;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_biayarill('."'".$biayarill->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_biayarill('."'".$biayarill->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->biayarill->count_all(),
						"recordsFiltered" => $this->biayarill->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->biayarill->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'jenis' => $this->input->post('jenis'),
				'nominal' => $this->input->post('nominal'),
				
                               
			);
                
		$insert = $this->biayarill->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'jenis' => $this->input->post('jenis'),
				'nominal' => $this->input->post('nominal'),
			);
		$this->biayarill->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->biayarill->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
