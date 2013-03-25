<?php
/*
Controller for view group page
*/

class View_group extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

	//add view group, displaying all friends
	public function view_group(){
	}

	//add as friend
	public function add_friend(){
	}
}
?>