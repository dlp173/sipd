<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('taksi_model','taksi');
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
            
               $this->load->model('taksi_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/pegawai/create'),
               'showkota' => $this->taksi_model->showkota(),
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('taksi_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->taksi->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $taksi) {
			$no++;
			$row = array();
			$row[] = $taksi->namakota;
			$row[] = $taksi->biayataksi;
		
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_taksi('."'".$taksi->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_taksi('."'".$taksi->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->taksi->count_all(),
						"recordsFiltered" => $this->taksi->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->taksi->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'kota_id' => $this->input->post('kota_id'),
				'biayataksi' => $this->input->post('biayataksi'),
                               
			);
                
		$insert = $this->taksi->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'kota_id' => $this->input->post('kota_id'),
				'biayataksi' => $this->input->post('biayataksi'),
			);
		$this->taksi->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->taksi->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
