<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Resume extends CI_Controller {

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
		$data['lang'] = $data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['userdata'] = $this->session->userdata;
		$data['role'] = (isset($data['userdata']['user_role_id']))? $data['userdata']['user_role_id']:'-';

		$data['studentId'] = $this->input->get('studentId');
		$data['schoolId'] = $this->input->get('schoolId');
		$data['userId'] = $this->input->get('userId');
		$data['JobType'] = $this->api_model->get('getJobType');
		$data['Portfolio'] = $this->api_model->get('getStudentPortfolio' , array('userId'=>$data['userId']) );
		$studentDetail = $this->api_model->get('getStudentDetail' , array('userId'=>$data['userId']) );
		
		if(!$studentDetail){
			 header( "location: ".base_url() );
		}

		$StudentProfile = $this->api_model->get('getStudentProfileDetail' , array('peopleId'=>$studentDetail->data->peopleId) );
		$studentDetail->data->homeCurr = $studentDetail->data->homeIdCurr." ";
		$studentDetail->data->homeCurr .= lang("FORM_MOO") . $studentDetail->data->mooCurr." ";
		$studentDetail->data->homeCurr .= lang("FORM_SOI") . $studentDetail->data->soiCurr." ";
		$studentDetail->data->homeCurr .= lang("FORM_STREET") . $studentDetail->data->streetCurr." ";
		$studentDetail->data->homeCurr .= lang("FORM_SUB_DISTRICT") ." ". $studentDetail->data->subDistrictCurr." ";
		$studentDetail->data->homeCurr .= lang("FORM_DISTRICT") ." ".  $studentDetail->data->districtCurr." ";
		$studentDetail->data->homeCurr .= lang("FORM_PROVINCE") . $studentDetail->data->provinceCurr." ";
		$studentDetail->data->homeCurr .= $studentDetail->data->zipcodeCurr." ";
		
		$data['StudentDetail'] = $studentDetail;
		$data['StudentProfile'] = $StudentProfile;
		
		$data['UserEmployedHistory'] = $this->api_model->get('getUserEmployedHistory' , array('userId'=>$data['userId']) );
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$this->template->content->view('Resume/index', $data);
		$this->template->header->widget('navigationshoewsume.php', $data);
		$this->template->publish();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */