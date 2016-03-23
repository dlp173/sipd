<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('biaya_model','biaya');
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
            
               $this->load->model('biaya_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/biaya/create'),
               'showgol' => $this->biaya_model->showgol(),
               'showkota' => $this->biaya_model->showkota(),
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('biaya_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->biaya->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $biaya) {
			$no++;
			$row = array();
			$row[] = $biaya->namakota;
			$row[] = $biaya->golongan;
                        $row[] = $biaya->gol_ruang;
			$row[] = $biaya->biayainap;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_biaya('."'".$biaya->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_biaya('."'".$biaya->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->biaya->count_all(),
						"recordsFiltered" => $this->biaya->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->biaya->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'kota_id' => $this->input->post('kota_id'),
				'golongan_id' => $this->input->post('golongan_id'),
				'biayainap' => $this->input->post('biayainap'),
				
                               
			);
                
		$insert = $this->biaya->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'kota_id' => $this->input->post('kota_id'),
				'golongan_id' => $this->input->post('golongan_id'),
				'biayainap' => $this->input->post('biayainap'),
			);
		$this->biaya->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->biaya->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
