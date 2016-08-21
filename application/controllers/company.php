<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {
	
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

		if(empty($this->session->userdata['user_role_id']) || $this->session->userdata['user_role_id'] !=='4'){
			redirect('/', 'refresh');
		}
		$this->_corpId = $this->session->userdata['corpId'];

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
		
		$data = array(); 
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('student.php/profile', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	function Profile(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		$data['CorpType'] = $this->api_model->get('getCorpType');
		$data['EnterpriseType'] = $this->api_model->get('getEnterpriseType');
		$data['BusinessType'] = $this->api_model->get('getBusinessType');
		$data['Province'] = $this->api_model->get('getProvince');
		$data['Prefix'] = $this->api_model->get('getPrefix');
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/profile', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
	function Position(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		$data['JobList'] = $this->api_model->get('getJobList' , array('corpId'=>$this->_corpId));
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/position', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function AddCoordinator(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/addcoordinator', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		//$this->template->footer = 'Made with Twitter Bootstrap';
		$this->template->publish();
	}

	function User(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/user', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();

	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */