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
	
	function is_logged_in()
	{ //Check Login
		
		$CI =& get_instance();
		
		if(!$CI->session->userdata('user_id')){ //Check Logged
			$method=$CI->config->item('method_not_login'); //Method Not Check Login
				
			$ctl_mtd =  $CI->router->fetch_class().'/'.$CI->router->fetch_method();
			if(!in_array($ctl_mtd, $method)){
				echo '<script>
						window.parent.location.href="'.site_url('Authen/login').'";
					  </script>';
				exit();
			}
		}
	}
}