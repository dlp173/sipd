<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index(){
		$this->load->view('reportkegiatan');
	}
    public function print_surattugas(){
		$this->load->view('surattugasprint_view');
	}
    function pdf_welcome_message(){
        // load dompdf
        $this->load->helper('dompdf');
        //load content html
        $html = $this->load->view('reportkegiatan', '', true);
        // create pdf using dompdf
        $filename = 'Message';
        $paper = 'f4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    
    function pdf_large_table(){
        // load dompdf
        $this->load->helper('dompdf');
        $this->load->model('surattugas_model');    
        $data = array(
               'action' => base_url('index.php/suarttugas/create'),
               'showkeg' => $this->surattugas_model->showkeg(),
               'showpeg' => $this->surattugas_model->showpeg(),
               'sql' => $this->surattugas_model->printtgs(),
               'sql1' => $this->surattugas_model->printtgskegiatan(),
               
                ); 
        //load content html
       
        $html = $this->load->view('large_table',$data,true);
        // create pdf using dompdf
        $filename = 'Large Table';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    
    public function pdf($id){
        $this->load->model('surattugas_model');    
		
                 $data = array(
               'action' => base_url('index.php/suarttugas/create'),
               'showkeg' => $this->surattugas_model->showkeg(),
               'showpeg' => $this->surattugas_model->showpeg(),
               'sql' => $this->surattugas_model->printtgs($id),
               'sql1' => $this->surattugas_model->printtgskegiatan($id),
                ); 
        $this->load->view('templates/navigation');
        $this->load->view('templates/header');
        $this->load->view('stprint',$data);
               $this->load->view('templates/footer');
    }
}