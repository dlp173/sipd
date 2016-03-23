<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class adminlte extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function index()
	{
            
               $this->load->model('satker_model');    
	       $this->load->helper('url');
              
             
   
            
            
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('adminlte_view');
                $this->load->view('templates/footer');
               
                 
	}

}
