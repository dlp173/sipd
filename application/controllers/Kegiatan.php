<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kegiatan_model','kegiatan');
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
            
               $this->load->model('kegiatan_model');    
	       $this->load->helper('url');
             
   
             $this->load->model('program_model');    

             
   $data = array(
              'showsatker' => $this->program_model->showsatker(),
              'showprogram' => $this->program_model->showprogram(),
            
                ); 
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('kegiatan_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
         
		$list = $this->kegiatan->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kegiatan) {
			$no++;
			$row = array();
                        $row[] = $kegiatan->no_lampiran;
                        $row[] = $kegiatan->tipekegiatan;
                        $row[] = $kegiatan->jeniskegiatan;
                        $row[] = $kegiatan->tgl_pergi;
                        $row[] = $kegiatan->tgl_pulang;
                        $row[] = $kegiatan->satker_id;
                        $row[] = $kegiatan->tempat;
                        
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kegiatan('."'".$kegiatan->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kegiatan('."'".$kegiatan->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kegiatan->count_all(),
						"recordsFiltered" => $this->kegiatan->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->kegiatan->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'no_lampiran' => $this->input->post('no_lampiran'),
				'tipekegiatan' => $this->input->post('tipekegiatan'),
                                'jeniskegiatan' => $this->input->post('jeniskegiatan'),
                                'tgl_pergi' => $this->input->post('tgl_pergi'),
                                'tgl_pulang' => $this->input->post('tgl_pulang'),
                                'satker' => $this->input->post('satker'),
				'tempat' => $this->input->post('tempat'),
                               
			);
                
		$insert = $this->kegiatan->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'no_lampiran' => $this->input->post('no_lampiran'),
				'tipekegiatan' => $this->input->post('tipekegiatan'),
                                'jeniskegiatan' => $this->input->post('jeniskegiatan'),
                                'tgl_pergi' => $this->input->post('tgl_pergi'),
                                'tgl_pulang' => $this->input->post('tgl_pulang'),
                                'satker' => $this->input->post('satker'),
				'tempat' => $this->input->post('tempat'),
			);
		$this->kegiatan->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->kegiatan->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


