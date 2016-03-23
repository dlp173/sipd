
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Data_mahasiswa extends CI_Controller {

    function index() {
        $this->load->database();
               $this->load->helper('url');
        if($_POST==NULL) {
            $this->load->view('add_multiple');
        }else {
            redirect('data_mahasiswa/add_multiple_post/'.$_POST['banyak_data']);
        }
    }
    function add_multiple_post($banyak_data=0) {
        $this->load->database();$this->load->database();
        if($_POST==NULL) {
            $data['banyak_data'] = $banyak_data;
            $this->load->view('add_multiple_form',$data);
        }else {
            foreach($_POST['data'] as $d){
                $this->db->insert('mahasiswa',$d);
             
            }
            redirect('data_mahasiswa/lihat_data');
        }
    }
    function lihat_data(){
        $this->load->database();
        $data['mahasiswa'] = $this->db->get('mahasiswa')->result();
        $this->load->view('list_mahasiswa',$data);
    }
}
