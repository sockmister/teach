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
		$this->db->query("PRAGMA foreign_keys = ON");
	}

	public function index()
	{
		
		$sql = "SELECT b1.skill AS skill
            FROM belong_to b1, skill s 
            WHERE s.name = b1.skill 
            GROUP BY b1.skill
            ORDER BY COUNT(*) DESC";

        $query = $this->db->query($sql);
        if ($query->num_rows() > 0 ) {
        	$result = $query->row(3);
        }    

		$data['groups'] = $result;
		$this->load->view('welcome_view',$data);
	}

	public function count()
	{
		$query = $this->db->query('SELECT COUNT(*) FROM user');
		print_r($query->result());
	}

	public function register()
	{
		// If user already exists in the database, do not allow registration.
		$result = false;
		$email = $this->input->post('email');
		$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$name = $this->input->post('name');
		
		if (!$this->user_model->is_user($email)) {
			$result = $this->user_model->create_user($email, $password, $name);
		}

		if ($result) {
			// Try to login for the user so that session data is properly set.
			$result2 = $this->login($email, $this->input->post('password'));
			echo "success";
		}
		else {
			// User creation failed.
			echo "fail";
		}
	}
  
	public function login_post() {
		$username = $this->input->post('login_email');
		$password = $this->input->post('login_password');
		
		$result = $this->login($username, $password);
		if ($result) {
			echo "success";
		}
		else {
			echo "fail";
		}
	}

	public function login($username, $password)
	{
		$result = $this->user_model->login($username, $password);

		if ($result) {
			return true;
		}
		else {
			// Login failed.
			return false;
		}
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */