<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @package Star Model
 * @access 29.10.2014
 * @version 0.1
 * @author NopZ [K.]
 * @copyright Zealtech International Co.,Ltd.
 */
class Star_model extends CI_Model
{
	
	private $star_empty = "<i class='icon-star-empty'></i> ";
    private $star_half_empty = "<i class='icon-star-half-empty'></i> ";
    private $star = "<i class='icon-star'></i> ";
	
	function __construct()
	{
		parent::__construct();

	}
	
	function get($rating)
	{
		switch ($rating){
			case '0':
				$star = $this->star_empty . $this->star_empty . $this->star_empty . $this->star_empty . $this->star_empty;
			break;
			
			case ($rating > 0 && $rating < 1):
				$star = $this->star_half_empty . $this->star_empty . $this->star_empty . $this->star_empty . $this->star_empty;
			break;
			
			case '1':
				$star = $this->star . $this->star_empty . $this->star_empty . $this->star_empty . $this->star_empty;
			break;
			
			case ($rating > 1 && $rating < 2):
				$star = $this->star . $this->star_half_empty . $this->star_empty . $this->star_empty . $this->star_empty;
			break;
			
			case '2':
				$star = $this->star . $this->star . $this->star_empty . $this->star_empty . $this->star_empty;
			break;
			
			case ($rating > 2 && $rating < 3):
				$star = $this->star . $this->star . $this->star_half_empty . $this->star_empty . $this->star_empty;
			break;
			
			case '3':
				$star = $this->star . $this->star . $this->star . $this->star_empty . $this->star_empty;
			break;
			
			case ($rating > 3 && $rating < 4):
				$star = $this->star . $this->star . $this->star . $this->star_half_empty . $this->star_empty;
			break;
			
			case '4':
				$star = $this->star . $this->star . $this->star . $this->star . $this->star_empty;
			break;
			
			case ($rating > 4 && $rating < 5):
				$star = $this->star . $this->star . $this->star . $this->star . $this->star_half_empty;
			break;
				
			case '5':
				$star = $this->star . $this->star . $this->star . $this->star . $this->star;
			break;
		}
		
		return $star;
	}
	
}



                          
                          