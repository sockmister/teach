<?php
class Test extends CI_Controller {

	public function index()
	{
		$this->load->view('test.html');
	}

	public function count()
	{
		$query = $this->db->query('SELECT COUNT(*) FROM user');
		echo 'query SELECT COUNT(*) FROM user';
		print_r($query->result());
	}
}
?>