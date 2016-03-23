<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model','pegawai');
                $this->load->library('session');

                $this->is_logged_in();
                }
                  public function is_logged_in(){
              //setting awal :  $is_logged_in=$this->session->userdata('is_logged_in');
                  $is_logged_in=$this->session->userdata('role')=='Administrator';
                      if(!isset($is_logged_in)||$is_logged_in!= true) {
                        redirect(base_url());
                        } 
	}

	public function index()
	{
            
               $this->load->model('pegawai_model');    
		$this->load->helper('url');
                 $data = array(
               'action' => base_url('index.php/pegawai/create'),
               'showgol' => $this->pegawai_model->showgol(),
               'showsatker'=>$this->pegawai_model->showsatker(),
            
                ); 
   
            
            
          
                $this->load->view('templates/header');
                $this->load->view('templates/navigation');
		$this->load->view('pegawai_view',$data);
                $this->load->view('templates/footer');
                 
	}

	public function ajax_list()
	{
                
            
		$list = $this->pegawai->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $pegawai) {
			$no++;
			$row = array();
			$row[] = $pegawai->nama;
			$row[] = $pegawai->nip;
			$row[] = $pegawai->jabatan;
			$row[] = $pegawai->gol_ruang;
                        $row[] = $pegawai->golongan;
			$row[] = $pegawai->satker;

			//add html for action
                        if ($pegawai->nama == 'Ditra liandaputra M kom')
                        {
                            
			$row[] = '<a class="btn btn-sm btn-primary" ><i class="glyphicon glyphicon-pencil"></i> Belum di tambah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_pegawai('."'".$pegawai->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                        }
                        else {
                            
                            $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void()" title="Edit" onclick="edit_pegawai('."'".$pegawai->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="delete_pegawai('."'".$pegawai->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
                        
                            
                        }
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->pegawai->count_all(),
						"recordsFiltered" => $this->pegawai->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->pegawai->get_by_id($id);
		echo json_encode($data);
	}

	public function ajax_add()
	{
	
                $data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'jabatan' => $this->input->post('jabatan'),
				'golongan_id' => $this->input->post('golongan_id'),
				'satker_id' => $this->input->post('satker_id'),
                               
			);
                
		$insert = $this->pegawai->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$data = array(
				'nama' => $this->input->post('nama'),
				'nip' => $this->input->post('nip'),
				'jabatan' => $this->input->post('jabatan'),
				'golongan_id' => $this->input->post('golongan_id'),
				'satker_id' => $this->input->post('satker_id'),
			);
		$this->pegawai->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->pegawai->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

}
