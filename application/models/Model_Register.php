<?php 
class Model_Register extends CI_Model {
	
	function __construct(){
		parent::__construct();
		
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function register_data($data)
	{
		$this->db->insert("Members", $data);
		return $this->db->insert_id();
	}
	
	/////////////////////////////////------------------------------------------------------
	
}	// End Class