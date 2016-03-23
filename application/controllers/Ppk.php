<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ppk_model','ppk');
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
            
               $this->load->model('ppk_model');    
	       $this->load->helper('url');
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('ppk_view');
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->ppk->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ppk) {
			$no++;
			$row = array();
                        $row[] = $ppk->nama;
			$row[] = $ppk->nip;
			$row[] = $ppk->ppk;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_ppk('."'".$ppk->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_ppk('."'".$ppk->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ppk->count_all(),
						"recordsFiltered" => $this->ppk->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->ppk->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
                                'ppk' => $this->input->post('ppk'),
				
                               
			);
                
		$insert = $this->ppk->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
                                'ppk' => $this->input->post('ppk'),
				
			);
		$this->ppk->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->ppk->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


