<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class __Authen extends CI_Controller {
 function __construct()
   {
		parent::__construct();
		//---------------------------------------------------------------------------------
		$this->themeci->is_logged_in(); //Check Login
		
		$this->load->model("Authen_model");
   }
   
   public function index(){
		redirect('Authen/application');
   }
    
	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		
		redirect(site_url('Authen/login'),"refresh");
	}
	
	public function login(){
		if($this->session->userdata('user_id')){
			redirect('Authen',"refresh");
		}else{
			$this->load->view('Authen/login');
		}
	}
			
	public function check_login(){
		$data_input=$this->input->post();
		$data['user_id']=$this->Authen_model->_check_login($data_input);
		echo json_encode($data);
	}
	
	public function application(){
		$data['username']  = $this->session->userdata('user_name'); 
		//### Header ###//
		$data['url'] = $this->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		$this->load->view('iTheme/Header', $data);
		//### Body ###//
		$this->load->view('iTheme/Body');
		//### Footer ###//
		$this->load->view('iTheme/Footer');
	}
		
}// END Classs

