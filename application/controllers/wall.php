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

		//check user login here
		if($this->session->userdata('logged_in') != "true") {
			redirect("/welcome/index");
			return;
		}		
	}

	//check active tab. seems to be not working.
	public function index(){
		$user = $this->session->userdata('email');

		$this->load->model("friend_model");
		$data = $this->friend_model->retrieve_friend($user, $user);
		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	//retrieve profile page of $person
	public function view($person){
		$this->load->model("friend_model");
		
		$user = $this->session->userdata('email');
		$person = base64_decode($person);
		$data = $this->friend_model->retrieve_friend($user, $person);

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	public function postComment(){
		$comment = $this->input->post('comment');
		
		$this->load->model("comment_model");
	}
}
?>