<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career_applicant extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Career_applicant_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'career_applicant/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'career_applicant/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'career_applicant/index.html';
            $config['first_url'] = base_url() . 'career_applicant/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Career_applicant_model->total_rows($q);
        $career_applicant = $this->Career_applicant_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'career_applicant_data' => $career_applicant,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('career_applicant/career_applicant_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Career_applicant_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idapplicant' => $row->idapplicant,
		'careerid' => $row->careerid,
		'firstname' => $row->firstname,
		'lastname' => $row->lastname,
		'tempat_lahir' => $row->tempat_lahir,
		'tanggal_lahir' => $row->tanggal_lahir,
		'jenis_kelamin' => $row->jenis_kelamin,
		'tinggi_badan' => $row->tinggi_badan,
		'berat_badan' => $row->berat_badan,
		'alamat' => $row->alamat,
		'telp_rumah' => $row->telp_rumah,
		'handphone' => $row->handphone,
		'email' => $row->email,
		'kebangsaan' => $row->kebangsaan,
		'agama' => $row->agama,
		'suku' => $row->suku,
		'status_keluarga' => $row->status_keluarga,
		'date_created' => $row->date_created,
		'file_picture' => $row->file_picture,
		'file_cv' => $row->file_cv,
		'status' => $row->status,
	    );
            $this->load->view('career_applicant/career_applicant_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_applicant'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('career_applicant/create_action'),
	    'idapplicant' => set_value('idapplicant'),
	    'careerid' => set_value('careerid'),
	    'firstname' => set_value('firstname'),
	    'lastname' => set_value('lastname'),
	    'tempat_lahir' => set_value('tempat_lahir'),
	    'tanggal_lahir' => set_value('tanggal_lahir'),
	    'jenis_kelamin' => set_value('jenis_kelamin'),
	    'tinggi_badan' => set_value('tinggi_badan'),
	    'berat_badan' => set_value('berat_badan'),
	    'alamat' => set_value('alamat'),
	    'telp_rumah' => set_value('telp_rumah'),
	    'handphone' => set_value('handphone'),
	    'email' => set_value('email'),
	    'kebangsaan' => set_value('kebangsaan'),
	    'agama' => set_value('agama'),
	    'suku' => set_value('suku'),
	    'status_keluarga' => set_value('status_keluarga'),
	    'date_created' => set_value('date_created'),
	    'file_picture' => set_value('file_picture'),
	    'file_cv' => set_value('file_cv'),
	    'status' => set_value('status'),
	);
        $this->load->view('career_applicant/career_applicant_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'careerid' => $this->input->post('careerid',TRUE),
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp_rumah' => $this->input->post('telp_rumah',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kebangsaan' => $this->input->post('kebangsaan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'suku' => $this->input->post('suku',TRUE),
		'status_keluarga' => $this->input->post('status_keluarga',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'file_picture' => $this->input->post('file_picture',TRUE),
		'file_cv' => $this->input->post('file_cv',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Career_applicant_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('career_applicant'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Career_applicant_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('career_applicant/update_action'),
		'idapplicant' => set_value('idapplicant', $row->idapplicant),
		'careerid' => set_value('careerid', $row->careerid),
		'firstname' => set_value('firstname', $row->firstname),
		'lastname' => set_value('lastname', $row->lastname),
		'tempat_lahir' => set_value('tempat_lahir', $row->tempat_lahir),
		'tanggal_lahir' => set_value('tanggal_lahir', $row->tanggal_lahir),
		'jenis_kelamin' => set_value('jenis_kelamin', $row->jenis_kelamin),
		'tinggi_badan' => set_value('tinggi_badan', $row->tinggi_badan),
		'berat_badan' => set_value('berat_badan', $row->berat_badan),
		'alamat' => set_value('alamat', $row->alamat),
		'telp_rumah' => set_value('telp_rumah', $row->telp_rumah),
		'handphone' => set_value('handphone', $row->handphone),
		'email' => set_value('email', $row->email),
		'kebangsaan' => set_value('kebangsaan', $row->kebangsaan),
		'agama' => set_value('agama', $row->agama),
		'suku' => set_value('suku', $row->suku),
		'status_keluarga' => set_value('status_keluarga', $row->status_keluarga),
		'date_created' => set_value('date_created', $row->date_created),
		'file_picture' => set_value('file_picture', $row->file_picture),
		'file_cv' => set_value('file_cv', $row->file_cv),
		'status' => set_value('status', $row->status),
	    );
            $this->load->view('career_applicant/career_applicant_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_applicant'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idapplicant', TRUE));
        } else {
            $data = array(
		'careerid' => $this->input->post('careerid',TRUE),
		'firstname' => $this->input->post('firstname',TRUE),
		'lastname' => $this->input->post('lastname',TRUE),
		'tempat_lahir' => $this->input->post('tempat_lahir',TRUE),
		'tanggal_lahir' => $this->input->post('tanggal_lahir',TRUE),
		'jenis_kelamin' => $this->input->post('jenis_kelamin',TRUE),
		'tinggi_badan' => $this->input->post('tinggi_badan',TRUE),
		'berat_badan' => $this->input->post('berat_badan',TRUE),
		'alamat' => $this->input->post('alamat',TRUE),
		'telp_rumah' => $this->input->post('telp_rumah',TRUE),
		'handphone' => $this->input->post('handphone',TRUE),
		'email' => $this->input->post('email',TRUE),
		'kebangsaan' => $this->input->post('kebangsaan',TRUE),
		'agama' => $this->input->post('agama',TRUE),
		'suku' => $this->input->post('suku',TRUE),
		'status_keluarga' => $this->input->post('status_keluarga',TRUE),
		'date_created' => $this->input->post('date_created',TRUE),
		'file_picture' => $this->input->post('file_picture',TRUE),
		'file_cv' => $this->input->post('file_cv',TRUE),
		'status' => $this->input->post('status',TRUE),
	    );

            $this->Career_applicant_model->update($this->input->post('idapplicant', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('career_applicant'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Career_applicant_model->get_by_id($id);

        if ($row) {
            $this->Career_applicant_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('career_applicant'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('career_applicant'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('careerid', 'careerid', 'trim|required');
	$this->form_validation->set_rules('firstname', 'firstname', 'trim|required');
	$this->form_validation->set_rules('lastname', 'lastname', 'trim|required');
	$this->form_validation->set_rules('tempat_lahir', 'tempat lahir', 'trim|required');
	$this->form_validation->set_rules('tanggal_lahir', 'tanggal lahir', 'trim|required');
	$this->form_validation->set_rules('jenis_kelamin', 'jenis kelamin', 'trim|required');
	$this->form_validation->set_rules('tinggi_badan', 'tinggi badan', 'trim|required');
	$this->form_validation->set_rules('berat_badan', 'berat badan', 'trim|required');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
	$this->form_validation->set_rules('telp_rumah', 'telp rumah', 'trim|required');
	$this->form_validation->set_rules('handphone', 'handphone', 'trim|required');
	$this->form_validation->set_rules('email', 'email', 'trim|required');
	$this->form_validation->set_rules('kebangsaan', 'kebangsaan', 'trim|required');
	$this->form_validation->set_rules('agama', 'agama', 'trim|required');
	$this->form_validation->set_rules('suku', 'suku', 'trim|required');
	$this->form_validation->set_rules('status_keluarga', 'status keluarga', 'trim|required');
	$this->form_validation->set_rules('date_created', 'date created', 'trim|required');
	$this->form_validation->set_rules('file_picture', 'file picture', 'trim|required');
	$this->form_validation->set_rules('file_cv', 'file cv', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');

	$this->form_validation->set_rules('idapplicant', 'idapplicant', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Career_applicant.php */
/* Location: ./application/controllers/Career_applicant.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-11 09:51:29 */
/* http://harviacode.com */