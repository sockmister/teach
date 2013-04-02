<?php
class User_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_user($email, $password, $name) {
        $query = "INSERT INTO users (Email, Password, Name) " . "VALUES (" .
            $this->db->escape($email) .
            "," .
            $this->db->escape($password) .
            "," .
            $this->db->escape($name) .
            ")";
        
        if ($this->db->query($query)) {
            // User creation successful
            return true;
        }
        else {
            // User creation failed
            return false;
        }
    }

    function retrieve_user($username) {
        
    }

    function retrieve_user_details($username) {
        $query = "SELECT Email,Name,Birthday,Gender,Contact_number,Photo FROM users WHERE Email = " . 
            $this->db->escape($username)
            ;
        $result = $this->db->query($query);
        if ($result->num_rows() == 1) {
            $userdata = array(
                'email' => $result->first_row()->Email,
                'name' => $result->first_row()->Name,
                'birthday' => $result->first_row()->Birthday,
                'gender' => $result->first_row()->Gender,
                'contact_number' => $result->first_row()->Contact_number,
                'photo' => $result->first_row()->Photo
                );
            return $userdata;
        }
        else {
            return NULL;
        }
    }

    function is_user($username) {
        $query = "SELECT Email FROM users WHERE Email = " . 
            $this->db->escape($username)
            ;
        $result = $this->db->query($query);
        
        if ($result->num_rows() == 1) {
            return true;
        }
        else {
            return false;
        }
    }

    function update_user($user){

    }

    function delete_user($user){
    	
    }

    function login($username, $password)
    {
        $query = "SELECT Email, Password, Name FROM users WHERE Email = " . 
            $this->db->escape($username)
            ;
        $result = $this->db->query($query);

        
        if ($result->num_rows() != 1) { 
            // If user is not found
            return false;
        }
        else {
            #foreach ($result->result() as $row) {
            #    echo $row->Password;
            #}
            #echo $result->first_row()->Password;

            // Begin verification. If login is successful, set up session data.
            if (password_verify($password, $result->first_row()->Password)) {
                $session_data = array(
                    'email' => $result->first_row()->Email,
                    'name' => $result->first_row()->Name,
                    'logged_in' => true
                    );
                $this->session->set_userdata($session_data);
                return true;
            }
            else {
                return false;
            }
        }
        #password_verify($password, $result);

        #$this->db->select('username');
        #$this->db->from('users');
        #$this->db->where('username', $username);
        #$this->db->where('password', MD5($password));
        #$this->db->limit(1);
        #$query = $this->db->get();
        #if($query->num_rows() == 1)
        #{
        # return $query->result();
        #}
        #else
        #{
        # return false;
        #}
    }
}
?>