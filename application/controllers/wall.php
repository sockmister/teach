<?php
/*
Controller for wall page
*/

class Wall extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

	public function index(){
		$data['activeTab'] = "wallT";
		$this->load->view('header', $data);
	}

	//retrieve profile page of $person
	public function view($person){
	}
}
?>