<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rencanabiaya extends CI_Controller {

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
               $data['query']= $this->cst->getalldata();
               

              
              
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('rincianbiayaall_view',$data);
                $this->load->view('templates/footer');
                 
	}
           public function ajax_detail($id)
	  {
            
            
		 $this->load->model('Rencanabiaya_model');    
	         $this->load->helper('tglindonesia');
            
             $data = array (
                  'get_datatables' => $this->cst->get_datatables($id),
                  
                  'sql'=> $this->cst->details_by_id($id),
                  'sql1'=> $this->cst->details_by_id($id),
              // 'showpegawai' => $this->cst->showpegawai(),
  
                );
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('rencanabiayadetail_view',$data);
                $this->load->view('templates/footer');
               //  echo json_encode($data);
                  
          }
                public function biayakegiatans($id){
                    
                $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
              //   $this->load->model('cetaksurattugas_model');
                $data = array (
                
                    'sqlsurattugas' => $this->rencanabiaya_model->getsurattugas($id),
                    //'a' => $this->cetaksurattugas_model->get_datatables($id),
                    'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  //  'sqlsurattugas' =>$this->rencanabiaya_model->sqlsurattugas($id),
                  'printnormativetombol'=>$this->rencanabiaya_model->printnormativetombol($id),  
                   // 'inputbiaya'=>$this->rencanabiaya_model->inputbiaya($id),
                );
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
	        $this->load->view('rencanabiayadetail_view',$data);
                $this->load->view('templates/footer');
              //  echo json_encode($data);
                }
              
	
                public function detailsbiayakegiatans($idpegawai='',$idkegiatan=''){
                    
                $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
         
                $data = array (
                 // 'sqlricianbiaya' => $this->rencanabiaya_model->detilasrincianbiaya($id),
                   
                    'sqlricianbiayapegawai'=>$this->rencanabiaya_model->detilasrincianbiayapegawai($idpegawai,$idkegiatan),
                    'suratid'=>$this->rencanabiaya_model->suratid($idpegawai,$idkegiatan),
                    'getbiayarep'=>$this->rencanabiaya_model->getbiayarep(),
                    'showsatker' => $this->rencanabiaya_model->showsatker(),
                    'showprogram' => $this->rencanabiaya_model->showprogram(),
                    'showkegiatan' => $this->rencanabiaya_model->showkegiatan(),
                );
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('rencanabiayadetail2_view',$data);
                $this->load->view('templates/footer');
               //  echo json_encode($data);
                }
              
	
        /*
     public function ajax_list($id)
	{
                
         
		$list = $this->cst->get_datatables($id);
		 $data = array();
		$no = $_POST['start'];
		foreach ($list as $cst) {
			$no++;
			$row = array();
                          $row[] = $cst->id;
             $row[] = $cst->nama;
                 
                       

                   
                        
			
			//add html for action
				
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_kegiatans('."'".$cst->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_kegiatans('."'".$cst->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                                  <a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="detail_kegiatans('."'".$cst->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Detail</a>
				  ';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->cst->count_all(),
						"recordsFiltered" => $this->cst->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}*/

    	public function ajax_edit($id)
	{
//		$data = $this->cst->get_by_id($id);
                $data = $this->cst->get_datatables($id);
		echo json_encode($data);
	}
        

	public function ajax_add()
	{
	 $this->load->model('kegiatans_model');
                $data = array(
                                'satker_id' => $this->input->post('satker_id'),
                                'program_id' => $this->input->post('program_id'),
                                'kegiatan_id' => $this->input->post('kegiatan_id'),
                                'subkegiatans_id' => $this->input->post('subkegiatans_id'),
                                'tipekegiatan'  =>$this->input->post('tipekegiatan'),
                                'biaya_satker_id' => $this->input->post('biaya_satker_id'),
                                'biaya_program_id' => $this->input->post('biaya_program_id'),
                                'biaya_kegiatan_id' => $this->input->post('biaya_kegiatan_id'),
                                'pegawai_id'=>$this->input->post('pegawai_id'),
                                'biayainap_id' => $this->input->post('biayainap_id'),
                                'biayainap' => $this->input->post('biayainap'),
                                'hariinap'=>$this->input->post('hariinap'),
                                'totalbiayainap' => $this->input->post('totalbiayainap'),
                                'biayatanpainap' => $this->input->post('biayatanpainap'),
                                'haritanpainap' => $this->input->post('haritanpainap'),
                                'biayaharian_id' => $this->input->post('biayaharian_id'),
                                'biayaharian' => $this->input->post('biayaharian'),
                                'totalbiayaharian' => $this->input->post('totalbiayaharian'),
                           //   'taksi_id' => $this->input->post('taksi_id'),
                                'totalbiayataksi' => $this->input->post('totalbiayataksi'),
                                'biayarep' => $this->input->post('biayarep'),
                 //   'biayarill' => $this->input->post('biayarill'),
                                'totalbiayataksidepatiamir' =>$this->input->post('totalbiayataksidepatiamir'),
                   'transportluarkotamasihbangka'=>$this->input->post('transportluarkotamasihbangka'),
                              //  'biayatiketpergi_id' =>$this->input->post('biayatiketpergi_id'),
                                'biayatiketpergi' => $this->input->post('biayatiketpergi'),
                             //   'biayatiketpulang_id'=>$this->input->post('biayatiketpulang_id'),
                                'biayatiketpulang' => $this->input->post('biayatiketpulang'),
                    'no_bukti' => $this->input->post('no_bukti'),
                    'akun' => $this->input->post('akun'),
                    'tgl_dibuat' => $this->input->post('tgl_dibuat'),
                                'totalhari' => $this->input->post('totalhari'),
                                'totalbiaya'=>$this->input->post('totalbiaya'),
                        'mataanggaran'=>$this->input->post('mataanggaran'),
                                
                                
                              
                                
			);
          
               $data2 = array(
                                
				
				'statusbiaya' => $this->input->post('statusbiaya'),
                                
			);
                 $data3 = array(
                                
				
				'sisaanggaran' => $this->input->post('sisaanggaran'),
                                
			);
                $this->kegiatans_model->updatesisa(array('id' => $this->input->post('biaya_kegiatan_id')), $data3); 
            //    var_dump($data3);
                $this->cst->update(array('id' => $this->input->post('id')), $data2);
                $insert = $this->cst->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update($id)
	{
		
		$data = array(
                                'satker_id' => $this->input->post('satker_id'),
                                'program_id' => $this->input->post('program_id'),
                                'kegiatan_id' => $this->input->post('kegiatan_id'),
                                'subkegiatans_id' => $this->input->post('subkegiatans_id'),
                                'tipekegiatan'  =>$this->input->post('tipekegiatan'),
                                'biaya_satker_id' => $this->input->post('biaya_satker_id'),
                                'biaya_program_id' => $this->input->post('biaya_program_id'),
                                'biaya_kegiatan_id' => $this->input->post('biaya_kegiatan_id'),
                                'pegawai_id'=>$this->input->post('pegawai_id'),
                                'biayainap_id' => $this->input->post('biayainap_id'),
                                'biayainap' => $this->input->post('biayainap'),
                                'hariinap'=>$this->input->post('hariinap'),
                                'totalbiayainap' => $this->input->post('totalbiayainap'),
                                'biayatanpainap' => $this->input->post('biayatanpainap'),
                                'haritanpainap' => $this->input->post('haritanpainap'),
                                'biayaharian_id' => $this->input->post('biayaharian_id'),
                                'biayaharian' => $this->input->post('biayaharian'),
                                'totalbiayaharian' => $this->input->post('totalbiayaharian'),
                           //   'taksi_id' => $this->input->post('taksi_id'),
                                'totalbiayataksi' => $this->input->post('totalbiayataksi'),
                                'totalbiayataksidepatiamir' =>$this->input->post('totalbiayataksidepatiamir'),
                                'biayarep' => $this->input->post('biayarep'),
                              //  'biayatiketpergi_id' =>$this->input->post('biayatiketpergi_id'),
                                'biayatiketpergi' => $this->input->post('biayatiketpergi'),
                             //   'biayatiketpulang_id'=>$this->input->post('biayatiketpulang_id'),
                                'biayatiketpulang' => $this->input->post('biayatiketpulang'),
                                'totalhari' => $this->input->post('totalhari'),
                    'mataanggaran'=>$this->input->post('mataanggaran'),
                           //    'totalbiaya'=>$this->input->post('totalbiaya'),
                                
                                
                              
                                
			);
          	$this->cst->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
                $this->load->model('kegiatans_model');
               // Tambah ke sisa anggaran jika transaksi di inpu ulang var $tambah sisaanggaran
                
      
          
               $hasil = array(
                                
				
				'sisaanggaran' => $this->input->post('totalbiaya')+ $this->input->post('sisaanggaran'),
                                
			);
           
                $data2 = array(
                                
				
				'statusbiaya' => $this->input->post('statusbiaya'),
                                
			);
               
		$this->kegiatans_model->updateanggaran(array('id' => $this->input->post('biaya_kegiatan_id')), $hasil);
               //var_dump($hasil);
                $this->cst->update(array('id' => $this->input->post('id')), $data2);
		$this->cst->delete_by_id($id);
    
		echo json_encode(array("status" => TRUE));
	}
       
        public function printsurattugas($id){
        
            
            $this->db->select('*');
            $this->db->from('tsurat');
            $this->db->join('tsubkegiatans', 'tsurat.subkegiatans_id = tsubkegiatans.id','inner');
            $this->db->join('tpegawai','tsurat.pegawai_id = tpegawai.id','inner');
            $this->db->join('tgolongan','tgolongan.id = tpegawai.golongan_id','inner');
            $this->db->where('tsubkegiatans.id',$id);
            $sql = $this->db->get();

		return $sql->result();

        
        }
        public function pdfspd()
	{
             $this->load->model('cetaksurattugas_model');    
	     $this->load->helper('tglindonesia');
             // $this->load->model('cetaksurattugas_model','cst');
               $data['query']= $this->cst->getalldata();
               

              
              
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('cetakspd_view',$data);
                $this->load->view('templates/footer');
                 
	}
        public function ajax_delete_peserta($idpegawai)
	{
		$this->cst->delete_by_id_peserta($idpegawai);
                $this->load->model('cetaksuratugas_model');
             $data['del']=$this->cetaksurattugas_model->delete_by_id_peserta();
             redirect('index.php/cetaksurattugas/ajax_detail/' .$id ,$data);

         
        }

        public function printbiayanormatif($id){
             $this->load->model('rencanabiaya_model');
             $this->load->helper('tglindonesia');
                
            $data = array (
                 // 'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'printnormativetotalbiaya'=>$this->rencanabiaya_model->printnormativetotalbiaya($id),
                'printnormative'=>$this->rencanabiaya_model->printnormative_fix($id),
                
            );
            $this->load->view('templates/header');
            $this->load->view('templates/navigation');
            $this->load->view('printbiayanormatif',$data);
            $this->load->view('templates/footer');
            
            
        }
         public function cetakbiayanormatif($id){
             $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
               'printnormativetotalbiaya'=>$this->rencanabiaya_model->printnormativetotalbiaya($id),
                
            );
          //  $this->load->view('templates/header');
          // $this->load->view('templates/navigation');
          $this->load->view('cetakbiayanormatif',$data);
          //  $this->load->view('templates/footer');
            
            
        }
        
        
         public function printrincianbiaya($id,$idpegawai){
             $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                
            $data = array (
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'rincianprintnormative'=>$this->rencanabiaya_model->rincianprintnormative($id,$idpegawai),
                  'suratid' =>$this->rencanabiaya_model->suratid($id,$idpegawai),  
               
                
            );
            $this->load->view('templates/header');
            $this->load->view('templates/navigation');
            $this->load->view('printrincianbiaya_view',$data);
            $this->load->view('templates/footer');
            
            
        }
        
        public function downloadbiayanormative(){
            


            $this->load->view('downloadbiayanormative');
         
            
            
        }
        
        public function ajax_edit_normatif($id,$idpegawai)
	{
            $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                
                $data = array (
                   
                    'editsuratid'=>$this->rencanabiaya_model->editsuratid($idpegawai,$id),
                  
                  
                    'showsatker' => $this->rencanabiaya_model->showsatker(),
                    'showprogram' => $this->rencanabiaya_model->showprogram(),
                    'showkegiatan' => $this->rencanabiaya_model->showkegiatan(),
                    'editrincianprintnormative' => $this->cst->editrincianprintnormative($id,$idpegawai),
                    'editsqlricianbiayapegawai'=>$this->rencanabiaya_model->editdetilasrincianbiayapegawai($idpegawai,$id),
                    
                );
                
		
		 $this->load->view('templates/header');
                 $this->load->view('templates/navigation');
                $this->load->view('rencanabiayadetail2edit_view',$data);
                $this->load->view('templates/footer');
	}
        
        
        function add_ajax_program($idsatker){
		    $query = $this->db->get_where('tprogram',array('satker_id'=>$idsatker));
		    $data = "<option value=''>- Select program -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->idprogram."'>".$value->namaprogram."</option>";
		    }
                    echo $data;
		   // echo json_encode($data);
        }
        function add_ajax_kegiatans($idprogram){
                    $query = $this->db->get_where('tkegiatans',array('program_id'=>$idprogram));
		    $data = "<option value='0'>- select kegiatan -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->namakegiatan."   [".$value->tipekegiatan."]</option>";
		    }
		    echo $data;
		}
        function add_ajax_anggaran($id){
                    $query = $this->db->get_where('tkegiatans',array('id'=>$id));
                     $data = "<value='0'>- Sisa Anggaran Kegiatan -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->sisaanggaran." class='c12''>".$value->sisaanggaran." </option>";
		    }
		    echo $data;
		}
                 
        
      }