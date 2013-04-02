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
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

    public function is_user_logged_on($username) {
        
    }

	public function index()
	{
		$data['activeTab'] = 'profileT';

		// to be filled in by sql queries
		$data['email'] = 'lol@gmail.com';
		$data['name'] = 'Motsu';
		$data['phone'] = '999';
		$data['address'] = 'changi';
		$data['description'] = 'i rock';
		$data['gender'] = 'm';
		$data['dob'] = "02/16/12";
		$data['pic'] = "i dont know how";

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