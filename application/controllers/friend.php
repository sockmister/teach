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

	public function index()
	{

		//hide data vy whether friends or not

		$data['activeTab'] = 'friendsT';

		$this->load->view('header', $data);
		$this->load->view('my_friend_view');
	}


	//retrieve list of friends of $person
	public function list_friend(){

	}

	public function unfriend($person){
		echo $person;

	}

}
?>