<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dekdee extends CI_Controller {
	
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
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = (isset($this->session->userdata['lang']))? $this->session->userdata['lang'] : 'th';
		$data['_server'] = $this->_server;
		$data['Province'] = $this->api_model->get('getProvince');
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']: '-';


		$content = array();

		$this->template->content->view('Dekdee/main', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */