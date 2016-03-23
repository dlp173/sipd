<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('laporan2_model','cst');
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
             
               $data =array (
               'showpegawai'=>$this->cst->showpegawai(),
               'query' =>$this->cst->getalldata(),
              );
              
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('laporan2_view',$data);
                $this->load->view('templates/footer');
                 
	}
           public function ajax_detail($id)
	  {
            
      //      $this->load->model('cetaksurattugas_model','cst');
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
		$this->load->view('laporan2_view',$data);
                $this->load->view('templates/footer');
               //  echo json_encode($data);
                  
          }
                public function inputlaporankegiatans($id){
                    
                $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                
                $data = array (
                  'showpegawai'=>$this->cst->showpegawai(),
                    'sqlsurattugas' => $this->rencanabiaya_model->getsurattugas($id),
                    'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  //  'sqlsurattugas' =>$this->rencanabiaya_model->sqlsurattugas($id),
                  'printnormativetombol'=>$this->rencanabiaya_model->printnormativetombol($id),  
                   // 'inputbiaya'=>$this->rencanabiaya_model->inputbiaya($id),
                );
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('laporan2input_view',$data);
                $this->load->view('templates/footer');
              //  echo json_encode($data);
                }
              
                public function viewnotadinas($id){
                     $this->load->model('laporan2_model');
                       $this->load->helper('tglindonesia');
                    $data = array (
                        
                        'viewnotadinas' =>$this->laporan2_model->viewnotadinas($id),
                      
                         
                    );
                    
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('notadinas_view',$data);
              
                    
                    
                    
                }
                public function detailsbiayakegiatans($idpegawai='',$idkegiatan=''){
                    
                $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
         
                $data = array (
                 // 'sqlricianbiaya' => $this->rencanabiaya_model->detilasrincianbiaya($id),
                   
                    'sqlricianbiayapegawai'=>$this->rencanabiaya_model->detilasrincianbiayapegawai($idpegawai,$idkegiatan),
                    'suratid'=>$this->rencanabiaya_model->suratid($idpegawai,$idkegiatan),
                  
                    'showsatker' => $this->rencanabiaya_model->showsatker(),
                    'showprogram' => $this->rencanabiaya_model->showprogram(),
                    'showkegiatan' => $this->rencanabiaya_model->showkegiatan(),
                );
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('laporan2input_view',$data);
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
                $this->load->model('rencanabiaya_model');
                $this->load->helper('tglindonesia');
                $this->load->model('laporan2_model','lap');
		 $data = array (
                  'showpegawai'=>$this->lap->showpegawai(),
                  'laporan'=>$this->lap->laporan($id),
                  'sqlsurattugas' => $this->rencanabiaya_model->getsurattugas($id),
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
               //  'sqlsurattugas' =>$this->rencanabiaya_model->sqlsurattugas($id),
                  'printnormativetombol'=>$this->rencanabiaya_model->printnormativetombol($id),  
                   // 'inputbiaya'=>$this->rencanabiaya_model->inputbiaya($id),
                );
		$this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('laporan2input_edit',$data);
                $this->load->view('templates/footer');
	}
        

	public function ajax_add()
	{
	  $this->load->model('subkegiatans_model');
                $data = array(
                                'subkegiatans_id' => $this->input->post('subkegiatans_id'),
                                'pegawai_id' => $this->input->post('pegawai_id'),
                                'umum' => $this->input->post('umum'),
                                'maksud' => $this->input->post('maksud'),
                                'ruanglingkup'  =>$this->input->post('ruanglingkup'),
                                'dasar' => $this->input->post('dasar'),
                                'hasilyangdicapai' => $this->input->post('hasilyangdicapai'),
                                'kesimpulan' => $this->input->post('kesimpulan'),
                                'penutup'=>$this->input->post('penutup'),
                             );
              $data2 = array(
                                
				
				'laporan_id' => $this->input->post('laporan_id'),
                                
			);
                $this->cst->update(array('id' => $this->input->post('id')), $data2);
                $insert = $this->cst->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update($id)
	{
		  $data = array(
                                'subkegiatans_id' => $this->input->post('subkegiatans_id'),
                                'pegawai_id' => $this->input->post('pegawai_id'),
                                'umum' => $this->input->post('umum'),
                                'maksud' => $this->input->post('maksud'),
                                'ruanglingkup'  =>$this->input->post('ruanglingkup'),
                                'dasar' => $this->input->post('dasar'),
                                'hasilyangdicapai' => $this->input->post('hasilyangdicapai'),
                                'kesimpulan' => $this->input->post('kesimpulan'),
                                'penutup'=>$this->input->post('penutup'),
                             );
          	$this->cst->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
               $data2 = array(
                                
				
				'statusbiaya' => $this->input->post('statusbiaya'),
                                
			);
               
		
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
                  'printnormative'=>$this->rencanabiaya_model->printnormative($id),
                  'printnormativetotalbiaya'=>$this->rencanabiaya_model->printnormativetotalbiaya($id),
                
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
		    $data = "<option value=''>- select kegiatan -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->id."'>".$value->namakegiatan." </option>";
		    }
		    echo $data;
		}
        function add_ajax_anggaran($id){
                    $query = $this->db->get_where('tkegiatans',array('id'=>$id));
                     $data = "<value=''>- Sisa Anggaran Kegiatan -</option>";
		    foreach ($query->result() as $value) {
		        $data .= "<option value='".$value->nominalkegiatan." class='c12''>".$value->nominalkegiatan." </option>";
		    }
		    echo $data;
		}
                 
        
      }