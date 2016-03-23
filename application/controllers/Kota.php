<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kota_model','kota');
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
            
               $this->load->model('kota_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/biaya/create'),
               
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('kota_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->kota->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kota) {
			$no++;
			$row = array();
			$row[] = $kota->namakota;
			
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kota('."'".$kota->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kota('."'".$kota->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kota->count_all(),
						"recordsFiltered" => $this->kota->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kota->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'namakota' => $this->input->post('namakota'),
				
				
                               
			);
                
		$insert = $this->kota->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'namakota' => $this->input->post('namakota'),
			);
		$this->kota->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kota->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
