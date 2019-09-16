<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Career_vacancy_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get all
   

    // get data by id
    function getid_vacancy($idcareer)
    {
        $this->db->where('idcareer', $idcareer);
        return $this->db->get('career_vacancy');
    }
    
    /* For All Insert */ 
    public function insertData($table,$data)
    {
        $this->db->insert($table, $data);
    }

    
    // Query Data from Table with Order;
    public function getDataAll($table, $order_column, $order_type){
        $this->db->order_by("$order_column", "$order_type");
        $query = $this->db->get("$table");
        $result = $query->result();
        $this->db->save_queries = false;
        return $result;
    }

    public function updateDataVacancy($table, $data, $idcareer)
    {
        $this->db->where('idcareer', $idcareer);
        $this->db->update("$table", $data);

        return true;
    }   
   

    function total_rows_vacancy($q = NULL) {  
        $this->db->select('v.idcareer, j.position_name, c.city_name, h.hotels_name, v.publishdate, v.expiredate, v.date_created v.status');      
        $this->db->like('j.position_name', $q);
        $this->db->or_like('c.city_name', $q); 
        $this->db->or_like('h.hotels_name', $q);     
        $this->db->from('career_vacancy as v');
        $this->db->join('career_jobtitle as j', 'v.idjobtitle = j.idjobtitle', 'left');
        $this->db->join('career_city as c', 'v.idcity = c.idcity', 'left');
        $this->db->join('career_hotels as h', 'v.idhotels = h.idhotels', 'left');
    return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data_vacancy($limit, $start = 0, $q = NULL) {
        $this->db->select('v.idcareer, j.position_name, c.city_name, h.hotels_name, v.publishdate, v.expiredate, v.date_created, v.status');      
        $this->db->like('j.position_name', $q);
        $this->db->or_like('c.city_name', $q); 
        $this->db->or_like('h.hotels_name', $q);     
        $this->db->from('career_vacancy as v');
        $this->db->join('career_jobtitle as j', 'v.idjobtitle = j.idjobtitle', 'left');
        $this->db->join('career_city as c', 'v.idcity = c.idcity', 'left');
        $this->db->join('career_hotels as h', 'v.idhotels = h.idhotels', 'left');
        $this->db->order_by('v.date_created', 'DESC');  
        $this->db->limit($limit, $start);
    return $this->db->get()->result();
    }

}

/* End of file Career_vacancy_model.php */
/* Location: ./application/models/Career_vacancy_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2019-09-09 11:17:25 */
/* http://harviacode.com */