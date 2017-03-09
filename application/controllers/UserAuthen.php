<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAuthen extends CI_Controller {
	
	private $fbSDK;
	function __construct(){
		parent::__construct();
	
		$this->load->library('facebookSDK');
		$this->fbSDK = $this->facebookSDK;
	
	}
	
	public function index()
	{
		$cb = "http://localhost:81/CILoginFB/UserAuthen/callback";	//base_url('UserAuthen/callback')
		$url = $this->fbSDK->getLoginUrl($cb);
		echo "<a href='.$url.'>Login with Facebook</a>";
		//$this->load->view('Login/index', $data);
	}
	
	public function callback()
	{
		$access_token 	= $this->fbSDK->getAccessToken();
		$data 			= $this->fbSDK->getUserData($access_token);
		
		print_r($data);
	}
	
}
