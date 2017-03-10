<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!session_id()){
	session_start();
}

require_once("Facebook/autoload.php");
	
class Facebooksdk{
	
	protected $fb;
	protected $helper;
	
	public function __construct(){
		
		$CI =& get_instance();
	
		$this->fb = new Facebook\Facebook([
				'app_id' => '436038760060842',
				'app_secret' => 'ff595d656487dba4b67d6c6024380e36',
				'default_graph_version' => 'v2.8',
		]);
			
		$this->helper = $this->fb->getRedirectLoginHelper();
			
	}
	
	function getLoginUrl($callback_url){
			
		$permissions = ['email']; // optional
		$loginUrl = $this->helper->getLoginUrl($callback_url, $permissions);
			
		return $loginUrl;
	}
	
	function getAccessToken(){
		try {
	
			$accessToken = $this->helper->getAccessToken();
			return $accessToken;
				
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
	
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
				
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
	
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
				
		}
	}
	
	function getUserData($access_token){
			
		$this->fb->setDefaultAccessToken($access_token);
	
		try {
	
			$response = $this->fb->get('/me?fields=id,name,first_name,middle_name,last_name,email,birthday');
			$userNode = $response->getGraphUser();
			
			return $userNode;
				
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
				
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
	
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
				
		}
	
	}
	
	function getLogoutUrl($session, $next_url)
	{
		
		
		try {
		
			$this->helper->getLogoutUrl($session, $next_url);
				
			return true;
		
		} catch(Facebook\Exceptions\FacebookResponseException $e) {
			// When Graph returns an error
			echo 'Graph returned an error: ' . $e->getMessage();
			exit;
		
		} catch(Facebook\Exceptions\FacebookSDKException $e) {
		
			// When validation fails or other local issues
			echo 'Facebook SDK returned an error: ' . $e->getMessage();
			exit;
		
		}
	}
}