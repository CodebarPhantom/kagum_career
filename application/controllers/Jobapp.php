<?php defined('BASEPATH') or exit('No direct script access allowed');
class Jobapp extends CI_Controller{
  function __construct(){
    parent::__construct();
      $this->load->model('Jobapp_model');
      $this->load->library('form_validation');
      $this->load->helper('form');
      $this->load->helper('url');
  }

  function index(){
    $joblist = urldecode($this->input->get('joblist', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($joblist <> '') {
            $config['base_url'] = base_url() . 'jobapp/index?joblist=' . urlencode($joblist);
            $config['first_url'] = base_url() . 'jobapp/index?joblist=' . urlencode($joblist);
        } else {
            $config['base_url'] = base_url() . 'jobapp';
            $config['first_url'] = base_url() . 'jobapp';
        }

       
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows']       =   $this->Jobapp_model->total_rows_vacancy(/*$joblist*/);
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<ul class="pagination pagination-rounded justify-content-center">';
        $config['full_tag_close']   = '</ul>';
        $config['num_tag_open']     = '<li class="page-item">';
        $config['num_tag_close']    = '</li>';
        $config['cur_tag_open']     = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close']    = '</a></li>';
        $config['next_tag_open']    = '<li class="page-item">';
        $config['next_tagl_close']  = '</li>';
        $config['prev_tag_open']    = '<li class="page-item">';
        $config['prev_tagl_close']  = '</li>';
        $config['first_tag_open']   = '<li class="page-item">';
        $config['first_tagl_close'] = '</li>';
        $config['last_tag_open']    = '<li class="page-item">';
        $config['last_tagl_close']  = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $jobapp_vacancy = $this->Jobapp_model->get_limit_data_vacancy($config['per_page'], $start, $joblist);
        $this->load->library('pagination');
        $this->pagination->initialize($config);


        $count_vacancy_on_dept = $this->Jobapp_model->get_count_vacancy_on_dept();
        $dept_count = array();
        foreach($count_vacancy_on_dept as $dt_vac){
          if(empty($dept_count[$dt_vac->iddept])){
            $dept_count[$dt_vac->iddept] = 0;
          }
          
          $dept_count[$dt_vac->iddept] += 1;
        }

        $page_data['lang_browse_job'] = $this->lang->line('browse_job');
        $page_data['lang_position_name'] = $this->lang->line('position_name');
        $page_data['lang_city'] = $this->lang->line('city');
        $page_data['lang_hotels'] = $this->lang->line('hotel');
        $page_data['lang_expired_date'] = $this->lang->line('expired_date');

       
        $page_data['page_name'] = 'mainpage';
        $page_data['jobapp_vacancy_data'] = $jobapp_vacancy;
        $page_data['joblist'] = $joblist;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;
        

        $page_data['dept_count'] =  $dept_count;
        $page_data['dept_vacancy'] = $this->Jobapp_model->get_career_dept();

      $this->load->view('jobapp/index.php', $page_data); 
    
  }

  function job_requirement($idcareer=NULL){
    if($idcareer === NULL){
      redirect('jobapp');
    }else {
      $page_data['lang_requirement'] = $this->lang->line('requirement');
      $page_data['lang_placement'] = $this->lang->line('placement');
      $page_data['lang_expired_date'] = $this->lang->line('expired_date');
      $page_data['lang_apply_now'] = $this->lang->line('apply_now');

      $page_data['page_name'] = 'job_requirement';
      $page_data['get_job_requirement_data'] = $this->Jobapp_model->getid_vacancy($idcareer);
      $this->load->view('jobapp/index.php', $page_data);
    }
  }

  function job_apply(){
    $idcareer = $this->input->post('idcareer');      
    if(empty($idcareer)) {
      redirect('jobapp');
    }else {
      $page_data['lang_applicant_profile'] = $this->lang->line('applicant_profile');
      $page_data['lang_education_experience'] = $this->lang->line('education_experience');
      $page_data['lang_idatt_file'] = $this->lang->line('idatt_file');
      $page_data['lang_complete'] = $this->lang->line('complete');
      $page_data['lang_previous'] = $this->lang->line('previous');
      $page_data['lang_next'] = $this->lang->line('next');
      $page_data['lang_expired_date'] = $this->lang->line('expired_date');

      $page_data['lang_firstname'] = $this->lang->line('firstname');
      $page_data['lang_lastname'] = $this->lang->line('lastname');
      $page_data['lang_birthplace'] = $this->lang->line('birthplace');
      $page_data['lang_dob'] = $this->lang->line('dob');
      $page_data['lang_email'] = $this->lang->line('email');
      $page_data['lang_gender'] = $this->lang->line('gender');
      $page_data['lang_male'] = $this->lang->line('male');
      $page_data['lang_female'] = $this->lang->line('female');
      $page_data['lang_address'] = $this->lang->line('address');
      $page_data['lang_height'] = $this->lang->line('height');
      $page_data['lang_body_weight'] = $this->lang->line('body_weight');
      $page_data['lang_phone'] = $this->lang->line('phone');
      $page_data['lang_mobile_phone'] = $this->lang->line('mobile_phone');
      $page_data['lang_citizenship'] = $this->lang->line('citizenship');
      $page_data['lang_religion'] = $this->lang->line('religion');
      $page_data['lang_tribe'] = $this->lang->line('tribe');
      $page_data['lang_family_status'] = $this->lang->line('family_status');

      $page_data['lang_education'] = $this->lang->line('education');
      $page_data['lang_education_name'] = $this->lang->line('education_name');
      $page_data['lang_major'] = $this->lang->line('major');
      $page_data['lang_degree'] = $this->lang->line('degree');
      $page_data['lang_from'] = $this->lang->line('from');
      $page_data['lang_to'] = $this->lang->line('to');
      $page_data['lang_add_education'] = $this->lang->line('add_education');      
      $page_data['lang_reset_row'] = $this->lang->line('reset_row'); 

      $page_data['lang_experience'] = $this->lang->line('experience');
      $page_data['lang_add_experience'] = $this->lang->line('add_experience');
      $page_data['lang_company_name'] = $this->lang->line('company_name');
      $page_data['lang_industry'] = $this->lang->line('industry');
      $page_data['lang_position'] = $this->lang->line('position');
      $page_data['lang_join_date'] = $this->lang->line('join_date');
      $page_data['lang_end_date'] = $this->lang->line('end_date');
      $page_data['lang_supervisor_name'] = $this->lang->line('supervisor_name');
      $page_data['lang_salary'] = $this->lang->line('salary');
      $page_data['lang_reason_leaving'] = $this->lang->line('reason_leaving');

      $page_data['lang_reference'] = $this->lang->line('reference');
      $page_data['lang_add_reference'] = $this->lang->line('add_reference');
      $page_data['lang_reference_name'] = $this->lang->line('reference_name');

      $page_data['lang_idcard_number'] = $this->lang->line('idcard_number');
      $page_data['lang_place_release'] = $this->lang->line('place_release');
      $page_data['lang_idcard_valid'] = $this->lang->line('idcard_valid');
      $page_data['lang_attach_photo'] = $this->lang->line('attach_photo');
      $page_data['lang_attach_cv'] = $this->lang->line('attach_cv');
      $page_data['lang_submit'] = $this->lang->line('submit');

      $page_data['page_name'] = 'job_apply';
      $page_data['get_job_requirement_data'] = $this->Jobapp_model->getid_vacancy($idcareer);
      $this->load->view('jobapp/index.php', $page_data);
    }

    function job_apply(){
      $idcareer = $this->input->post('idcareer');      
      if(empty($idcareer)) {
        redirect('jobapp');
      }else {

      }
    }
  }
}