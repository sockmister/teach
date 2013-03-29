<?php
class Group_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_group($group){
       
        $query = "INSERT INTO skill (Name, Description, Created_on) VALUES (" 
            . $this->db->escape($group[0]) ."," 
            . $this->db->escape($group[1]) .
            ", '201303291538')"; 
        

        if ($this->db->query($query)) {
            echo "Group creation successful.";
        }
        else {
            echo "Group creation failed.";
        }
    }

    function retrieve_group($group){

    }

    function update_group($group){

    }

    function delete_group($group){
    	
    }
}
?>