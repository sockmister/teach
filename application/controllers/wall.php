<?php
/*
Controller for wall page
*/


/*
TODO:
Once session is up, need to enable the access control.
Ensure friend/unfriend is working correctly.

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
		
		$user = "john@gmail.com";

		$this->load->model("friend_model");
		$data = $this->friend_model->retrieve_friend($user, $user);

		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	//retrieve profile page of $person
	public function view($person){
		$this->load->model("friend_model");
		
		//$user = "john@gmail.com";
		$person = base64_decode($person);
		//$data = $this->friend_model->retrieve_friend($user, $person);

		$data = $this->friend_model->retrieve_friend("jane@gmail.com", $person);

		//print_r($data);
		$this->load->view('header', $data);
		$this->load->view('profile_view');
	}

	public function postComment(){
		$comment = $this->input->post('comment');
		echo $comment;
	}
}
?>