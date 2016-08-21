<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function is_logged_in()
	{
		if($this->session->userdata('is_logged_in')){
			return true;
		} else {
			return false;
		}
	}
	
	function is_logged_out( $redirect = false )
	{
		$this->session->sess_destroy();
		
		if($redirect)
		{
			redirect();
		}
	}
	
}
