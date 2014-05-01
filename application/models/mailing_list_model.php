<?php
//mailing_list_model.php
class Mailing_list_model extends CI_Model
{
	public function __construct()
	{ //create an active connection to DB
		$this->load->database();	
		
	}
	public function get_mailing_list()
	{//will show all data in table named mail_list
		//$query = $this->db->get('mailing_list');
		
		//return $query->result_array();
		return $this->db->get('mailing_list');
	}//end get_mailing_list()
	
	public function get_id($id)
	{//will show all data in table named mail_list
		//$this->db->select('userid,first_name,last_name');
		$this->db->where('userid',$id);
		return $this->db->get('mailing_list');
	}//end get_id()
	
	public function insert($row)
	{
		$this->db->insert('mailing_list',$row);
		
	}//end insert();
	
}

?>