<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career_vacancy extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Career_vacancy_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'career_vacancy/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'career_vacancy/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'career_vacancy/index.html';
            $config['first_url'] = base_url() . 'career_vacancy/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_vacancy_model->total_rows($q);
        $career_vacancy = $this->Career_vacancy_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'career_vacancy_data' => $career_vacancy,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('career_vacancy/career_vacancy_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Career_vacancy_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idcareer' => $row->idcareer,
		'idjobtitle' => $row->idjobtitle,
		'idcity' => $row->idcity,
		'idhotels' => $row->idhotels,
		'requirement' => $row->requirement,
		'publishdate' => $row->publishdate,
		'expiredate' => $row->expiredate,
		'date_created' => $row->date_created,
		'status' => $row->status,
	    );
            $this->load->view('career_vacancy/career_vacancy_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_vacancy'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('career_vacancy/create_action'),
	    'idcareer' => set_value('idcareer'),
	    'idjobtitle' => set_value('idjobtitle'),
	    'idcity' => set_value('idcity'),
	    'idhotels' => set_value('idhotels'),
	    'requirement' => set_value('requirement'),
	    'publishdate' => set_value('publishdate'),
	    'expiredate' => set_value('expiredate'),
	    'date_created' => set_value('date_created'),
	    'status' => set_value('status'),
	);
        $this->load->view('career_vacancy/career_vacancy_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'idjobtitle' => $this->input->post('idjobtitle',TRUE),
		'idcity' => $this->input->post('idcity',TRUE),
		'idhotels' => $this->input->post('idhotels',TRUE),
		'requirement' => $this->input->post('requirement',TRUE),
		'publishdate' => $this->input->post('publishdate',TRUE),
		'expiredate' => $this->input->post('expiredate',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Career_vacancy_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('career_vacancy'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Career_vacancy_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('career_vacancy/update_action'),
		'idcareer' => set_value('idcareer', $row->idcareer),
		'idjobtitle' => set_value('idjobtitle', $row->idjobtitle),
		'idcity' => set_value('idcity', $row->idcity),
		'idhotels' => set_value('idhotels', $row->idhotels),
		'requirement' => set_value('requirement', $row->requirement),
		'publishdate' => set_value('publishdate', $row->publishdate),
		'expiredate' => set_value('expiredate', $row->expiredate),
		'date_created' => set_value('date_created', $row->date_created),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('career_vacancy/career_vacancy_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_vacancy'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idcareer', TRUE));
        } else {
            $data = array(
		'idjobtitle' => $this->input->post('idjobtitle',TRUE),
		'idcity' => $this->input->post('idcity',TRUE),
		'idhotels' => $this->input->post('idhotels',TRUE),
		'requirement' => $this->input->post('requirement',TRUE),
		'publishdate' => $this->input->post('publishdate',TRUE),
		'expiredate' => $this->input->post('expiredate',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Career_vacancy_model->update($this->input->post('idcareer', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('career_vacancy'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Career_vacancy_model->get_by_id($id);

        if ($row) {
            $this->Career_vacancy_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('career_vacancy'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_vacancy'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('idjobtitle', 'idjobtitle', 'trim|required');
	$this->form_validation->set_rules('idcity', 'idcity', 'trim|required');
	$this->form_validation->set_rules('idhotels', 'idhotels', 'trim|required');
	$this->form_validation->set_rules('requirement', 'requirement', 'trim|required');
	$this->form_validation->set_rules('publishdate', 'publishdate', 'trim|required');
	$this->form_validation->set_rules('expiredate', 'expiredate', 'trim|required');
	$this->form_validation->set_rules('date_created', 'date created', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('idcareer', 'idcareer', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Career_vacancy.php */
/* Location: ./application/controllers/Career_vacancy.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-09 11:17:25 */
/* http://harviacode.com */