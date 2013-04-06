<?php
/*
Controller for my group page 
*/

class My_group extends CI_Controller {
	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('group_model','',TRUE);
		define('ASSEST_URL', base_url().'teach/assets/');		
		if($this->session->userdata('logged_in') != "true") {
			redirect("/welcome/index");
			return;
		}
	}

	public function index(){
		$user = $this->session->userdata('email');
		$this->load->model('group_model');
		$data['groups'] = $this->group_model->my_group_order_by_name($user);
		//print_r($data['groups']);

		$data['activeTab'] = "groupT";
		$this->load->view('header', $data);
		$this->load->view('my_group_view');
	}
	
	//view groups that person has joined
	public function view_order($orderBy){
		$user = $this->session->userdata('email');

		if (strcmp($orderBy,"Alphabetical") == 0) {
			$data['groups'] = $this->group_model->my_group_order_by_name($user);
			$data['activeTab'] = 'groupT';
			$this->load->view('header.php', $data);
			$this->load->view('my_group_view.php');
		}
		else if (strcmp($orderBy, "Popularity" == 0)) {
			$data['groups'] = $this->group_model->my_group_order_by_popularity($user);
			$data['activeTab'] = 'groupT';
			$this->load->view('header.php', $data);
			$this->load->view('my_group_view.php');
		}
		else if (strcmp($orderBy, "DateCreated" == 0)) {
			$data['groups'] = $this->group_model->my_group_order_by_date_created($user);
			$data['activeTab'] = 'groupT';
			$this->load->view('header.php', $data);
			$this->load->view('my_group_view.php');
		}
		else {
			echo "fail";
		}

	}


	// view individual group details
	public function view_group ($group) {
		$this->load->model('group_model');

		$data = $this->group_model->retrieve_group($group);

		$user = $this->session->userdata('email');

		$data['user_is_member'] = $this->group_model->check_user_belong_to($group, $user);

		if (!empty($data['user_is_member'])){
			$data['members_in_group'] = $this->group_model->retrieve_group_members($group);
			$this->load->model('skill_comment_model');
			$data['skill_comments'] = $this->skill_comment_model->retrieve_skill_comments($group, $user);
		}
		
		$data['group'] = $group;
		$data['activeTab'] = "";
		$this->load->view('header', $data);
		$this->load->view('group_view');
	}

	public function join($group){
		$encoded_group = $group;

		$group = base64_decode($group);
		$result = false;
		$user = $this->session->userdata('email');
		if ($this->group_model->join_group($group,$user)) {
			$result = true;
		}

		if ($result) {
			redirect("my_group/view_group/".$encoded_group, 'refresh');
		}
		else {
			echo "fail";
		}

	}
	
	public function leave($group){
		$encoded_group = $group;

		$group = base64_decode($group);
		$result = false;
		$user = $this->session->userdata('email');

		if ($this->group_model->leave_group($group,$user)) {
			$result = true;
		}

		if ($result) {
			redirect("my_group/view_group/".$encoded_group, 'refresh');
		}
		else {
			echo "fail";
		}
	}

	public function postComment(){
		$skill = $this->input->post('skill');
		$user = $this->session->userdata('email');
		$comment = $this->input->post('comment');
		
		//Create skill comment
		$this->load->model("skill_comment_model");
		$this->skill_comment_model->create_skill_comment($skill, $user, $comment);

		$this->view_group($skill);
	}

}
?>