<?php 
class Login_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function check_login($data)
	{
		$query 		= $this->db->get_where("Members", array("email" => $data['Email']));
		$result 	= $query->result_array();
		//print_r($result); exit;
		
		if($row['Email'] == $data['Email'] && $row['Password'] == md5($data['Password'])){
			return $result;
		}else{
			return false;
		}
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function register_data($data)
	{
		$this->db->insert("Members", $data);
		
		return $this->db->insert_id();
	}
	
	/////////////////////////////////------------------------------------------------------
	
}	// End Class