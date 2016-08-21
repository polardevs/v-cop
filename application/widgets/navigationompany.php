<?php

/*
 * Demo widget
 */
class Navigationompany extends Widget {

    public function display($data) {
        
    	$this->load->library('facebook'); // Automatically picks appId and secret from config
    	// OR
    	// You can pass different one like this
    	//$this->load->library('facebook', array(
    	//    'appId' => 'APP_ID',
    	//    'secret' => 'SECRET',
    	//    ));
    	
    	$user = $this->facebook->getUser();
    	
    	if ($user) {
    	
    		$data['facebook_url'] = site_url('auth/logout'); // Logs off application
    		// OR
    		// Logs off FB!
    		// $data['logout_url'] = $this->facebook->getLogoutUrl();
    	
    	} else {
    		$data['facebook_url'] = $this->facebook->getLoginUrl(array(
    				'redirect_uri' => site_url('auth/facebook_login'),
    				'scope' => array("public_profile,email") // permissions here
    		));
    	}
    	
        if (!isset($data['items'])) {
            $data['items'] = array(
            		'all'=>'All',
            		'ebook'=>'eBook',
            		'video'=>'Video',
            );
        }

        $this->view('widgets/navigation-company', $data);
    }
    
}