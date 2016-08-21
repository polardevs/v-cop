<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Update extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->helper('text');
		$this->load->helper('chrset');

		$this->_lang = (isset($this->session->userdata['lang']))? $this->session->userdata['lang'] : 'th';

		$this->config->set_item('language', $this->_lang);
		$this->lang->load('navigation');
		$this->lang->load('student');
		$this->lang->load('main');
		$this->lang->load('company');

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

	public function index(){
		echo "update";
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['getLink'] = $this->api_model->get('getLink');
		
		echo "<pre>";
		print_r($data);
		echo "</pre>";
		$newdata = array('update'  => 'update');
		$this->session->set_userdata($newdata);
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Update/index', $data);
		$this->template->header->widget('navigation', $data);
		$this->template->footer->view('widgets/footer', $data);
		$this->template->publish();
	}
	public function StudentUpdate(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['getLink'] = $this->api_model->get('getLink');
		$data['Province'] = $this->api_model->get('getProvince');
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Interesting'] = $this->api_model->get('getInterestingJob');

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Update/student-update', $data);
		$this->template->header->widget('navigationstudent', $data);
		// $this->template->header->view('widgets/navigation', $data);
		$this->template->footer->view('widgets/footer', $data);
		$this->template->publish();
	}

	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */