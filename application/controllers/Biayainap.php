<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayainap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('biayainap_model','biayainap');
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
            
               $this->load->model('biayainap_model');    
	       $this->load->helper('url');
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('biayainap_view');
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
 
            
		$list = $this->biayainap->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $biayainap) {
			$no++;
			$row = array();
                        $row[] = $biayainap->provinsi;
                        $row[] = $biayainap->eselon_1;
                        $row[] = $biayainap->eselon_2;
                        $row[] = $biayainap->gol_4;
                        $row[] = $biayainap->gol_3;
                        $row[] = $biayainap->golongan_1_2;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_biayainap('."'".$biayainap->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_biayainap('."'".$biayainap->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->biayainap->count_all(),
						"recordsFiltered" => $this->biayainap->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->biayainap->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'provinsi' => $this->input->post('provinsi'),
				'eselon_1' => $this->input->post('eselon_1'),
				'eselon_2' => $this->input->post('eselon_2'),
				'gol_4' => $this->input->post('gol_4'),
				'gol_3' => $this->input->post('gol_3'),
				'golongan_1_2' => $this->input->post('golongan_1_2'),
				
                               
			);
                
		$insert = $this->biayainap->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'provinsi' => $this->input->post('provinsi'),
				'eselon_1' => $this->input->post('eselon_1'),
				'eselon_2' => $this->input->post('eselon_2'),
				'gol_4' => $this->input->post('gol_4'),
				'gol_3' => $this->input->post('gol_3'),
				'golongan_1_2' => $this->input->post('golongan_1_2'),
			);
		$this->biayainap->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->biayainap->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
