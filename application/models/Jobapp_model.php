<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Jobapp_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }
    
 
    function total_rows_vacancy(/*$joblist = NULL*/) { 
        $today = date("Y-m-d"); 
        $this->db->select('v.idcareer, j.position_name, c.city_name, h.hotels_name, v.publishdate, v.expiredate, v.date_created, v.status');      
       // $this->db->like('j.position_name', $joblist);
       // $this->db->or_like('c.city_name', $joblist); 
        //$this->db->or_like('h.hotels_name', $joblist);     
        $this->db->from('career_vacancy as v');
        $this->db->join('career_jobtitle as j', 'v.idjobtitle = j.idjobtitle', 'left');
        $this->db->join('career_city as c', 'v.idcity = c.idcity', 'left');
        $this->db->join('career_hotels as h', 'v.idhotels = h.idhotels', 'left');
        $this->db->where('v.status', 'active');
        $this->db->where('v.publishdate <= "'.$today.'"');
        $this->db->where('v.expiredate >= "'.$today.'"');
        
    return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_vacancy($limit, $start = 0 /*$joblist = NULL*/) {
        $today = date("Y-m-d"); 
        $this->db->select('v.idcareer, j.position_name, c.city_name, h.hotels_name, v.publishdate, v.expiredate, v.date_created, v.status');      
       // $this->db->like('j.position_name', $joblist);
       // $this->db->or_like('c.city_name', $joblist); 
       // $this->db->or_like('h.hotels_name', $joblist);     
        $this->db->from('career_vacancy as v');
        $this->db->join('career_jobtitle as j', 'v.idjobtitle = j.idjobtitle', 'left');
        $this->db->join('career_city as c', 'v.idcity = c.idcity', 'left');
        $this->db->join('career_hotels as h', 'v.idhotels = h.idhotels', 'left');
        $this->db->where('v.status', 'active');
        $this->db->where('v.publishdate <= "'.$today.'"');
        $this->db->where('v.expiredate >= "'.$today.'"');
        $this->db->order_by('v.date_created', 'DESC');  
        $this->db->limit($limit, $start);
    return $this->db->get()->result();
    }

   
    function dept_vacancy() {
		$today = date("Y-m-d"); 
        $this->db->select('d.iddept, d.deptname as hasil, COUNT(*)  as total'); 
        $this->db->from('career_vacancy as v');
        $this->db->join('career_jobtitle as j', 'v.idjobtitle = j.idjobtitle', 'left');
        $this->db->join('career_dept as d', 'j.iddept = d.iddept', 'left');
        $this->db->where('v.status', 'active');
        $this->db->where('v.publishdate <= "'.$today.'"');
        $this->db->where('v.expiredate >= "'.$today.'"');
        $this->db->group_by("hasil");
        $this->db->order_by('hasil', 'ASC'); 
        return $this->db->get()->result();
    }
    
    function get_career_dept()
	{
		
		$this->db->select('career_dept.iddept, career_dept.deptname')
				->from('career_dept')
				->order_by('career_dept.iddept', 'ASC');
			
		$valid_vacancy = $this->db->get();		
		
		return $valid_vacancy->result();
    }
    
    function get_count_vacancy_on_dept()
	{
		$today = date("Y-m-d");
		$this->db->select('career_jobtitle.iddept, career_vacancy.idcareer')
				->from('career_vacancy')
				->join('career_jobtitle', 'career_vacancy.idjobtitle = career_jobtitle.idjobtitle', 'LEFT')
				->where('career_vacancy.status', 'active')
				->where('career_vacancy.publishdate <= "'.$today.'"')
				->where('career_vacancy.expiredate >= "'.$today.'"');
				
		$count_vacancy = $this->db->get();		
		
		return $count_vacancy->result();
    }
    
    function getid_vacancy($idcareer)
    {
        $today = date("Y-m-d"); 
        $this->db->select('v.idcareer, j.position_name, v.requirement, c.city_name, h.hotels_name, v.publishdate, v.expiredate, v.date_created, v.status');            
        $this->db->from('career_vacancy as v');
        $this->db->join('career_jobtitle as j', 'v.idjobtitle = j.idjobtitle', 'left');
        $this->db->join('career_city as c', 'v.idcity = c.idcity', 'left');
        $this->db->join('career_hotels as h', 'v.idhotels = h.idhotels', 'left');
        $this->db->where('v.idcareer', $idcareer);
        $this->db->where('v.status', 'active');
        $this->db->where('v.publishdate <= "'.$today.'"');
        $this->db->where('v.expiredate >= "'.$today.'"');
        return $this->db->get()->result();
    }
    

}

