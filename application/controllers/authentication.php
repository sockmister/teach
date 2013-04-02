<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Authentication extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('user_model','',TRUE);
	}

	public function is_user_logged_in_else_redirect() {
		if (!$this->is_user_logged_in()) {
			redirect('welcome/index');
		}
	}

	public function is_user_logged_in() {
		if ($this->session->userdata('logged_in'))
		{ 
		    return true;
		}
		return false;
	}

	public function get_logged_in_username() {
		if ($this->is_user_logged_in())
		{ 
		    return $this->session->userdata('email');
		}
		return NULL;
	}
}
?>