<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_home extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function show($table)
	{
	  $this->db->select('*');
	  $data = $this->db->get($table);
	  
	  if($data->num_rows() > 0)
	  {
	  	return $data->result_array();
	  }else
	  {
	 	return false;
	  }
	 
	}
	 
	public function insert($data,$table)
	{
		$this->db->insert($table, $data);
	}

}

/* End of file m_home.php */
/* Location: ./application/models/m_home.php */