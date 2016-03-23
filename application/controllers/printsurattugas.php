<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Printsurattugas extends CI_Controller {
//public function __construct()
//{
//parent::__construct();
//}
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
        
        
        $this->load->view('surattugasprint_view');
        
    }     
        public function detailCat($id=""){
         $data = array (
                 'data'=>$this->db->get_where('categories', array('id_cat'=>$id)),
              	);
         $this->load->view('categories/detailCategories', $data);
   
    }
    
    public function test(){
        $query = $this->db->get('mytable');

foreach ($query->result() as $row)
{
    echo $row->title;
}  
        
           $this->load->database();
            $this->load->model('surattugas_model');
            $keyword = $this->uri->segment(3);      
           $query =
            $this->db->select('tkegiatan.jeniskegiatan,tkegiatan.id');
            $this->db->from('tsurattugas');
            $this->db->join('tpegawai', 'tsurattugas.pegawai_id = tpegawai.id','inner');
            $this->db->join('tkegiatan','tsurattugas.kegiatan_id = tkegiatan.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->where('tkegiatan.id',$keyword);
            $query = $this->db->get();
	   
  
        $this->load->view('surattugasprint_view',$query);    
        
        
        
    }
    public function listprint($id=""){
        
         $this->load->database();
         $this->load->helper('url');
         $this->load->model('surattugas_model');
         $data['surattugas'] = $this->surattugas_model->printsurat(); 
         
                
             
             $this->load->view('surattugasprint_view',$data);
           }
           
            function pdf_large_table($id){
        // load dompdf
        $this->load->helper('dompdf');
        $this->load->model('surattugas_model');    
        $data = array(
               'action' => base_url('index.php/printsurattugas/pdf_large_table'),
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
        
    }
    
    
