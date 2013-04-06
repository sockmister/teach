<?php
/*
Controller for explore page
*/

class Explore extends CI_Controller {
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

	public function index()
	{
		

		// refer to stall_owner.php in controller and collection_table.php in view
		// should load the model and get all groups
		/*stall_owner.php

			public function pendingCollectionOrder() {
		$this->load->model("StallOwnerOrderModel");
		$data['ReadyToCollect'] = StallOwnerOrderModel::getReadyOrders($this->session->userdata('stall_id'));
		echo $this->load->view('desktop/collection_table', $data);
	}
		

		in collection_table.php
		<?php 
		foreach ($ReadyToCollect as $dataitem){?>
		
		
		<tr class="gradeA even"> 
			<td class=" sorting_1"><?=$dataitem->order_date?></td> 
			<td><?=$dataitem->order_time?></td> 
			<td><?=$dataitem->name?></td> 
			<td class="center"><?=$dataitem->quantity?></td> 
			<td class="center">$<?=$dataitem->price?></td>
			<td class="center"><?=$dataitem->user_id?></td> 
			<td class="center"><input type="button" value="order collected" onclick="sendToOrderCompleted('<?=$dataitem->id?>')"></td>
			<td class="center"><input type="button" value="incomplete" onclick="sendToOrderIncomplete('<?=$dataitem->id?>')"></td> 				
		</tr>
		
		<? } ?>

	only need groups not joined by user on this page
	*/	
		$user = $this->session->userdata('email');
		$this->load->model('group_model');
		$data['activeTab'] = 'interestT';
		
		// by default order by name
		$data['groups'] = $this->group_model->explore_order_by_name($user);
		$data['order'] = 'Alphabetical';
		//print_r($data['groups']);
		$this->load->view('header.php', $data);
		$this->load->view('explore_view.php');
	}

	//view all groups available
	public function view_all($orderBy){
		$user = $this->session->userdata('email');

		if (strcmp($orderBy,"Alphabetical") == 0) {
			$data['groups'] = $this->group_model->explore_order_by_name($user);
			$data['activeTab'] = 'interestT';
			$data['order'] = 'Alphabetical';
			$this->load->view('header.php', $data);
			$this->load->view('explore_view.php');
		}
		else if (strcmp($orderBy, "Popularity" == 0)) {
			$data['groups'] = $this->group_model->explore_order_by_popularity($user);
			$data['activeTab'] = 'interestT';
			$data['order'] = 'Popularity';
			$this->load->view('header.php', $data);
			$this->load->view('explore_view.php');
		}
		else if (strcmp($orderBy, "DateCreated" == 0)) {
			$data['groups'] = $this->group_model->explore_order_by_date_created($user);
			$data['activeTab'] = 'interestT';
			$data['order'] = 'DateCreated';
			$this->load->view('header.php', $data);
			$this->load->view('explore_view.php');
		}
		else {
			echo "fail";
		}
		
	}

	// view individual group details
	public function view_group ($group) {
		$data['activeTab'] = "";
		$data['group'] = $group;
		$this->load->view('header', $data);
		$this->load->view('group_view');
	}

	//create a group
	public function createGroup(){
		$result = false;
		$groupName = $this->input->post('groupName');
		$description = $this->input->post('description');
		$group = array($groupName,$description);
		$user = $this->session->userdata('email');

		$result = $this->group_model->create_group($group);

		if ($result) {
			//popup dialog to say group created
			$this->group_model->join_group($groupName, $user);
			echo "success";
		}
		else {
			echo "fail";
		}

	}

	//join a group
	public function join($group){
		$group = base64_decode($group);
		$result = false;
		$user = $this->session->userdata('email');
		if ($this->group_model->join_group($group,$user)) {
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