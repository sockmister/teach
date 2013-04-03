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
	}

	public function index(){
		$user = $this->session->userdata('email');
		$this->load->model('group_model');
		$data = $this->group_model->retrieve_all_groups($user);
		$data['activeTab'] = "groupT";
		$this->load->view('header', $data);
		$this->load->view('my_group_view');
	}
	
	//view groups that person has joined
	public function view_order($orderBy){
		if (strcmp($orderBy,"Alphabetical") == 0) {
			$result = $this->group_model->my_group_order_by_name();
			$data['activeTab'] = "groupT";
			$this->load->view('header', $data);
			$this->load->view('my_group_view');
		}
		else if (strcmp($orderBy, "Popularity" == 0)) {
			$result = $this->group_model->my_group_order_by_popularity();
			$data['activeTab'] = "groupT";
			$this->load->view('header', $data);
			$this->load->view('my_group_view');
			//print_r($result);
		}
		else if (strcmp($orderBy, "DateCreated" == 0)) {
			$result = $this->group_model->my_group_order_by_date_created();
			$data['activeTab'] = "groupT";
			$this->load->view('header', $data);
			$this->load->view('my_group_view');
			//print_r($result);
		}
		else {
			echo "fail";
		}	

	}

	// view individual group details
	public function view_group ($group) {
		$this->load->model('group_model');
		$data = $this->group_model->retrieve_group($group);
		$data['group'] = $group;
		$data['activeTab'] = "";
		$this->load->view('header', $data);
		$this->load->view('group_view');
	}

	
	public function leave($group){
		$group = base64_decode($group);
		$result = false;

		if ($this->group_model->leave_group($group)) {
			$result = true;
		}

		if ($result) {
			redirect("explore/index", 'refresh');
		}
		else {
			echo "fail";
		}
	}

}
?>