<?php 
	$data['getLink'] = $this->api_model->get('getLink');
	
	if($role == 3){
		$data['navbar'] = 'navbar';
		$this->template->header->widget('navigationstudent', $data);
	}
	else if($role == 4){
		$data['navbar'] = 'navbar';
		$this->template->header->widget('navigationompany', $data);
	}
	else{
		$this->template->header->widget('navigation', $data);
	}
?>