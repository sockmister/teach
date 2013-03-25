<?php
/*
Controller for my group page 
*/

class My_group extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

	//view all groups that person has joined
	public function view(){

	}
}
?>