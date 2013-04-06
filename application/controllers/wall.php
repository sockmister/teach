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
		//print_r($data);
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

		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	public function new_view($person){
		$this->load->model("user_model");
		$this->load->model("friend_model");
		$this->load->model("group_model");
		$this->load->model("comment_model");

		$user = $this->session->userdata('email');
		$person = base64_decode($person);

		$request_from = $this->friend_model->is_friend($user, $person);

		if($person == $friend || $request_from == "accepted"){
			$data['user'];
			$data['groups'];
			$data['friends'];
			$data['comments'];
			$data['friend_status'];
		}
		else{
			$data['user'];
			$data['groups'];
		}

		$data['activeTab'] = "wallT";
		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	public function postComment(){
		$comment = $this->input->post('comment');
		$person = $this->input->post('person');			
		$user = $this->session->userdata('email');
		
		$this->load->model("comment_model");
		$this->comment_model->create_comment($user, $person, $comment);

		$this->load->model("friend_model");
		$data = $this->friend_model->retrieve_friend($user, $person);
		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		redirect('wall/view/'.base64_encode($person), 'refresh');
	}
}
?>