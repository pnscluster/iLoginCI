<?php 
class Authen_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function _check_login($data){
		$this->db->select('*')->from('Members')
			->where('email',$data['email'])
			->where('password',md5($data['password']));
		$query=$this->db->get();
		if($query->num_rows()>0){
			$rs=$query->row_array();
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
