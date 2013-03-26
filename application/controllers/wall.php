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
		// to be filled in by sql queries
		$data['email'] = 'lol@gmail.com';
		$data['name'] = 'Motsu';
		$data['phone'] = '999';
		$data['address'] = 'changi';
		$data['description'] = 'i rock';
		$data['gender'] = 'm';
		$data['dob'] = "02/16/12";
		$data['pic'] = "i dont know how";

		$this->load->view('header', $data);
		$this->load->view('profile_view');


	}

	//retrieve profile page of $person
	public function view($person){
	}

	public function postComment(){
		$comment = $this->input->post('comment');
		echo $comment;
	}
}
?>