<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settingakun extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('settingakun_model','akun');
	 $this->load->library('session');

             
                }
                 
    public function is_logged_in(){
                  $is_logged_in=$this->session->userdata("logged_in");
                        if(!isset($is_logged_in)||$is_logged_in!= true) {
                        redirect(base_url());
                        } 
	}

	public function index()
	{
            
               $this->load->model('settingakun_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/biaya/create'),
    

                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('settingakun_view',$data);
                $this->load->view('templates/footer');
                 
	}

	
	public function ajax_update()
	{
            
            
            
            
		$data = array(
				'u_paswd' =>  md5($this->input->post('u_paswd')),
			);
                
		$this->akun->update(array('u_id' => $this->input->post('u_id')), $data);
              
		redirect('settingakun');
	}

	
}
