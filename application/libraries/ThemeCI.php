<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!session_id()){
	session_start();
}

class ThemeCI{
	
	public function __construct(){
		//$CI =& get_instance();
	}
	
	public function loadtheme($view, $data=null)
	{
		$CI =& get_instance();
		
		//### Header ###//
		$data['url'] = $CI->facebooksdk->getLoginUrl(base_url('Facebook/callback'));
		$CI->load->view('iTheme/Header', $data);
		//### Body ###//
		$CI->load->view($view, $data);
		//### Footer ###//
		$CI->load->view('iTheme/Footer');
	
	}
	
}