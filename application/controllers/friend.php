<?php
/*
Controller for friends page
*/

class Friend extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

	//retrieve list of friends of $person
	public function list($person){
	}
}
?>