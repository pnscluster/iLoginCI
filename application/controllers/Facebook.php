<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facebook extends CI_Controller {
	
	//private $fb;
	public function __construct(){
		parent::__construct();
		$this->load->model("Register_model");
		//$this->load->library('FacebookSDK');
		//$this->fb = $this->Facebooksdk;
	}
	
	public function login()
	{
		//$data['url'] = $this->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		//$this->load->view('Login/index', $data);
		
		$this->themeci->loadtheme('Login/index');
		
	}
	
	public function callback()
	{
		$access_token 	= $this->facebooksdk->getAccessToken();
		$data['user']	= $this->facebooksdk->getUserData($access_token);
		
		$this->session->set_userdata('userid', $data['user']['id']);
		
		$oaut_id = $this->Register_model->check_user($data['user']['id']);
		
		if(!$oaut_id){
			
			$insert['oauth_id'] 			=  $data['user']['id'];
			$insert['oauth_provider'] 		=  'Facebook';
			$insert['first_name'] 			=  $data['user']['first_name'];
			$insert['last_name'] 			=  $data['user']['last_name'];
			$insert['name'] 				=  $data['user']['name'];
			$insert['email'] 				=  $data['user']['email'];
			$insert['password'] 			=  null;
			$insert['birthday'] 			=  $data['user']['birthday']?$data['user']['birthday']:null;	//$data['user']['birthday'];
			$insert['gender'] 				=  $data['user']['gender']?$data['user']['gender']:null;
			$insert['picture'] 				=  $data['user']['picture']?$data['user']['picture']:null;
			$insert['register_date'] 		=  date('Y-m-d H:i:s');
			//print_r($insert);
			$this->Register_model->register_data($insert);
		}
		
		$this->load->view('Login/user_profile', $data);

	}
	
	public function logout()
	{
		$userid 	= $this->session->userdata('userid');
		$next_url 	= $this->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		
		// getLogoutUrl($session, $next_url)
		$this->facebooksdk->getLogoutUrl($userid, $next_url);
		$this->session->unset_userdata('userid');
		
		redirect('Facebook/login');
	}
	
}
