<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biayaharian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('biayaharian_model','biayaharian');
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
            
               $this->load->model('biayaharian_model');    
	       $this->load->helper('url');
                $data = array(
               
               'showkota' => $this->biayaharian->showkota(),
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('biayaharian_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->biayaharian->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $biayaharian) {
			$no++;
			$row = array();
                        $row[] = $biayaharian->namakota;
			$row[] = $biayaharian->biayaluarkota;
			$row[] = $biayaharian->biayadalamkota;
			$row[] = $biayaharian->biayadiklat;
		
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_biayaharian('."'".$biayaharian->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_biayaharian('."'".$biayaharian->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->biayaharian->count_all(),
						"recordsFiltered" => $this->biayaharian->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->biayaharian->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'kota_id' => $this->input->post('kota_id'),
				'biayaluarkota' => $this->input->post('biayaluarkota'),
				'biayadalamkota' => $this->input->post('biayadalamkota'),
				'biayadiklat' => $this->input->post('biayadiklat'),
				
                               
			);
                
		$insert = $this->biayaharian->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'kota_id' => $this->input->post('kota_id'),
				'biayaluarkota' => $this->input->post('biayaluarkota'),
				'biayadalamkota' => $this->input->post('biayadalamkota'),
				'biayadiklat' => $this->input->post('biayadiklat'),
			);
		$this->biayaharian->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->biayaharian->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
 public function showkota(){
        $this->load->database();
        $showkota = $this->db->get('tkota');
        return $showkota->result();
     }
}
