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
		//$this->db->query("PRAGMA foreign_keys = ON");
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

	public function befriend($friend){
		$this->load->model('friend_model');

		//get user_email from session
		//assume $friend is email
		//$this->friend_model->create_friend("john@email.com", "jane@email.com");
		$user;		//->get user data
		$friend = base64_decode($friend);
		$this->friend_model->create_friend($user, $friend);

		//what view to load
	}

	public function unfriend($person){
		$this->load->model('friend_model');

		//$this->friend_model->delete_friend("john@email.com", "jane@email.com");
		$user;
		$person = base64_decode($person);
		$this->friend_model->delete_friend($user, $person);

		//what view to load
	}

}
?>