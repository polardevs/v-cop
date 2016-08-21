<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$data = array();
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Province'] = $this->api_model->get('getProvince');
		$data['Level'] = $this->api_model->get('getLevel');
		$data['getImage'] = $this->api_model->get('getImage');
		$data['Curriculum'] = $this->api_model->get('getCurriculum');
		$data['Preferences'] = $this->api_model->get('getPreferences');
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';
		$userid = ($this->session->userdata('user_id'))? $this->session->userdata('user_id') :'' ;
		foreach ($data['Preferences'] as $key => $value) {
			foreach ($data['Preferences'][$key] as $keys => $value) {
				if($value == 'updateSiteEnable') $prefVal = $key;
			}		
		}
		
		$prefVal = $data['Preferences'][$prefVal]->prefVal;
		$updateStudent = $this->session->userdata('update') ;
		$now = strtotime("now");
		$welcome = $this->session->userdata('welcome');
		$userid = ($this->session->userdata('user_id'))? $this->session->userdata('user_id') :'' ;
		
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->content->view('banner', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
	function Redirect(){
		$data = array();
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/redirect', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function Register(){
		if (isset($this->session->userdata['user_role_id']))
		{
		     redirect('/', 'refresh');
		}
		$data = array();
		$data['CorpType'] = $this->api_model->get('getCorpType');
		$data['EnterpriseType'] = $this->api_model->get('getEnterpriseType');
		$data['Province'] = $this->api_model->get('getProvince');
		$data['Prefix'] = $this->api_model->get('getPrefix');
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/register', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function ShowCorp(){
		$data = array();
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['userdata'] = $this->session->userdata;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Company/showcorp', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
	function Forgot(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('forgot', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function ProvinceStat(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('ProvinceStat', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function Download(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Download/index.php', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */