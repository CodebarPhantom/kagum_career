<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career_jobtitle extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Career_jobtitle_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'career_jobtitle/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'career_jobtitle/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'career_jobtitle/index.html';
            $config['first_url'] = base_url() . 'career_jobtitle/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_jobtitle_model->total_rows($q);
        $career_jobtitle = $this->Career_jobtitle_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'career_jobtitle_data' => $career_jobtitle,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('career_jobtitle/career_jobtitle_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Career_jobtitle_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idjobtitle' => $row->idjobtitle,
		'deptid' => $row->deptid,
		'position_name' => $row->position_name,
	    );
            $this->load->view('career_jobtitle/career_jobtitle_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_jobtitle'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('career_jobtitle/create_action'),
	    'idjobtitle' => set_value('idjobtitle'),
	    'deptid' => set_value('deptid'),
	    'position_name' => set_value('position_name'),
	);
        $this->load->view('career_jobtitle/career_jobtitle_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'deptid' => $this->input->post('deptid',TRUE),
		'position_name' => $this->input->post('position_name',TRUE),
	    );

            $this->Career_jobtitle_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('career_jobtitle'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Career_jobtitle_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('career_jobtitle/update_action'),
		'idjobtitle' => set_value('idjobtitle', $row->idjobtitle),
		'deptid' => set_value('deptid', $row->deptid),
		'position_name' => set_value('position_name', $row->position_name),
	    );
            $this->load->view('career_jobtitle/career_jobtitle_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_jobtitle'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idjobtitle', TRUE));
        } else {
            $data = array(
		'deptid' => $this->input->post('deptid',TRUE),
		'position_name' => $this->input->post('position_name',TRUE),
	    );

            $this->Career_jobtitle_model->update($this->input->post('idjobtitle', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('career_jobtitle'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Career_jobtitle_model->get_by_id($id);

        if ($row) {
            $this->Career_jobtitle_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('career_jobtitle'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_jobtitle'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('deptid', 'deptid', 'trim|required');
	$this->form_validation->set_rules('position_name', 'position name', 'trim|required');

	$this->form_validation->set_rules('idjobtitle', 'idjobtitle', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Career_jobtitle.php */
/* Location: ./application/controllers/Career_jobtitle.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-09 03:43:26 */
/* http://harviacode.com */