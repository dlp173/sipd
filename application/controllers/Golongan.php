<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Golongan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('golongan_model','golongan');
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
            
               $this->load->model('golongan_model');    
	       $this->load->helper('url');
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('golongan_view');
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->golongan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $golongan) {
			$no++;
			$row = array();
                        $row[] = $golongan->gol_ruang;
			$row[] = $golongan->golongan;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_golongan('."'".$golongan->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_golongan('."'".$golongan->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->golongan->count_all(),
						"recordsFiltered" => $this->golongan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->golongan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'gol_ruang' => $this->input->post('gol_ruang'),
				'golongan' => $this->input->post('golongan'),
				
                               
			);
                
		$insert = $this->golongan->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'gol_ruang' => $this->input->post('gol_ruang'),
				'golongan' => $this->input->post('golongan'),
			);
		$this->golongan->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->golongan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


