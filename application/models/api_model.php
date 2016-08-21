<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package APi Model
 * @access 29.10.2014
 * @version 2.0
 * @author NopZ [K.]
 * @copyright Zealtech International Co.,Ltd.
 */
class Api_model extends CI_Model
{
	/*
	|--------------------------------------------------------------------------
	| Protocol
	|--------------------------------------------------------------------------
	|
	| HTTP (Hyper Text Transfer Protocol)
	| POP3 (Post Office Protocol 3).
	| SMTP (Simple Mail Transfer Protocol).
	| FTP (File Transfer Protocol).
	| IP (Internet Protocol).
	| DHCP (Dynamic Host Configuration Protocol).
	| IMAP (Internet Message Access Protocol).
	|
	*/
	public $_protocol = "http://";
	/*
	|--------------------------------------------------------------------------
	| Host (IP Address)
	|--------------------------------------------------------------------------
	|
	| Development Server : 112.121.150.31
	| Production Server (vec) : 192.168.1.223
	|
	*/
	public $_host = "192.168.1.223";
	/*
	|--------------------------------------------------------------------------
	| Post
	|--------------------------------------------------------------------------
	|
	| Default Post : 9080
	|
	*/
	public $_port = "9080";
	/*
	|--------------------------------------------------------------------------
	| Path and Directory
	|--------------------------------------------------------------------------
	|
	| Default directory : /vcop/api/
	|
	*/
	public $_path = "/vcop/api/";
	
	/*
	|--------------------------------------------------------------------------
	| Method
	|--------------------------------------------------------------------------
	|
	| Register request method â€œregisterâ€�.
	| Login request method â€œloginâ€�.
	| Login width AD request method â€œloginADâ€�.
	| Edit Profile width AD request method â€œeditâ€�.
	| Content request method â€œgetâ€�.
	| Related Content request method â€œrelateâ€�.
	| Search request method â€œsearchâ€�.
	| Follow or Unfollow user action (Publisher/Author/Category). Follow or Unfollow request method â€œfollowâ€�.
	| Preview Content image request method â€œpreviewâ€�.
	| Download content history request method â€œdownload_historyâ€�.
	|
	*/
	public $_method = "get";
	/*
	|--------------------------------------------------------------------------
	| Service
	|--------------------------------------------------------------------------
	|
	| param : service_id
	| id : 1
	| name : Zti
	|
	*/
	public $_service_id = "1";
	/*
	|--------------------------------------------------------------------------
	| Operating System (OS)
	|--------------------------------------------------------------------------
	|
	| param : os_id
	| id: 1, 2, 3
	| name : Android, iOS, Windows Phone
	|
	*/
	public $_os_id = "1";
	/*
	|--------------------------------------------------------------------------
	| User Group
	|--------------------------------------------------------------------------
	|
	| param : user_group
	| id: 0
	| name : All
	|
	*/
	public $_user_group = "0";
	
	function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * @return string
	 */
	public function service()
	{
		$this->_protocol = $this->config->item('vec_protocol');
		$this->_host = $this->config->item('vec_host');
		$this->_port = $this->config->item('vec_port');
		$this->_path = $this->config->item('vec_path');
		$service_url = $this->_protocol . $this->_host . ":" . $this->_port . $this->_path;
		return $service_url;
	}
	
	private function output( $method, $params )
	{
		$this->service = $this->service();
		$params['method'] = (isset($params['method']))? $params['method'] : $this->_method;
		$params['service_id'] = $this->_service_id;
		$params['os_id'] = $this->_os_id;
		$params['user_group'] = $this->_user_group;
		if($method == 'getActivity.do' || $method =='getActivityDtl.do'){
			$this->service  = $this->_protocol . $this->_host . ":" . $this->_port ."/vcop/activity/api/";
		}
		if($method == 'getArticle.do' || $method =='getArticleDtl.do'){
			$this->service  = $this->_protocol . $this->_host . ":" . $this->_port ."/vcop/article/api/";
		}
		if($method == 'getJobList.do' || $method == 'getJobDetail.do'){
			$this->service  = $this->_protocol . $this->_host . ":" . $this->_port ."/vcop/job/api/";
		}
		if($method == "getLink.do"){
			$this->service  = $this->_protocol . $this->_host . ":" . $this->_port ."/vcop/externallink/api/";
		}
		if($method == "getImage.do"){
			$this->service  = $this->_protocol . $this->_host . ":" . $this->_port ."/vcop/welcomeimage/api/";
		}
		return json_decode($this->curl->simple_get($this->service . $method , $params));
	}
	
	/**
	 * @param string $query
	 * @param string $param
	 * @return mixed
	 */
	public function get($query = null , $params = array(), $page = 0, $limit = 10)
	{
		
		
		if (!sizeof($params)){
			return $this->output($query.".do",$params);
		}
		
		else if( method_exists($this, $query) ) {
			return call_user_func_array(array($this, $query), array('params'=>$params, 'page'=>$page, 'limit'=>$limit));
		}
	}

	private function getStudentPortfolio( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getUserEmployedHistory( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getUserTrainingHistory( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getJobList( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getJobDetail( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getStudentDetail( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getStudentProfileDetail( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getCorpDetail( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getArticle( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getArticleDtl( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getActivity( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	private function getActivityDtl( $params )
	{
		return $this->output(__FUNCTION__.".do", $params);
	}
	

	
	private function content( $params, $page , $limit )
	{
		if(isset($params['searchMessage'])){
			$params['method'] = "search";
		}
		
		$params['version_type_id'] = '0';
		$params['page'] = $page;
		$params['limit'] = $limit;
		
		return $this->output(__FUNCTION__.".do", $params);
	}
	
	private function download( $params )
	{
		$params['user_id'] = $this->session->userdata('user_id');
		$params['method'] = $params['method'];
		
		switch ($params['method']){

			case "purchase":
				$params['charge_code_id'] = 0;
				$params['c_id'] = $params['c_id'];
			break;
			
			case "request_download":
				$params['charge_code_id'] = 0;
				$params['c_id'] = $params['c_id'];
			break;
			
			case "download":
				
			break;
			
			case "finish_download":
				
			break;
		}
		
		return $this->output(__FUNCTION__.".do", $params);
	}
	
}
