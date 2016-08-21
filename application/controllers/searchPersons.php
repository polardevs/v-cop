<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SearchPersons extends CI_Controller {

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
		
		if(isset($this->session->userdata['corpId'])){
			$this->_corpId = $this->session->userdata['corpId'];
		}
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
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Province'] = $this->api_model->get('getProvince');
		$data['Level'] = $this->api_model->get('getLevel');
		$data['SchoolList'] = $this->api_model->get('getSchoolList');
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('SearchPersons/index', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function SearchPersons(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		
		$data['Province'] = $this->api_model->get('getProvince');
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Level'] = $this->api_model->get('getLevel');
		$data['SchoolList'] = $this->api_model->get('getSchoolList');

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('SearchPersons/SearchPersons', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function Favorites(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('SearchPersons/favorites', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */