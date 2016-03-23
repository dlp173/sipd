<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    	
    
	public  function __construct(){
	parent::__construct();
	$this->is_logged_in();
        	
		$this->load->model('dashboard_model','',TRUE);
		$this->load->database();
		$this->load->helper('url');

        
	}
          public function is_logged_in(){
	$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in!= true) {
		redirect(base_url());
		} 
	}
    public function index()
	{ 
          //foreach($this->dashboard_model->totalbiayapersatker()->result_array() as row){
              
         
     $this->load->model('program_model');  
               foreach($this->dashboard_model->laporanBiaya()->result_array() as $row)
             
		{
	                 
                        $data['grafik'][]=(float)$row['Januari'];
			$data['grafik'][]=(float)$row['Februari'];
			$data['grafik'][]=(float)$row['Maret'];
			$data['grafik'][]=(float)$row['April'];
			$data['grafik'][]=(float)$row['Mei'];
			$data['grafik'][]=(float)$row['Juni'];
			$data['grafik'][]=(float)$row['Juli'];
			$data['grafik'][]=(float)$row['Agustus'];
			$data['grafik'][]=(float)$row['September'];
			$data['grafik'][]=(float)$row['Oktober'];
			$data['grafik'][]=(float)$row['November'];
			$data['grafik'][]=(float)$row['Desember'];
		  }     
                               
               
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('dashboard',$data);
                $this->load->view('templates/footer');
                 
		
	}                        
      
	
	function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }

}

