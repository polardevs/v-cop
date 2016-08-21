<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	
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

		$this->_protocol = $this->config->item('vec_protocol');
		$this->_host = $this->config->item('vec_host');
		$this->_port = $this->config->item('vec_port');
		$this->_path = $this->config->item('vec_path');
		$this->_server = $this->_protocol . $this->_host . ":" . $this->_port . $this->_path ;

		
// 		$this->output->enable_profiler(true);
	}
	
	public function index()
	{
		$data = array(); 
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['getLink'] = $this->api_model->get('getLink');

		if($this->uri->segment(1) == 'news'){
			$data['Article'] = $this->api_model->get('getArticle');
		}
		else if($this->uri->segment(1) == 'activity'){
			$data['Article'] = $this->api_model->get('getActivity');
		}

		$this->template->content->view('News/main', $data);
		$this->template->header->widget('navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}
	public function detail()
	{
		$data = array(); 
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$data['userdata'] = $this->session->userdata;
		$data['lang'] = $this->_lang;
		$data['_server'] = $this->_server;
		$data['getLink'] = $this->api_model->get('getLink');

		if($this->uri->segment(1) == 'newsdtl'){
			$data['Article'] = $this->api_model->get('getArticleDtl', array('articleId'=>$this->uri->segment(2)));
		}
		else if($this->uri->segment(1) == 'activitydtl'){
			$data['Article'] = $this->api_model->get('getActivityDtl', array('activityId'=>$this->uri->segment(2)));
		}

		// echo "<pre>";
		// print_r($data['Article']);
		// echo "</pre>";
		
		$this->template->content->view('News/detail', $data);
		$this->template->header->widget('navigation', $data);
		$this->template->footer->view('widgets/footer.php', $data);
		$this->template->publish();
	}

	

	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */