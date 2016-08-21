<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('text');
		$this->load->helper('chrset');

		$lang = (isset($this->session->userdata['lang']))? $this->session->userdata['lang'] : 'th';

		$this->config->set_item('language', $lang);
		$this->lang->load('navigation');
		$this->lang->load('student');
		$this->lang->load('main');

		$this->_protocol = $this->config->item('vec_protocol');
		$this->_host = $this->config->item('vec_host');
		$this->_port = $this->config->item('vec_port');
		$this->_path = $this->config->item('vec_path');
		$this->_server = $this->_protocol . $this->_host . ":" . $this->_port . $this->_path ;

		
// 		$this->output->enable_profiler(true);
	}
	
	function _remap( $method , $params = array() )
	{
		if( method_exists($this, $method) ) {
			return call_user_func_array(array($this, $method), $params);
		} else {
			show_404();
		}
	}
	
	public function index()
	{
		$data = array(); 
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = (isset($this->session->userdata['lang']))? $this->session->userdata['lang'] : 'th';
		$data['getImage'] = $this->api_model->get('getImage');
		
		$newdata = array('welcome'  => 'welcome');
		$this->session->set_userdata($newdata);

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('welcome', $data);
		$this->template->publish();
	}
	public function test()
	{
		$this->load->view('welcome_message');
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */