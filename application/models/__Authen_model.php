<?php 
class __Authen_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function _check_login($data){
		$this->db->select('*')->from('Members')
			->where('email', $data['Email'])
			->where('password', md5($data['Password']));
		$query=$this->db->get();
		$num_rows=$query->num_rows();
		$rs=$query->row_array();
		if($num_rows>0){
			//Set session
			$ses['user_id']		= $rs['email'];
			$ses['user_name']	= $rs['name'];
			
			$this->session->set_userdata($ses);
			return $rs['user_id'];
		}else{
			return 0;
		}
	}

}
