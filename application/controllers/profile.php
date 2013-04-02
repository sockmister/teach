<?php
/*
Controller for profile page
*/
require(APPPATH.'controllers/authentication.php');
class Profile extends Authentication {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('user_model','',TRUE);
		define('ASSEST_URL', base_url().'teach/assets/');

		// If user is not logged on, redirect to login.
		$this->is_user_logged_in_else_redirect();
	}

	public function index()
	{
		$userdata = $this->user_model->retrieve_user_details($this->get_logged_in_username());
		$data['activeTab'] = 'profileT';

		$data['email'] = $userdata['email'];
		$data['name'] = $userdata['name'];
		$data['phone'] = $userdata['contact_number'];
		$data['address'] = 'changi';
		$data['description'] = 'i rock';
		$data['gender'] = $userdata['gender'];
		$data['dob'] = $userdata['birthday'];
		$data['pic'] = $userdata['photo'];

		#$test = $this->session->userdata['last_activity'];
		#echo $test;
		$this->load->view('header', $data);
		$this->load->view('profile_edit');
	}

	public function count()
	{
		$query = $this->db->query('SELECT COUNT(*) FROM user');
		print_r($query->result());
	}

	public function register()
	{
		$email = $this->input->post('email');
		print $email;
	}
}
?>