<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {

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
		$data['jobId'] = ($this->input->post('jobId'))? $this->input->post('jobId'): $this->input->get('jobId') ;
		$data['JobDetail'] = $this->api_model->get('getJobDetail' , array('jobId'=>$data['jobId']));
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';
		
		if(($data['JobDetail']) && $data['JobDetail']->responseCode == 200){
			if($data['JobDetail']->data->corpId){
				$data['corpId'] = $data['JobDetail']->data->corpId;
			}
			$data['CorpDetail'] = $this->api_model->get('getCorpDetail',array('corpId'=>$data['corpId']));
		}
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Jobs/index', $data);
		$this->template->header->view('widgets/set_navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function AddPosition(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		$data['Province'] = $this->api_model->get('getProvince');
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Level'] = $this->api_model->get('getLevel');
		
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Jobs/AddPosition', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	function UpdatePosition(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['_corpId'] = $this->_corpId;
		$data['jobId'] = $this->input->get('jobId');
		$data['Province'] = $this->api_model->get('getProvince');
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['JobDetail'] = $this->api_model->get('getJobDetail' , array('jobId'=>$data['jobId']));
		$data['Level'] = $this->api_model->get('getLevel');

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Jobs/UpdPosition', $data);
		$this->template->header->widget('navigationompany.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
	function Favorites(){
		$data = array();
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;

		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Jobs/Favorites', $data);
		$this->template->header->widget('navigationstudent.php', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */