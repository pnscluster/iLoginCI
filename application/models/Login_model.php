<?php 
class Login_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
		
	}
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	function _check_login($data){
		$this->db->select('*')->from('Members')
			->where('email', $data['Email'])
			->where('password', md5($data['Password']));
		$query		= $this->db->get();
		$num_rows	= $query->num_rows();
		$rs			= $query->row_array();
		
		if($num_rows>0){
			//Set session
			$ses['user_id']		= $rs['user_id'];
			$ses['user_name']	= $rs['name'];
				
			$this->session->set_userdata($ses);
			
			return $rs['user_id'];
			
		}else{
			
			return 0;
		}
	}
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	/*public function check_login($data)
	{
		$query 		= $this->db->get_where("Members", array("email" => $data['Email']));
		$result 	= $query->result_array();
		//print_r($result); exit;
		
		if($row['Email'] == $data['Email'] && $row['Password'] == md5($data['Password'])){
			return $result;
		}else{
			return false;
		}
		
	}*/
	
	/////////////////////////////////--------------------------------------------------------------------------------------------------------------
	public function register_data($data)
	{
		$this->db->insert("Members", $data);
		
		return $this->db->insert_id();
	}
	
	/////////////////////////////////------------------------------------------------------
	
}	// End Class