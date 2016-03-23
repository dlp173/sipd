<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program_ extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('program_model_1','program');
	}

	public function index()
	{
            
               $this->load->model('program_model_1');    
	       $this->load->helper('url');
             
   
  
       
             
        
       

          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('program_view_1');
                $this->load->view('templates/footer');
                 
	}
        
   public function data(){
   $dt=$this->db->get('tprogram')->result();
   $arr_data=array();
   $i=0;
   foreach($dt as $r){
    $arr_data[$i]['idprogram']=$r->idprogram;
    $arr_data[$i]['idsatker']=$r->idsatker;
    $arr_data[$i]['namaprogram']=$r->namaprogram;
  $i++;
   }
   echo json_encode($arr_data);
  }
        
public function ajax_add()
	{
	
                $data = array(
				'idprogram' => $this->input->post('gol_ruang'),
				'idsatker' => $this->input->post('golongan'),
				'namaprogram' =>$this->input->post('namaprogram')
                               
			);
                
		$insert = $this->program->save($data);
		echo json_encode(array("status" => TRUE));
	}
}