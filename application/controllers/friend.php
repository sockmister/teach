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
		if($this->session->userdata('logged_in') != "true") {
			redirect("/welcome/index");
			return;
		}	
	}

	public function index()
	{
		$data['activeTab'] = 'friendsT';

		$this->load->view('header', $data);
		$this->load->view('my_friend_view');
	}


	//retrieve list of friends of $person
	public function list_friend(){

	}

	public function befriend($person){
		$this->load->model('friend_model');

		$user = $this->session->userdata('email');
		$person = base64_decode($person);
		$this->friend_model->create_friend($user, $person);

		$data = $this->friend_model->retrieve_friend($user, $person);
		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	public function unfriend($person){
		$this->load->model('friend_model');

		$user = $this->session->userdata('email');
		$person = base64_decode($person);
		$this->friend_model->delete_friend($user, $person);

		$data = $this->friend_model->retrieve_friend($user, $person);
		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

}
?>