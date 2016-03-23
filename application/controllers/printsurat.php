<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printsurat extends CI_Controller {
public function __construct()
	{
		parent::__construct();
		
	 $this->load->library('session');

                $this->is_logged_in();
                }
                  public function is_logged_in(){
                $is_logged_in=$this->session->userdata('is_logged_in');
                        if(!isset($is_logged_in)||$is_logged_in!= true) {
                        redirect(base_url());
                        } 
	}
	
    
    
    public function index(){
		$this->load->view('dompdf');
	}
    public function print_surattugas(){
		$this->load->view('surattugasprint_view');
	}
    function pdf_welcome_message(){
        // load dompdf
        $this->load->helper('dompdf');
        //load content html
        $html = $this->load->view('welcome_message', '', true);
        // create pdf using dompdf
        $filename = 'Message';
        $paper = 'A4';
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
       
        $html = $this->load->view('stprint',$data,true);
        // create pdf using dompdf
        $filename = 'Large Table';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    
    public function pdf($id){
        $this->load->model('cetaksurattugas_model');  
           $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
               
              
               'sql' => $this->cetaksurattugas_model->printtgs($id),
               'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
                ); 
          $html = $this->load->view('cetaksurattugas',$data,true);
        // create pdf using dompdf
        $filename = 'Surat Tugas';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }

    public function viewpdf($id){
           $this->load->model('cetaksurattugas_model');    
             $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
               
               'printperintah' => $this->cetaksurattugas_model->printperintah($id),
               'sql' => $this->cetaksurattugas_model->printtgs($id),
               'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
             ); 
           $this->load->view('templates/navigation');
        $this->load->view('templates/header');          
        $this->load->view('viewspd',$data);
       $this->load->view('templates/footer');
    
      }
      public function printviewpdf($id){
           $this->load->model('cetaksurattugas_model');    
             $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
               
              'printperintah' => $this->cetaksurattugas_model->printperintah($id),
               'sql' => $this->cetaksurattugas_model->printtgs($id),
               'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
             ); 
      //     $this->load->view('templates/navigation');
    //    $this->load->view('templates/header');          
        $this->load->view('printviewspd',$data);
    //   $this->load->view('templates/footer');
    
      }
     public function cetakspd($id){
        $this->load->model('cetaksurattugas_model');    
          $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
               
              
               'sql' => $this->cetaksurattugas_model->printtgs($id),
               'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
               'statuskaryawan' => $this->cetaksurattugas_model-> get_id_kepala($id),
               'status' => $this->cetaksurattugas_model-> get_id_pengikut($id), 
                ); 
                 
             
    
                 
                 
                  $html = $this->load->view('cetakspd_view',$data,true);
        // create pdf using dompdf
        $filename = 'Large Table';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    
     public function viewcetakspd($id){
        $this->load->model('cetaksurattugas_model');    
        $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
                 'details_by_id' =>$this->cetaksurattugas_model->details_by_id($id),
               'printperintah' => $this->cetaksurattugas_model->printperintah($id),
               'sql' => $this->cetaksurattugas_model->printtgs($id),
               'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
               'statuskaryawan' => $this->cetaksurattugas_model-> get_id_kepala($id),
               'status' => $this->cetaksurattugas_model-> get_id_pengikut($id), 
      
                     ); 
                 
             
    
                 
        $this->load->view('templates/navigation');
        $this->load->view('templates/header');     
        $this->load->view('cetakspd_printview',$data);
        $this->load->view('templates/footer');
    }
         public function printcetakspd($id){
        $this->load->model('cetaksurattugas_model');    
          $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
               'details_by_id' =>$this->cetaksurattugas_model->details_by_id($id),
               'printperintah' => $this->cetaksurattugas_model->printperintah($id),
               'sql' => $this->cetaksurattugas_model->printtgs($id),
               'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
               'statuskaryawan' => $this->cetaksurattugas_model-> get_id_kepala($id),
               'status' => $this->cetaksurattugas_model-> get_id_pengikut($id), 
                ); 
                 
             
    
                 
        //      $this->load->view('templates/navigation');
      //  $this->load->view('templates/header');     
          $this->load->view('cetaksppd_printview',$data);
      //  $this->load->view('templates/footer');
    }
       // $this->load->view('templates/navigation');
      //  $this->load->view('templates/header');
      //  $this->load->view('cetakspd_view',$data);
       //        $this->load->view('templates/footer');
 //   }
    public function cetakspd2($id){
        $this->load->model('cetaksurattugas_model');    
	$this->load->helper('tglindonesia');	
                 $data = array(
               
               'printperintah' => $this->cetaksurattugas_model->printperintah($id),
               'sql' => $this->cetaksurattugas_model->details_by_id($id),
              // 'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
                ); 
       $this->load->view('templates/navigation');
        $this->load->view('templates/header');
        $this->load->view('cetakspd2_view',$data);
        $this->load->view('templates/footer');
    }
     public function cetakspd3($id){
        $this->load->model('cetaksurattugas_model');    
	$this->load->helper('tglindonesia');	
                 $data = array(
               
              'printperintah' => $this->cetaksurattugas_model->printperintah($id),
               'sql' => $this->cetaksurattugas_model->details_by_id($id),
              // 'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
                ); 
    
        $this->load->view('cetakspd3_view',$data);

    }
    public function cetakspdprint2($id){
        $this->load->model('cetaksurattugas_model'); 
         $this->load->helper('dompdf');
	$this->load->helper('tglindonesia');	
                 $data = array(
               
              
               'sql' => $this->cetaksurattugas_model->details_by_id($id),
           // 'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
                ); 
                 
                                 $this->load->view('templates/header');
                  $html =      $this->load->view('cetakspd2_view',$data,true);
                   $this->load->view('templates/footer');
        // create pdf using dompdf
        $filename = 'Large Table';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
    }
    

    
         public function cetakrincianbiaya($id,$idpegawai){         
          $this->load->model('rencanabiaya_model'); 
          $this->load->helper('dompdf');
	  $this->load->helper('tglindonesia');	
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                
                
            );
            
  
                  $html =      $this->load->view('reportkegiatan',$data,true);
                
        // create pdf using dompdf
        $filename = 'Large Table';
        $paper = 'A4';
        $orientation = 'potrait';
        pdf_create($html, $filename, $paper, $orientation);
           
         }
    public function prinsts($id,$idpegawai){
$this->load->model('rencanabiaya_model'); 
          $this->load->helper('dompdf');
	  $this->load->helper('tglindonesia');	
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                
                
            );
   
           $this->load->view('reportkegiatan',$data);
           
    
    }
    public function printtest($id,$idpegawai){
$this->load->model('rencanabiaya_model'); 
          $this->load->helper('dompdf');
	  $this->load->helper('tglindonesia');	
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                
                
            );
   
           $this->load->view('printtest',$data);
           
    
    }
        public function printkwitansi($id){
             $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                $this->load->helper('date');
           
                
            $data = array (
                  'printkwitansi'=>$this->rencanabiaya_model->printkwitansi($id),
                  'printkwitansijumlah'=>$this->rencanabiaya_model->printkwitansijumlah($id),
               //  'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                
                
            );
    
    
            $this->load->view('printkwitansi',$data);
 
            
            
        }
         public function prints($id,$idpegawai){
             $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                $this->load->helper('date');
           
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                
                
            );
    
    
            $this->load->view('cetakbiayapegawai_view',$data);
 
            
            
        }
         public function printbiayarill($id,$idpegawai){
             $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                $this->load->helper('date');
           
                
            $data = array (
                    'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                    'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                
                
            );
    
    
                     
         //  $this->load->view('templates/navigation');
     //      $this->load->view('templates/header');     
           $this->load->view('printbiayarill_view',$data);
      //     $this->load->view('templates/footer');
 
            
            
        }
         public function printsptjb($id){
             $this->load->model('rencanabiaya_model');
             $this->load->model('cetaksurattugas_model');
            $this->load->helper('text');
                $this->load->helper('tglindonesia');
                $this->load->helper('date');
           
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                   // 'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                  'statuskaryawan'=>$this->rencanabiaya_model->get_id_kepala($id),
           //     'printppk'=>$this->rencanabiaya_model->printppk($id),
                  'printkwitansi'=>$this->rencanabiaya_model->printkwitansi($id),
                  'printkota'=>$this->rencanabiaya_model->printkota($id),
                //  'sql1' => $this->cetaksurattugas_model->printtgskegiatan($id),
                
                
                
            );
    
    
                     
         //  $this->load->view('templates/navigation');
     //      $this->load->view('templates/header');     
           $this->load->view('printsptjb_view',$data);
    //       $this->load->view('templates/footer');
 
            
            
        }
}