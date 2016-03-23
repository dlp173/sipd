<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userrole extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('userrole_model','userrole');
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
            
               $this->load->model('userrole_model');    
	       $this->load->helper('url');
             
   $data = array(
              'showsatker' => $this->userrole_model->showsatker(),
            
                ); 
               
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('userrole_view',$data);
                
                $this->load->view('templates/footer');
                 
	}
 
	public function settingakun()
	{
            
               $this->load->model('userrole_model');    
	       $this->load->helper('url');
             
   $data = array(
              'showsatker' => $this->userrole_model->showsatker(),
            
                ); 
               
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('settingakun_view',$data);
                
                $this->load->view('templates/footer');
                 
	}
	public function ajax_list()
	{
                
            
		$list = $this->userrole->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $userrole) {
			$no++;
			$row = array();
                        $row[] = $userrole->nama;
                        $row[] = $userrole->u_name;
			$row[] = $userrole->role;
                        
                  //      $row[] = $program->nominalprogram;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_userrole('."'".$userrole->u_id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_userrole('."'".$userrole->u_id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->userrole->count_all(),
						"recordsFiltered" => $this->userrole->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->userrole->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'nama' => $this->input->post('nama'),
				'u_name' => $this->input->post('u_name'),
				'u_paswd' => md5($this->input->post('u_paswd')),
                                'role' => $this->input->post('role'),
                                'satker_id' => $this->input->post('satker_id'),
                               
			);
                
		$insert = $this->userrole->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		 $data = array(
				'nama' => $this->input->post('nama'),
				'u_name' => $this->input->post('u_name'),
				'u_paswd' => md5($this->input->post('u_paswd')),
                                'role' => $this->input->post('role'),
                                'satker_id' => $this->input->post('satker_id'),
                               
                               
			);
		$this->userrole->update(array('u_id' => $this->input->post('u_id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->userrole->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


