<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetaksurattugas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cetaksurattugas_model','cst');
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
		$this->load->view('cetaksurattugas_view',$data);
                $this->load->view('templates/footer');
                 
	}
           public function ajax_detail($id)
	  {
            
      //      $this->load->model('cetaksurattugas_model','cst');
		 $this->load->model('cetaksurattugas_model');    
	         $this->load->helper('tglindonesia');
            
             $data = array (
                 'get_datatables' => $this->cst->get_datatables($id),
                 'sql'=> $this->cst->details_by_id($id),
                 'showpegawai' => $this->cst->showpegawai(),
  
                );
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('printsurattugas_view',$data);
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
		$data = $this->cst->get_datatables($id);
		echo json_encode($data);
	}
        

	public function ajax_add()
	{
	
                $data = array(
                                'subkegiatans_id' => $this->input->post('subkegiatans_id'),
				'pegawai_id' => $this->input->post('pegawai_id'),
				'status_karyawan' => $this->input->post('status_karyawan'),
                                
			);
                
		$insert = $this->cst->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update($id)
	{
		$data = array(
                                'no_spd' => $this->input->post('no_spd'),
			);
                   
		$this->cst->update(array('id' => $this->input->post('subkegiatans_id')), $data);
                
                
                
                
                
		echo json_encode(array("status" => TRUE));
	}
        public function ajax_update_sptjb($id)
	{
		$data = array(
                                'no_sptjb' => $this->input->post('no_sptjb'),
			);
                   
		$this->cst->update(array('id' => $this->input->post('subkegiatans_id')), $data);
                
                
                
                
                
		echo json_encode(array("status" => TRUE));
	}
        
        
        public function ajax_addnospd()
	{
		$data = array(
                                'no_spd' => $this->input->post('no_spd'),
				
			);
		$this->cst->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

        
        
	public function ajax_delete($id)
	{
		$this->cst->delete_by_id($id);
                //$data['get_datatables'] = $this->cst->get_datatables($id);
           
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
                $data['del']=$this->cst->delete_by_id_peserta();
                redirect('index.php/cetaksurattugas/ajax_detail/' .$id ,$data);


          
        }
}