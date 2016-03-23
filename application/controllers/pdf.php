<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  
  
class Pdf extends CI_Controller {  
  
function __construct() {
    
   parent::__construct();
   $this->load->helper(array('url','surattugaspdf'));
   $this->load->database();
   
}
 public function index($download_pdf='') {   
     $this->load->helper(array('url','surattugaspdf'));
      $this->load->database();
   $ret='';
   $keyword = 26 ;
   $pdf_filename ='surattugas_'.$keyword.'.pdf';
   $link_download = ($download_pdf == TRUE)?'':anchor(base_url().'index.php/pdf/index/true/','download pdf');
  //            $keyword = $this->uri->segment(3);
             $this->db->select('jeniskegiatan,tempat,tipekegiatan,nama,golongan,gol_ruang');
             $this->db->from('tsurattugas');
             $this->db->join('tkegiatan', 'tkegiatan.id = tsurattugas.kegiatan_id');
             $this->db->join('tpegawai','tpegawai.id = tsurattugas.pegawai_id');
             $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id');
           
             $this->db->like('id',$keyword);
             $this->db->group_by('id');
             $data = $this->db->get();
      if ($data->num_rows() > 0)
          $surattugas_info = $data->row_array();
      $data_surat_tugas =array(
          
          'surattugas_info' => $surattugas_info,
          'link_download'=>$link_download,
          
          );
      $suratprint_info = $this->load->view('surattugasprint_view',$data_surat_tugas,true);
      if ($download_pdf == true)
          generate_pdf($pdf_filename);
      else {
          
      echo $suratprint_info;
              
              
              
              
      }
      
          
      
}  
  

}   

