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

	public function update_profile()
	{
		#echo $this->input->post('gender');
		#echo var_dump($this->input->post('gender'));
		$userdata = $this->user_model->retrieve_user_details($this->get_logged_in_username());
		$username = $userdata['email'];
		$name = $this->input->post('name');
		$dob = $this->input->post('dob');
		$gender = $this->input->post('gender');
		$phone = $this->input->post('phone');
		$old_password = $this->input->post('old_password');
		$new_password = $this->input->post('new_password');
		$result = true;
		
		if ($old_password !== '' && $new_password !== '') {
			// Attempt to change password
			$result = $this->user_model->change_user_password($username, $old_password, $new_password);
			if ($result) {
				// Changed password successfully
			}
			else {
				// Failed to change password
			}
		}

		if (!($dob = date("Y-m-d", strtotime($dob)))) {
			$dob = NULL;
		}

		$result = $result && $this->user_model->update_user_profile($username, $name, $dob, $gender, $phone);

		if ($result) {
			// Update successful, redirect
			redirect('profile/index');
		}
		else {
			// Update failed, redirect
			redirect('profile/index');
		}
	}
}
?>