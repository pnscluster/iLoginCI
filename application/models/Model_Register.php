<?php 
class Model_Register extends CI_Model {
	
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function check_user($id)
	{
		$query 	= $this->db->get_where("Members", array("oauth_id" => $id));
		$row 	= $query->row_array();
		
		return $row;
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function register_data($data)
	{
		$this->db->insert("Members", $data);
		return $this->db->insert_id();
	}
	
	/////////////////////////////////------------------------------------------------------
	
}	// End Class