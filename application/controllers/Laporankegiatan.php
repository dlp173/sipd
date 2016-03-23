<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporankegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rencanabiaya_model','cst');
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
            
             // $this->load->model('cetaksurattugas_model','cst');
              
          
                    
               
                $this->load->helper('tglindonesia');
                
               $this->load->model('subkegiatans_model');    
                $data['showpegawai'] = $this->subkegiatans_model->showpegawai();
                   
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('laporankegiatan',$data);
                $this->load->view('templates/footer');
                 
	}
           function cari() {
               $this->load->model('laporan_model');
               $this->load->helper('tglindonesia');
               $data['tampil']=$this->laporan_model->caridata();
                if($data['tampil']==null) {
       
                     print 'maaf data yang anda cari tidak ada atau kata kunci salah';
         
          
                  }
                    else {
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporankegiatan_view',$data);
                         $this->load->view('templates/footer');
                   }
        }
    public function select_by_id() {
            $nama = $this->input->post('nama');
            if ($nama != "") {
            $result = $this->laporan_model->show_data_by_id($name);
            if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
            } else {
            $data = array(
            'id_error_message' => "Id field is required"
            );
            }
            $data['show_table'] = $this->view_table();
            $this->load->view('laporankegiatan_view', $data);
            }

        public function select_by_date() {
            $date = $this->input->post('date');
            if ($date != "") {
            $result = $this->laporan_model->show_data_by_date($date);

            if ($result != false) {
            $data['result_display'] = $result;
            } else {
            $data['result_display'] = "No record found !";
            }
            } else {
            $data['date_error_message'] = "Date field is required";
            }
            $data['show_table'] = $this->view_table();
            $this->load->view('laporankegiatan_view', $data);
            }

public function select_by_date_range() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $nama = $this->input->post('nama');         
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
        'nama' => $nama,
        );
        
        $data['result_display'] = $this->laporan_model->show_data_by_date_range($data);
     
                if($data['result_display']==null) {
       
                     print 'maaf data yang anda cari tidak ada atau kata kunci salah';
         
          
                  }
                    else {
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporankegiatan_view',$data);
                         $this->load->view('templates/footer');
                   }
        
        
}
public function select_by_date_range_print() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
        $nama = $this->input->post('nama');         
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
        'nama' => $nama,
        );
        
        $data['result_display'] = $this->laporan_model->show_data_by_date_range($data);
     
                if($data['result_display']==null) {
       
                     print 'maaf data yang anda cari tidak ada atau kata kunci salah';
         
          
                  }
                    else {
                      
                      //   $this->load->view('templates/navigation');
                         $this->load->view('laporankegiatanprint_view',$data);
                 
                   }
        
        
}
public function periodekegiatan() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
       
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
        
        );
        
        
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporanperiodekegiatan_view');
                         $this->load->view('templates/footer');
            
        
        
}
public function filterkegiatan() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
               
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
       
        );
        
        $data['result_display'] = $this->laporan_model->show_data_by_periode($data);
     
                if($data['result_display']==null) {
       
                     print 'maaf data yang anda cari tidak ada atau kata kunci salah';
         
          
                  }
                    else {
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporanfilterkegiatan_view',$data);
                         $this->load->view('templates/footer');
                   }
        
        
}

public function filterkegiatanprint() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
               
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
       
        );
        
        $data['result_display'] = $this->laporan_model->show_data_by_periode($data);
     
                if($data['result_display']==null) {
       
                     print 'maaf data yang anda cari tidak ada atau kata kunci salah';
         
          
                  }
                    else {
                         //$this->load->view('templates/header');
                       //  $this->load->view('templates/navigation');
                         $this->load->view('laporanfilterkegiatanprint_view',$data);
                      //   $this->load->view('templates/footer');
                   }
        
        
}
public function periodefilter() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
       
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
        
        );
        
        
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporankegiatans_view');
                         $this->load->view('templates/footer');
            
        
        
}

public function periodefilterkegiatan() {
     $this->load->model('laporan_model');
                $this->load->helper('tglindonesia');
           
        $date1 = $this->input->post('date_from');
        $date2 = $this->input->post('date_to');
               
        $data = array(
        'date1' => $date1,
        'date2' => $date2,
       
        );
        
        $data['result_display'] = $this->laporan_model->show_data_by_kegiatan($data);
     
                if($data['result_display']==null) {
       
                     print 'maaf data yang anda cari tidak ada atau kata kunci salah';
         
          
                  }
                    else {
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporanfilteperiode_view',$data);
                         $this->load->view('templates/footer');
                   }
        
        
}
public function sisaanggaran() {
     $this->load->model('laporan_model');
      $this->load->helper('tglindonesia');
      $data['query']= $this->laporan_model->sisaanggaran();
        
        
        
        
                         $this->load->view('templates/header');
                         $this->load->view('templates/navigation');
                         $this->load->view('laporansisaanggaran_view',$data);
                         $this->load->view('templates/footer');
            
        
        
}
        
}