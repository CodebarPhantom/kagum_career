<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Hradmin extends CI_Controller{


  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') !== TRUE){
      redirect('errorpage/error403');
    }
      $this->load->model('Career_users_model');
      $this->load->model('Career_city_model');
      $this->load->model('Career_hotels_model');
      $this->load->model('Career_jobtitle_model');
      $this->load->model('Career_departement_model');
      $this->load->model('Career_vacancy_model');
      $this->load->library('form_validation');
      $this->load->library('pagination');
      $this->load->library('session');
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->helper('url');
  }


  function index(){
    //Allowing akses to admin only
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
        $page_data['page_name'] = 'dashboard';
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_user'] = $this->lang->line('add_user');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $this->load->view('admin/index',$page_data);
     }else{
        redirect('errorpage/error403');
     }

  }

  function list_users(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1'){

    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hradmin/list_users?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hradmin/list_users?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hradmin/list_users';
            $config['first_url'] = base_url() . 'hradmin/list_users';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_users_model->total_rows_user($q);
        $career_users = $this->Career_users_model->get_limit_data_user($config['per_page'], $start, $q);
        
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_users';
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');
        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data');
        $page_data['lang_update_password_failure'] = $this->lang->line('update_password_failure');
        $page_data['lang_failure_update_password'] = $this->lang->line('failure_update_password');
        $page_data['lang_new_password_must_same'] = $this->lang->line('new_password_must_same');       
        $page_data['lang_user'] = $this->lang->line('user');        
        $page_data['lang_username'] = $this->lang->line('username');
        $page_data['lang_password'] = $this->lang->line('password');
        $page_data['lang_new_password'] = $this->lang->line('new_password');
        $page_data['lang_confirm_password'] = $this->lang->line('confirm_password');
        $page_data['lang_change_password_for'] = $this->lang->line('change_password_for');
        $page_data['lang_change_password'] = $this->lang->line('change_password');
        $page_data['lang_email'] = $this->lang->line('email');
        $page_data['lang_level'] = $this->lang->line('level');
        $page_data['lang_choose_level'] = $this->lang->line('choose_level');
        $page_data['lang_status'] = $this->lang->line('status');
        $page_data['lang_active'] = $this->lang->line('active');
        $page_data['lang_inactive'] = $this->lang->line('inactive');
        $page_data['lang_choose_status'] = $this->lang->line('choose_status');
        $page_data['lang_add_user'] = $this->lang->line('add_user');
        $page_data['lang_edit_user'] = $this->lang->line('edit_user');
        $page_data['lang_delete_user'] = $this->lang->line('delete_user');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_choose_departement'] = $this->lang->line('choose_departement');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');
        $page_data['lang_search_users'] = $this->lang->line('search_users');

        $page_data['career_users_data'] = $career_users;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

    $this->load->view('admin/index',$page_data);
      }else{
        redirect('errorpage/error403');
    }
  }

  function insert_user(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1'){
    $data = array(
      'iddept' => $this->input->post('iddept',TRUE),
      'user_name' => $this->input->post('user_name', TRUE),
      'user_email' => $this->input->post('user_email', TRUE),
      'user_password' => SHA1($this->input->post('user_password', TRUE)),
      'user_level' => $this->input->post('user_level', TRUE),
      'user_status' => $this->input->post('user_status', TRUE)
      );  
     
        $this->Career_users_model->insertData( 'career_users',$data);
        $this->session->set_flashdata('input_success','message');
        
        redirect(site_url('hradmin/list_users'));
        }else{
        redirect('errorpage/error403');
    }
      
  }

  function update_user(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1'){
    $data = array(
      'iddept' => $this->input->post('iddept',TRUE),
      'user_name' => $this->input->post('user_name', TRUE),
      'user_email' => $this->input->post('user_email', TRUE),
      'user_level' => $this->input->post('user_level', TRUE),
      'user_status' => $this->input->post('user_status', TRUE)
      );  
     
        $this->Career_users_model->updateDataUser('career_users', $data, $this->input->post('iduser', TRUE));
        $this->session->set_flashdata('update_success','message');
        redirect(site_url('hradmin/list_users'));
      }else{
        redirect('errorpage/error403');
    }
  }

  function delete_user($iduser){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1'){
          $this->Career_users_model->deleteDataUser($iduser);
          $this->session->set_flashdata('delete_success','message');
          redirect(site_url('hradmin/list_users'));
        }else{
          redirect('errorpage/error403');
      }
      
  }

  function update_password_user(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1'){
        $iduser = $this->input->post('iduser');
        $newpass = $this->input->post('newpassword');
        $conpass = $this->input->post('conpassword');

        //$us_id = $this->session->userdata('user_id');
     
        if (empty($newpass)) {
            $this->session->set_flashdata('update_password_failure','message');
            redirect(base_url().'hradmin/list_users');
        } elseif (empty($conpass)) {
          $this->session->set_flashdata('update_password_failure','message');
            redirect(base_url().'hradmin/list_users');
        } elseif ($newpass != $conpass) {
           $this->session->set_flashdata('update_password_notsame','message');
            redirect(base_url().'hradmin/list_users');
        } else {
            $upd_data = array(
              'user_password' => SHA1($this->input->post('newpassword', TRUE)),
                    //'updated_user_id' => $us_id,
                    //'updated_datetime' => $tm,
            );
            if ($this->Career_users_model->updatePasswordData('career_users', $upd_data, $iduser)) {
                $this->session->set_flashdata('update_success','message');
                redirect(base_url().'hradmin/list_users');
            }
        }
      }else{
        redirect('errorpage/error403');
    }
  }

  function list_city(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hradmin/list_city?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hradmin/list_city?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hradmin/list_city';
            $config['first_url'] = base_url() . 'hradmin/list_city';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_city_model->total_rows_city($q);
        $career_city = $this->Career_city_model->get_limit_data_city($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_city';
        
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');

        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
        $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
        $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');

        $page_data['lang_edit_city'] = $this->lang->line('edit_city');
        $page_data['lang_city_name'] = $this->lang->line('city_name');
        $page_data['lang_delete_city'] = $this->lang->line('delete_city');
        $page_data['lang_search_city'] = $this->lang->line('search_city');

        $page_data['career_city_data'] = $career_city;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

       
        $this->load->view('admin/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function insert_city(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'city_name' => ucwords($this->input->post('city_name',TRUE))
      );  
        $this->Career_city_model->insertData('career_city',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('hradmin/list_city'));
        }else{
        redirect('errorpage/error403');
    }
      
  }

  function update_city(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'city_name' => ucwords($this->input->post('city_name',TRUE))
      );  
     
        $this->Career_users_model->updateDataCity('career_city', $data, $this->input->post('idcity', TRUE));
        $this->session->set_flashdata('update_success','message');
        redirect(site_url('hradmin/list_city'));
      }else{
        redirect('errorpage/error403');
    }
      
  }

  function delete_city($idcity){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){  
    $this->Career_city_model->deleteDataCity($idcity);
    $this->session->set_flashdata('delete_success','message');
    redirect(site_url('hradmin/list_city'));
    }else{
      redirect('errorpage/error403');
    }

  }


  function list_hotel(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hradmin/list_hotel?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hradmin/list_hotel?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hradmin/list_hotel';
            $config['first_url'] = base_url() . 'hradmin/list_hotel';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_hotels_model->total_rows_hotels($q);
        $career_hotel = $this->Career_hotels_model->get_limit_data_hotels($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_hotel';
        
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');

        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
        $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
        $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');

        $page_data['lang_edit_hotel'] = $this->lang->line('edit_hotel');
        $page_data['lang_idhotel'] = $this->lang->line('idhotel');
        $page_data['lang_hotel_name'] = $this->lang->line('hotel_name');
        $page_data['lang_delete_hotel'] = $this->lang->line('delete_hotel');
        $page_data['lang_search_hotel'] = $this->lang->line('search_hotel');


        $page_data['career_hotel_data'] = $career_hotel;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

       
        $this->load->view('admin/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function insert_hotel(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'idhotels' => strtoupper($this->input->post('idhotels',TRUE)),
      'hotels_name' => ucwords( $this->input->post('hotels_name',TRUE))
      );  
        $this->Career_city_model->insertData('career_hotels',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('hradmin/list_hotel'));
        }else{
        redirect('errorpage/error403');
    }      
  }

  function update_hotel(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'idhotels' => strtoupper($this->input->post('idhotels',TRUE)),
      'hotels_name' => ucwords( $this->input->post('hotels_name',TRUE))
      );  
     
        $this->Career_hotels_model->updateDataHotels('career_hotels', $data, $this->input->post('idhotels_old', TRUE));
        $this->session->set_flashdata('update_success','message');
        redirect(site_url('hradmin/list_hotel'));
      }else{
        redirect('errorpage/error403');
    }
      
  }

  function delete_hotel($idhotels){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){  
    $this->Career_hotels_model->deleteDataHotels($idhotels);
    $this->session->set_flashdata('delete_success','message');
    redirect(site_url('hradmin/list_hotel'));
    }else{
      redirect('errorpage/error403');
    }

  }

  function list_jobtitle(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hradmin/list_jobtitle?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hradmin/list_jobtitle?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hradmin/list_jobtitle';
            $config['first_url'] = base_url() . 'hradmin/list_jobtitle';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_jobtitle_model->total_rows_jobtitle($q);
        $career_jobtitle = $this->Career_jobtitle_model->get_limit_data_jobtitle($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_jobtitle';
        
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');

        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
        $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
        $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');

        $page_data['lang_edit_jobtitle'] = $this->lang->line('edit_job_title');
        $page_data['lang_position_name'] = $this->lang->line('position_name');
        $page_data['lang_delete_jobtitle'] = $this->lang->line('delete_job_title');
        $page_data['lang_search_jobtitle'] = $this->lang->line('search_job_title');
        $page_data['lang_choose_departement'] = $this->lang->line('choose_departement');


        $page_data['career_jobtitle_data'] = $career_jobtitle;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

       
        $this->load->view('admin/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function insert_jobtitle(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'iddept' => $this->input->post('iddept',TRUE),
      'position_name' => ucwords( $this->input->post('position_name',TRUE))
      );  
        $this->Career_jobtitle_model->insertData('career_jobtitle',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('hradmin/list_jobtitle'));
        }else{
        redirect('errorpage/error403');
    }      
  }

  function update_jobtitle(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'iddept' => $this->input->post('iddept',TRUE),
      'position_name' => ucwords( $this->input->post('position_name',TRUE))
      );  
     
        $this->Career_jobtitle_model->updateDataJobtitle('career_jobtitle', $data, $this->input->post('idjobtitle', TRUE));
        $this->session->set_flashdata('update_success','message');
        //$_SERVER['HTTP_REFERER'];
        redirect(site_url('hradmin/list_jobtitle'));
      }else{
        redirect('errorpage/error403');
    }
      
  }

  function delete_jobtitle($idjobtitle){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){  
    $this->Career_jobtitle_model->deleteDataJobtitle($idjobtitle);
    $this->session->set_flashdata('delete_success','message');
    redirect(site_url('hradmin/list_jobtitle'));
    }else{
      redirect('errorpage/error403');
    }

  }

  function list_departement(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hradmin/list_departement?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hradmin/list_departement?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hradmin/list_departement';
            $config['first_url'] = base_url() . 'hradmin/list_departement';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_departement_model->total_rows_departement($q);
        $career_departement = $this->Career_departement_model->get_limit_data_departement($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_departement';
        
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');

        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
        $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
        $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');

        $page_data['lang_edit_departement'] = $this->lang->line('edit_departement');
        $page_data['lang_delete_departement'] = $this->lang->line('delete_departement');       
        $page_data['lang_search_departement'] = $this->lang->line('search_departement');
        $page_data['lang_background_color'] = $this->lang->line('background_color');
        $page_data['lang_choose_bg_color'] = $this->lang->line('choose_bg_color');
   


        $page_data['career_departement_data'] = $career_departement;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

       
        $this->load->view('admin/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function insert_departement(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(      
      'deptname' => ucwords($this->input->post('departement',TRUE)),
      'background_class' => $this->input->post('bgcolor',TRUE)
      );  
        $this->Career_jobtitle_model->insertData('career_dept',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('hradmin/list_departement'));
        }else{
        redirect('errorpage/error403');
    }      
  }

  function update_departement(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $data = array(
      'deptname' => ucwords($this->input->post('departement',TRUE)),
      'background_class' => $this->input->post('bgcolor',TRUE)
      );  
     
        $this->Career_departement_model->updateDataDepartement('career_dept', $data, $this->input->post('iddept_old', TRUE));
        $this->session->set_flashdata('update_success','message');
        
        redirect(site_url('hradmin/list_departement'));
      }else{
        redirect('errorpage/error403');
    }
      
  }

  function delete_departement($iddept){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){  
    $this->Career_departement_model->deleteDataDepartement($iddept);
    $this->session->set_flashdata('delete_success','message');
    redirect(site_url('hradmin/list_departement'));
    }else{
      redirect('errorpage/error403');
    }

  }

  function list_vacancy(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
    $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'hradmin/list_vacancy?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'hradmin/list_vacancy?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'hradmin/list_vacancy';
            $config['first_url'] = base_url() . 'hradmin/list_vacancy';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_vacancy_model->total_rows_vacancy($q);
        $career_vacancy = $this->Career_vacancy_model->get_limit_data_vacancy($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $page_data['page_name'] = 'list_vacancy';
        
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');

        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data');
        $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
        $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm');  
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');

        $page_data['lang_edit_vacancy'] = $this->lang->line('edit_vacancy');    
        $page_data['lang_search_vacancy'] = $this->lang->line('search_vacancy');
        $page_data['lang_position_name'] = $this->lang->line('position_name');
        $page_data['lang_status'] = $this->lang->line('status');
        $page_data['lang_active'] = $this->lang->line('active');
        $page_data['lang_inactive'] = $this->lang->line('inactive');
        $page_data['lang_expire_date'] = $this->lang->line('expire_date');        
        
        $page_data['career_vacancy_data'] = $career_vacancy;
        $page_data['q'] = $q;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;

       
        $this->load->view('admin/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function add_vacancy(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
   

        $page_data['page_name'] = 'add_vacancy';
        
        $page_data['lang_dashboard'] = $this->lang->line('dashboard');
        $page_data['lang_applicant'] = $this->lang->line('applicant');
        $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
        $page_data['lang_user'] = $this->lang->line('user');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_users'] = $this->lang->line('list_users');
        $page_data['lang_hotel'] = $this->lang->line('hotel');
        $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
        $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_add_city'] = $this->lang->line('add_city');
        $page_data['lang_list_city'] = $this->lang->line('list_city');
        $page_data['lang_departement'] = $this->lang->line('departement');
        $page_data['lang_add_departement'] = $this->lang->line('add_departement');
        $page_data['lang_list_departement'] = $this->lang->line('list_departement');
        $page_data['lang_vacancy'] = $this->lang->line('vacancy');
        $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
        $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
        $page_data['lang_job_title'] = $this->lang->line('job_title');
        $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
        $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
        $page_data['lang_setting'] = $this->lang->line('setting');
        $page_data['lang_site_setting'] = $this->lang->line('site_setting');
        $page_data['lang_search'] = $this->lang->line('search');

        $page_data['lang_input_success'] = $this->lang->line('input_success');
        $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
        $page_data['lang_delete_success'] = $this->lang->line('delete_success');
        $page_data['lang_delete_data'] = $this->lang->line('delete_data');
        $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
        $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
        $page_data['lang_update_success'] = $this->lang->line('update_success');
        $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
        $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
        $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
        $page_data['lang_submit'] = $this->lang->line('submit');
        $page_data['lang_close'] = $this->lang->line('close');

        $page_data['lang_edit_vacancy'] = $this->lang->line('edit_vacancy');    
        $page_data['lang_search_vacancy'] = $this->lang->line('search_vacancy');
        $page_data['lang_position_name'] = $this->lang->line('position_name');
        $page_data['lang_status'] = $this->lang->line('status');
        $page_data['lang_active'] = $this->lang->line('active');
        $page_data['lang_inactive'] = $this->lang->line('inactive');
        $page_data['lang_expire_date'] = $this->lang->line('expire_date');
        
        $page_data['lang_choose_city'] = $this->lang->line('choose_city');
        $page_data['lang_choose_hotels'] = $this->lang->line('choose_hotels');
        $page_data['lang_choose_position_name'] = $this->lang->line('choose_position_name');
        $page_data['lang_publish_date'] = $this->lang->line('publish_date');
        $page_data['lang_expire_date'] = $this->lang->line('expire_date');
        $page_data['lang_requirement'] = $this->lang->line('requirement');        
       
        $this->load->view('admin/index', $page_data);
    }else{
      redirect('errorpage/error403');
    }

  }

  function add_vacancy_process(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
      $publish = strtotime($this->input->post('publishdate'));
      $expire = strtotime($this->input->post('expiredate'));
    $data = array( 
        'idcareer' => uniqid(),
        'idjobtitle' => $this->input->post('idjobtitle',TRUE),
        'idcity' => $this->input->post('idcity',TRUE),
        'idhotels' => $this->input->post('idhotels',TRUE),
        'requirement' => $this->input->post('requirement',TRUE),
        'publishdate' => date("Y-m-d", $publish),
        'expiredate' => date("Y-m-d", $expire),
        'date_created' => date("Y-m-d h:i:sa"),
        'status' => $this->input->post('status',TRUE)
        );  
        $this->Career_vacancy_model->insertData('career_vacancy',$data);
        $this->session->set_flashdata('input_success','message');        
        redirect(site_url('hradmin/list_vacancy'));
        }else{
        redirect('errorpage/error403');
    }  
  }

  function update_vacancy($idcareer){
		$user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
		
      $page_data['page_name'] = 'edit_vacancy';
        
      $page_data['lang_dashboard'] = $this->lang->line('dashboard');
      $page_data['lang_applicant'] = $this->lang->line('applicant');
      $page_data['lang_list_applicants'] = $this->lang->line('list_applicants');
      $page_data['lang_user'] = $this->lang->line('user');
      $page_data['lang_add_city'] = $this->lang->line('add_city');
      $page_data['lang_list_users'] = $this->lang->line('list_users');
      $page_data['lang_hotel'] = $this->lang->line('hotel');
      $page_data['lang_add_hotel'] = $this->lang->line('add_hotel');
      $page_data['lang_list_hotels'] = $this->lang->line('list_hotels');
      $page_data['lang_city'] = $this->lang->line('city');
      $page_data['lang_add_city'] = $this->lang->line('add_city');
      $page_data['lang_list_city'] = $this->lang->line('list_city');
      $page_data['lang_departement'] = $this->lang->line('departement');
      $page_data['lang_add_departement'] = $this->lang->line('add_departement');
      $page_data['lang_list_departement'] = $this->lang->line('list_departement');
      $page_data['lang_vacancy'] = $this->lang->line('vacancy');
      $page_data['lang_add_vacancy'] = $this->lang->line('add_vacancy');
      $page_data['lang_list_vacancy'] = $this->lang->line('list_vacancy');
      $page_data['lang_job_title'] = $this->lang->line('job_title');
      $page_data['lang_add_job_title'] = $this->lang->line('add_job_title');
      $page_data['lang_list_job_titles'] = $this->lang->line('list_job_titles');
      $page_data['lang_setting'] = $this->lang->line('setting');
      $page_data['lang_site_setting'] = $this->lang->line('site_setting');
      $page_data['lang_search'] = $this->lang->line('search');

      $page_data['lang_input_success'] = $this->lang->line('input_success');
      $page_data['lang_success_input_data'] = $this->lang->line('success_input_data');
      $page_data['lang_delete_success'] = $this->lang->line('delete_success');
      $page_data['lang_delete_data'] = $this->lang->line('delete_data');
      $page_data['lang_delete_confirm'] = $this->lang->line('delete_confirm');
      $page_data['lang_success_delete_data'] = $this->lang->line('success_delete_data');
      $page_data['lang_update_success'] = $this->lang->line('update_success');
      $page_data['lang_success_update_data'] = $this->lang->line('success_update_data'); 
      $page_data['lang_cancel_data'] = $this->lang->line('cancel_data');
      $page_data['lang_cancel_confirm'] = $this->lang->line('cancel_confirm'); 
      $page_data['lang_submit'] = $this->lang->line('submit');
      $page_data['lang_close'] = $this->lang->line('close');

      $page_data['lang_edit_vacancy'] = $this->lang->line('edit_vacancy');    
      $page_data['lang_search_vacancy'] = $this->lang->line('search_vacancy');
      $page_data['lang_position_name'] = $this->lang->line('position_name');
      $page_data['lang_status'] = $this->lang->line('status');
      $page_data['lang_active'] = $this->lang->line('active');
      $page_data['lang_inactive'] = $this->lang->line('inactive');
      $page_data['lang_expire_date'] = $this->lang->line('expire_date');
      
      $page_data['lang_choose_city'] = $this->lang->line('choose_city');
      $page_data['lang_choose_hotels'] = $this->lang->line('choose_hotels');
      $page_data['lang_choose_position_name'] = $this->lang->line('choose_position_name');
      $page_data['lang_publish_date'] = $this->lang->line('publish_date');
      $page_data['lang_expire_date'] = $this->lang->line('expire_date');
      $page_data['lang_requirement'] = $this->lang->line('requirement');   

      $page_data['update_vacancy_data'] = $this->Career_vacancy_model->getid_vacancy($idcareer)->result();
     

      $this->load->view('admin/index', $page_data);
	
      }else{
        redirect('errorpage/error403');
    } 
  }
  
  function update_vacancy_process(){
    $user_level = $this->session->userdata('user_level');
    if($user_level === '1' || $user_level === '2' || $user_level === '3'){
      $publish = strtotime($this->input->post('publishdate'));
      $expire = strtotime($this->input->post('expiredate'));
      $data = array( 
          'idcareer' => uniqid(),
          'idjobtitle' => $this->input->post('idjobtitle',TRUE),
          'idcity' => $this->input->post('idcity',TRUE),
          'idhotels' => $this->input->post('idhotels',TRUE),
          'requirement' => $this->input->post('requirement',TRUE),
          'publishdate' => date("Y-m-d", $publish),
          'expiredate' => date("Y-m-d", $expire),
          'status' => $this->input->post('status',TRUE)
          ); 
     
        $this->Career_vacancy_model->updateDataVacancy('career_vacancy', $data, $this->input->post('idcareer', TRUE));
        $this->session->set_flashdata('update_success','message');
        
        redirect(site_url('hradmin/list_vacancy'));
      }else{
        redirect('errorpage/error403');
    }
      
  }
}
