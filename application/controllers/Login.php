<?php
class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
      if(!isset($_SESSION)){

session_start();
}

//echo session_id();
//die();

        $this->load->model(array('m_user'));
        if ($this->session->userdata('u_name')) {
            redirect('Dashboard');
        }
    }
    function index() {
        
    //       $this->load->view('templates/navigation');
     //   $this->load->view('templates/header');          


        $this->load->view('login');
  //             $this->load->view('templates/footer');
    }

    function proses() {
        $this->form_validation->set_rules('username', 'username');
        $this->form_validation->set_rules('password', 'password');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('login');
        } else {

            $usr = $this->input->post('username');
            $psw = $this->input->post('password');
            $u = mysql_real_escape_string($usr);
            $p = md5(mysql_real_escape_string($psw));
            $cek = $this->m_user->cek($u, $p);
            if ($cek->num_rows() > 0) {
                //login berhasil, buat session
                foreach ($cek->result() as $qad) {
                    $sess_data['u_id'] = $qad->u_id;
                    $sess_data['nama'] = $qad->nama;
                    $sess_data ['is_logged_in']= true;
                    $sess_data['u_name'] = $qad->u_name;
                    $sess_data['role'] = $qad->role;
                    $this->session->set_userdata($sess_data);
                }
                
                
                
                
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect('login');
            }
        }
    }

    function logout() {
        $this->session->sess_destroy();
        redirect('login');
    }
}
