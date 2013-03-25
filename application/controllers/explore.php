<?php
/*
Controller for explore page
*/

class Explore extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

	//view all groups available
	public function view_all(){
	}

	//join a group
	public function join(){
	}

	//create a group
	public function create(){
	}
}
?>