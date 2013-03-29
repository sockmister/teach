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

    function retrieve_user($user){

    }

    function update_user($user){

    }

    function delete_user($user){
    	
    }

    function login($username, $password)
    {
        $query = "SELECT Password FROM users WHERE Email = " . 
            $this->db->escape($username)
            ;
        $result = $this->db->query($query);

        
        if ($result->num_rows() != 1) { 
            // If user is not found
            return false;
        }
        else {
            // Begin verification
            #foreach ($result->result() as $row) {
            #    echo $row->Password;
            #}
            #echo $result->first_row()->Password;
            return password_verify($password, $result->first_row()->Password);
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