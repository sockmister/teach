<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (PHP_VERSION_ID  < 50500) {
	require_once(BASEPATH.'external_libraries/password_compat/lib/password.php');
}

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct() {
		parent::__construct();
		// Your own constructor code
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('user_model','',TRUE);
		define('ASSEST_URL', base_url().'teach/assets/');		
	}

	public function index()
	{
		$this->load->view('welcome_view.php');
	}

	public function count()
	{
		$query = $this->db->query('SELECT COUNT(*) FROM user');
		print_r($query->result());
	}

	public function register()
	{
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$name = $this->input->post('name');

		$result = $this->user_model->create_user($email, $password, $name);
		if ($result) {
			// User creation successful.
			echo "User creation successful.";
		}
		else {
			// User creation failed.
			echo "User creation failed.";
		}
	}

	public function login()
	{
		$username = $this->input->post('email');
		$password = $this->input->post('password');
		
		$result = $this->user_model->login($username, $password);

		if ($result) {
			echo "Login successful.";
		}
		else {
			echo "Login unsuccessful.";
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */