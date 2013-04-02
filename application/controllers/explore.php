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
	}

	public function index()
	{
		$data['activeTab'] = 'interestT';

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

		$this->load->view('header.php', $data);
		$this->load->view('explore_view.php');
	}

	//view all groups available
	public function view_all($orderBy){
		if (strcmp($orderBy,"Alphabetical") == 0) {
			$result = $this->group_model->order_by_name();
			print_r($result);
		}
		else if (strcmp($orderBy, "Popularity" == 0)) {
			$result = $this->group_model->order_by_popularity();
			print_r($result);
		}
		else if (strcmp($orderBy, "DateCreated" == 0)) {
			$result = $this->group_model->order_by_date_created();
			print_r($result);
		}
		else {
			echo "Failed comparison";
		}
		
	}

	
	//create a group
	public function createGroup(){
		$result = false;
		$groupName = $this->input->post('groupName');
		$description = $this->input->post('description');
		$group = array($groupName,$description);

		if (!$this->group_model->is_group($groupName)){
			$result = $this->group_model->create_group($group);
		}
		

		if ($result) {
			//popup dialog to say group created
			echo "success";
		}
		else {
			echo "fail";
		}

	
		//$this->load->model('Group_model');
		//$result = $this->Group_model->create_group($group);

	}

	//join a group
	public function join($group){
		//$skill = base64_encode($group);
		$query = "INSERT INTO belong_to (user,skill) VALUES  ('"
			. $this->session->userdata('email'). "',"
			. $this->db->escape($group) . ")";

		if ($this->db->query($query)) {
			redirect("explore/index", 'refresh');
		}

	}


}
?>