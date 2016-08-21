<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {
	
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
		

		if(empty($this->session->userdata['user_role_id']) || $this->session->userdata['user_role_id'] !=='3'){
			redirect('/', 'refresh');
		}
// 		$this->output->enable_profiler(true);

		$this->_protocol = $this->config->item('vec_protocol');
		$this->_host = $this->config->item('vec_host');
		$this->_port = $this->config->item('vec_port');
		$this->_path = $this->config->item('vec_path');

		$this->_server = $this->_protocol . $this->_host . ":" . $this->_port . $this->_path ;

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
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$data = array(); 

		$data['userdata'] = $this->session->userdata;
		$data['StudentDetail'] = $this->api_model->get('getStudentDetail');
		$data['StudentIntent'] = $this->api_model->get('getStudentIntent');
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Corp'] = $this->api_model->get('getCorp');

		$this->template->content->view('Student/index', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function Profile(){

		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['Province'] = $this->api_model->get('getProvince');
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Interesting'] = $this->api_model->get('getInterestingJob');
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/Profile', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function WorkHistory(){

		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;

		$data['UserEmployedHistory'] = $this->api_model->get('getUserEmployedHistory', array('userId'=>$this->session->userdata['user_id']) );

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/work-history', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function TrainHistory(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['TrainingHistory'] = $this->api_model->get('getUserTrainingHistory', array('userId'=>$this->session->userdata['user_id']) );

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/train-history', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		//$this->template->footer = 'Made with Twitter Bootstrap';
		$this->template->publish();
	}

	function Portfolio(){

		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['PortType'] = $this->api_model->get('getPortType');
		$data['PortLevel'] = $this->api_model->get('getPortLevel');
		
		$data['StudentPortfolio'] = $this->api_model->get('getStudentPortfolio', array('userId'=>$this->session->userdata['user_id']) );
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/portfolio', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		//$this->template->footer = 'Made with Twitter Bootstrap';
		$this->template->publish();
	}
	function AddPortfolio(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['PortType'] = $this->api_model->get('getPortType');
		$data['PortLevel'] = $this->api_model->get('getPortLevel');
		
		$data['StudentPortfolio'] = $this->api_model->get('getStudentPortfolio', array('userId'=>$this->session->userdata['user_id']) );
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/addPortfolio', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function UpdPortfolio(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['PortType'] = $this->api_model->get('getPortType');
		$data['PortLevel'] = $this->api_model->get('getPortLevel');
		
		$data['StudentPortfolio'] = $this->api_model->get('getStudentPortfolio', array('userId'=>$this->session->userdata['user_id']) );
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/updPortfolio', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
	function Apprentice(){

		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/apprentice', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		//$this->template->footer = 'Made with Twitter Bootstrap';
		$this->template->publish();
	}

	
	function User(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['Prefix'] = $this->api_model->get('getPrefix');


		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/user', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	function Transcript(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['Prefix'] = $this->api_model->get('getPrefix');

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Student/transcript', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */