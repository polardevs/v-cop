<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
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
		$this->load->helper('text');
		$this->load->helper('chrset');

		$data = array(); 
		$this->template->title = 'Vocational Co-Operation Board Vocational Man Power Center หางาน สมัครงาน งานราชการ งานรัฐวิสาหกิจ งาน ตำแหน่งงานว่าง ข่าวสารอาชีวศึกษา';
		$data['banner'] = $this->api_model->get('banner');
		$data['category'] = $this->api_model->get('categoryGroup');
		$this->template->content->view('banner', $data);
		
		$content = array();
		$content['ebook_content'] = $this->api_model->get('content', array('c_type_id'=>'1'));
		$content['video_content'] = $this->api_model->get('content', array('c_type_id'=>'2'));
		$this->template->content->view('content', $content);
		// Set a partial's content
		$this->template->footer = 'Made with Twitter Bootstrap';
		// Publish the template
		$this->template->publish();
	}
	
	function register()
	{
		$this->load->helper('url');
		
		if($_POST){
			
			$data = array(
					'email' => $this->input->post("email"),
					'username' => $this->input->post("username"),
					'user_role_id' => $this->input->post("user_role_id"),
					'user_id' => $this->input->post("user_id"),
					'user_group_id' => $this->input->post("user_group_id"),
					'is_logged_in' => true
			);
				
			$this->session->set_userdata($data);
			echo json_encode(array('res_code'=>200, 'res_url'=>base_url('auth')));
		} else {
			
		}
		
	}
	
	function login()
	{
		$this->load->helper('url');
		if($_POST){
			if($this->input->post("data")['userType']['userTypeId'] == 3) {				
				$res_url = 'student';
				$data = array(
					'email' => $this->input->post('data')['email'],
					'username' => $this->input->post("data")['username'],
					'user_role_id' => $this->input->post("data")['userType']['userTypeId'],
					'user_id' => $this->input->post("data")['userId'],
					'name' => $this->input->post("data")['name'],
					'lastname' => $this->input->post("data")['lastname'],
					'res_url' => 'student',
					'is_logged_in' => true
				);
				$update =  isset($this->input->post("data")['update']);
				if ($update =='update'){
					$res_url='update/student';
				}
			} else if($this->input->post("data")['userType']['userTypeId'] == 4)  {
				$res_url = 'profile-company';

				$data = array(
					'email' => $this->input->post('data')['email'],
					'username' => $this->input->post("data")['username'],
					'user_role_id' => $this->input->post("data")['userType']['userTypeId'],
					'user_id' => $this->input->post("data")['userId'],
					'name' => $this->input->post("data")['corperationInfo']['name'],
					'lastname'=>'',
					'corpId' => $this->input->post("data")['corperationInfo']['corpId'],
					'res_url' => $res_url,
					'contactName'=>$this->input->post("data")['name'],
					'contactLastname'=>$this->input->post("data")['lastname'],
					'birthdate'=>$this->input->post("data")['birthdate'],
					'birthdate'=>$this->input->post("data")['birthdate'],
					'prefixId'=>$this->input->post("data")['MPrefix']['prefixId'],
					'prefixName'=>$this->input->post("data")['MPrefix']['name'],
					'contactTel'=>$this->input->post("data")['tel'],
					'is_logged_in' => true
				);
			}

			//print_r($data);
	
			$this->session->set_userdata($data);	
			echo json_encode(array('res_code'=>200, 'res_url'=>base_url($res_url)));			
		}			
	}
	
	public function facebook_login(){
	
		$this->load->library('facebook'); // Automatically picks appId and secret from config
		$this->load->helper('string');
		
		$user = $this->facebook->getUser();
		
		if ($user) {
			try {
				$user_profile = $this->facebook->api('/me');
				
				$register['method'] = "register";
				$register['email'] = $user_profile["email"];
				$register['username'] = trimCross($user_profile["name"], 0, "_");
				$register['fb_id'] = $user_profile["id"];
				$register['fb_name'] = $user_profile["name"];
				
				$set = $this->api_model->get('user', $register);
				unset($register);
				
				if($set->res_code > "400" && $set->data == "This email/fb_id already in use."){
					
					$login['method'] = "login";
					$login['email'] = $user_profile["email"];
					$login['username'] = trimCross($user_profile["name"], 0, "_");
					$login['fb_id'] = $user_profile["id"];
					$login['fb_name'] = $user_profile["name"];
					
					$logged_in = $this->api_model->get('user', $login);
					unset($login);
					
// 					echo "<pre>";
// 					echo "login";
// 					echo "</pre>";
					
// 					echo "<pre>";
// 					print_r($logged_in);
// 					echo "</pre>";
					
						$data = array(
								'email' => $logged_in->email,
								'username' => $logged_in->username,
								'user_role_id' => $logged_in->user_role_id,
								'user_id' => $logged_in->user_id,
								'user_group_id' => $logged_in->user_group_id,
								'is_logged_in' => true
						);
						
// 						echo "<pre>";
// 						print_r($data);
// 						echo "</pre>";
		
						$this->session->set_userdata($data);
				} else {
					$data = array(
							'email' => $set["email"],
							'username' => $set['username'],
							'user_role_id' => $set['user_role_id'],
							'user_id' => $set['user_id'],
							'user_group_id' => $set['user_group_id'],
							'is_logged_in' => true
					);
					
					$this->session->set_userdata($data);
				}
			} catch (FacebookApiException $e) {
				$user = null;
			}
		}else {
			$this->facebook->destroySession();
		}
		
		redirect('home');
	}
	
	function logout()
	{
		$this->load->library('facebook'); // Automatically picks appId and secret from config
		$this->facebook->destroySession();
		
		$this->auth_model->is_logged_out(true);
	}

	function changeLang(){
		$data = array(
			'lang' => $_POST['lang']
			);
		$this->session->set_userdata($data);
	}
	function setSession(){
		$data = array(
			'set_corpName' => $this->input->post('corpName'),
			'set_corpTypeId' => $this->input->post('corpTypeId'),
		    'set_tradeNo' => $this->input->post('tradeNo'),
		    'set_taxNo' => $this->input->post('taxNo'),
		    'set_socialSecNo' => $this->input->post('socialSecNo'),
		    'set_enterpriseTypeId' => $this->input->post('enterpriseTypeId'),
		    'set_enterpriseSubTypeId' => $this->input->post('enterpriseSubTypeId'),
		    'set_detail' => $this->input->post('detail'),
		    'set_benefits' => $this->input->post('benefits'), 
		    'set_username' => $this->input->post('username'),
		    'set_password' => $this->input->post('password'),
		    'set_confirmPassword' => $this->input->post('confirmPassword'),
		    'set_address' => $this->input->post('address'),
		    'set_provinceId' => $this->input->post('provinceId'),
		    'set_districtId' => $this->input->post('districtId'),
		    'set_subDistrictId' => $this->input->post('subDistrictId'),
		    'set_zipcode' => $this->input->post('zipcode'),
		    'set_tel' => $this->input->post('tel'),
		    'set_fax' => $this->input->post('fax'),
		    'set_email' => $this->input->post('email'), 
		    'set_confirmEmail' => $this->input->post('confirmEmail'),
		    'set_website' => $this->input->post('website'),
		    'set_latitude' => $this->input->post('latitude'),
		    'set_longitude' => $this->input->post('longitude'),
		    'set_contactPrefixId' => $this->input->post('contactPrefixId'),
		    'set_contactName' => $this->input->post('contactName'),
		    'set_contactLastname' => $this->input->post('contactLastname'),
		    'set_position' => $this->input->post('position'),
		    'set_contactTel' => $this->input->post('contactTel'), 
		    'set_contactEmail' => $this->input->post('contactEmail'),
		    'set_update' => 'update',
		);
		$this->session->set_userdata($data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */