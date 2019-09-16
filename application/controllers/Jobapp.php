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

        $count_vacancy_on_dept = 
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
       
        $page_data['page_name'] = 'mainpage';
        $page_data['jobapp_vacancy_data'] = $jobapp_vacancy;
        $page_data['joblist'] = $joblist;
        $page_data['pagination'] = $this->pagination->create_links();
        $page_data['total_rows'] = $config['total_rows'];
        $page_data['start'] = $start;
        //$page_data['dept_vacancy'] = $this->Jobapp_model->dept_vacancy();

        $page_data['dept_count'] =  $dept_count;
        $page_data['dept_vacancy'] = $this->Jobapp_model->get_career_dept();

      $this->load->view('jobapp/index.php', $page_data); 
    
  }
}