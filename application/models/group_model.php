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
            . $this->db->escape($group[1]) .","
            . $this->session->userdata('last_activity') .
            ")"; 
        

        if ($this->db->query($query)) {
            return true;
        }
        else {
            return false;           
        }
    }

    function retrieve_group($group){

    }

    function update_group($group){

    }

    function delete_group($group){
    	$query = "DELETE FROM skill WHERE Name = " 
            .$this->db->escape($group);

        $this->db->query($query);    

    }

    // check if a group exist
    function is_group($groupName) {
        $query = "SELECT Name FROM skill WHERE Name = " .
            $this->db->escape($groupName);

        $result = $this->db->query($query);

        if ($result->num_rows == 1) {
            return true;
        }
        else {
            return false;
        }

    }

    // explore order by name
    function order_by_name() {

        $query = "SELECT b1.skill , COUNT(*), s.created_on, s.description 
            FROM belong_to b1, skill s 
            WHERE s.name = b1.skill AND NOT EXISTS(
                SELECT b2.skill FROM belong_to b2 
                WHERE b2.user = '" . $this->session->userdata('email') . "' AND b2.skill = b1.skill) 
                GROUP BY b1.skill, s.created_on, s.description 
                ORDER BY b1.skill ASC ";

        $result  = $this->db->query($query);

        return $result;

    }

    // explore order by popularity
    function order_by_popularity() {

        $query = "SELECT b1.skill , COUNT(*), s.created_on, s.description 
        FROM belong_to b1, skill s 
        WHERE s.name = b1.skill AND NOT EXISTS(
            SELECT b2.skill FROM belong_to b2 
            WHERE b2.user = '" . $this->session->userdata('email') . "' AND b2.skill = b1.skill) 
            GROUP BY b1.skill, s.created_on, s.description 
            ORDER BY COUNT(*) DESC ";

        $result  = $this->db->query($query);

        return $result;

    }

    // explore order by popularity
    function order_by_date_created() {

        $query = "SELECT b1.skill , COUNT(*), s.created_on, s.description 
        FROM belong_to b1, skill s 
        WHERE s.name = b1.skill AND NOT EXISTS(
            SELECT b2.skill FROM belong_to b2 
            WHERE b2.user = '" . $this->session->userdata('email') . "' AND b2.skill = b1.skill) 
            GROUP BY b1.skill, s.created_on, s.description 
            ORDER BY s.created_on ASC ";

        $result  = $this->db->query($query);

        return $result;

    }
}
?>