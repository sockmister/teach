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
		$this->db->query("PRAGMA foreign_keys = ON");
		define('ASSEST_URL', base_url().'teach/assets/');
		if($this->session->userdata('logged_in') != "true") {
			redirect("/welcome/index");
			return;
		}	
	}

	public function index()
	{
		$user = $this->session->userdata('email');

		$this->load->model('friend_model');
		$data['friends'] = $this->friend_model->retrieve_friend_list($user);
		$data['activeTab'] = "friendsT";

		$this->load->view('header', $data);
		$this->load->view('my_friend_view');
	}

	public function test_friend(){
		$sql = "INSERT INTO friend
				VALUES ('a', 'b', 'c')";

		$query = $this->db->query($sql);
		//$query = $query->result;
		if($this->db->affected_rows() > 0)
		{	
			echo 'it was inserted';
		}
		else{
			echo 'nothing was inserted';
		}
	}


	//retrieve list of friends of $person
	public function list_friend(){
		$user = $this->session->userdata('email');

		$this->load->model('friend_model');
		$data = $this->friend_model->retrieve_friend_list($user);
		$data['activeTab'] = "friendsT";

		$this->load->view('header', $data);
		$this->load->view('my_friend_view');
	}

	//accept a friend request
	public function accept_friend($person){
		$this->load->model('friend_model');

		$user = $this->session->userdata('email');
		$person = base64_decode($person);
		$this->friend_model->update_friend($user, $person);

		$data = $this->friend_model->retrieve_friend($user, $person);
		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	public function withdraw_request($person){
		$this->load->model('friend_model');

		$user = $this->session->userdata('email');
		$person = base64_decode($person);
		$this->friend_model->delete_friend($user, $person);

		$data = $this->friend_model->retrieve_friend($user, $person);
		$data['activeTab'] = "wallT";

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	//behavior: set status as 0 -> request pending.
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