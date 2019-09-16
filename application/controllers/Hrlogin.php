<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hrlogin extends CI_Controller{
  function __construct(){
    parent::__construct();
      $this->load->model('Hrlogin_model');
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->helper('url');
  }

  function index(){
      if ($this->session->userdata('user_email')) {
        redirect('hradmin', 'refresh');
    } else {
      $this->load->view('login_career');
    }
    
  }

  function auth(){

      $data = array(
          'user_email' => $this->input->post('email'),
          'user_password' => $this->input->post('password'),
      );
          $result = $this->Hrlogin_model->verifyLogIn($data);

          if ($result['valid']) {
              $iduser = $result['iduser'];
              $user_email = $result['user_email'];
              $user_name = $result['user_name'];
              $user_level = $result['user_level'];

              $userdata = array(
                  'iduser' => $iduser,
                  'user_name' => $user_name,
                  'user_email' => $user_email,
                  'user_level' => $user_level,
                  'logged_in' => TRUE
              );

              $this->session->set_userdata($userdata);

              redirect(base_url().'hradmin', 'refresh');
          } else {
              $this->session->set_flashdata('alert_msg', array('failure', 'Login', $result['error']));
              redirect(base_url());
          }
      
  

    /*$user_email    = $this->input->post('email',TRUE);
    $user_password = SHA1($this->input->post('password',TRUE));
    $validate = $this->Hrlogin_model->validate($user_email,$user_password);
    if($validate->num_rows() > 0){
        $data  = $validate->row_array();
        $iduser = $data['iduser'];
        $user_name  = $data['user_name'];
        $user_email = $data['user_email'];
        $user_level = $data['user_level'];
        $sesdata = array(
            'iduser'=> $iduser,
            'user_name'  => $user_name,
            'user_email'     => $user_email,
            'user_level'     => $user_level,
            'logged_in' => TRUE
        );
        $this->session->set_userdata($sesdata);
		redirect('hradmin'); 
    }else{
        echo $this->session->set_flashdata('msg','Username or Password is Wrong');
        redirect('hrlogin');
    }*/
  }

  function logout(){
      $this->session->sess_destroy();
      redirect('hrlogin');
  }

}
