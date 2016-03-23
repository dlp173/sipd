<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satker extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('satker_model','satker');
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
            
               $this->load->model('satker_model');    
	       $this->load->helper('url');
               $data = array (
                   
                 'showpegawai' => $this->satker->showpegawai(),  
               );
             
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('satker_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
                $this->load->helper('tglindonesia');
		$list = $this->satker->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $satker) {
			$no++;
			$row = array();
                        $row[] = $satker->idsatker;
                       
			$row[] = $satker->satker; 
                        $row[] = $satker->kode_satker;
                        $row[] = $satker->namappk;
                        $row[] = $satker->namabendahara;
                        $row[] = $satker->no_dipa;
                        $row[] = $satker->kop_ppk;
  
                  
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_satker('."'".$satker->idsatker."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_satker('."'".$satker->idsatker."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
		                  <a class="btn btn-sm btn-success" href="javascript:void()" title="Edit" onclick="detail_satker('."'".$satker->idsatker."'".')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->satker->count_all(),
						"recordsFiltered" => $this->satker->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($idsatker)
	{
		$data = $this->satker->get_by_id($idsatker);
		echo json_encode($data);
	}
        
        public function ajax_detail($idsatker){
               // $this->load->model('satker_model','cst');
	       // $this->load->helper('tglindonesia');
            
            //   $data = array (
             //    'info_by_id' => $this->cst->info_by_id($idsatker),
                
               
  
             //   );
             //   $this->load->view('templates/header');
              //  $this->load->view('templates/navigation');
		// $this->load->view('satker_view_detail',$data);
              //  $this->load->view('templates/footer');
        //         echo json_encode($data);
            $data = $this->satker->get_by_id($idsatker);
		echo json_encode($data);
        }
	public function ajax_add()
	{
	
                $data = array(
				'idsatker' => $this->input->post('idsatker'),
				'satker' => $this->input->post('satker'),
                                'ppk_golongan_id' => $this->input->post('ppk_golongan_id'),
                                'bendahara_pegawai_id' => $this->input->post('bendahara_pegawai_id'),
                                'no_dipa' => $this->input->post('no_dipa'),
                                'kop_ppk' => $this->input->post('kop_ppk'),
                                'kode_satker' => $this->input->post('kode_satker'),
				
                               
			);
                
		$insert = $this->satker->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'idsatker' => $this->input->post('idsatker'),
				'satker' => $this->input->post('satker'),
                                'ppk_golongan_id' => $this->input->post('ppk_golongan_id'),
                                'bendahara_pegawai_id' => $this->input->post('bendahara_pegawai_id'), 
                                'no_dipa' => $this->input->post('no_dipa'),
                                'kop_ppk' => $this->input->post('kop_ppk'),
                                'kode_satker' => $this->input->post('kode_satker'),
			);
		$this->satker->update(array('idsatker' => $this->input->post('idsatker')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->satker->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}


