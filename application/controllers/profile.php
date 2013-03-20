<?php
/*
Controller for profile page
*/

class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		define('ASSEST_URL', base_url().'assets/');		
	}

	public function index()
	{
		echo "hello" ;
		$data['activeTab'] = 'profileT';
		$this->load->view('header.php');
		$this->load->view('profile.htm');
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