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
        $group = base64_decode($group); 

        //Get Skill data
        $sql = "SELECT * FROM skill
                WHERE Name = ?";
        $query = $this->db->query($sql, array($group));
        $data['skill'] = $query->result();

        //Get Skill member count
        $sql = "SELECT COUNT(*) AS Count
                FROM belong_to b
                WHERE  b.skill = ?";
        $query = $this->db->query($sql, array($group));
        $data['members'] = $query->result();

        //Get Skill member names
        $sql = "SELECT b.user, u.Name
                FROM belong_to b, users u
                WHERE b.skill = ? AND b.user = u.Email";
        $query = $this->db->query($sql, array($group));
        $data['members_in_group'] = $query->result();

        return $data;
    }

    function retrieve_all_groups($user){
        $sql = "SELECT s.Name, s.Created_on, s.Description
                FROM skill s, belong_to b
                WHERE b.user = '" . $user . "' AND b.skill = s.Name
                ORDER BY s.Name";
        $query = $this->db->query($sql);
        $data['all_groups'] = $query->result();

        return $data;
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
    function explore_order_by_name() {

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
    function explore_order_by_popularity() {

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
    function explore_order_by_date_created() {

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

    // join a group
    function join_group($group) {

        $query = "INSERT INTO belong_to (user,skill) VALUES  ('"
            . $this->session->userdata('email'). "',"
            . $this->db->escape($group) . ")";

        if ($this->db->query($query)) {
            return true;
        }
        else {
            return false;
        }

    }




    /******************************************************************************************************
    *   For my_group page
    *******************************************************************************************************/

    // my_group order by name
    function my_group_order_by_name() {

        $query = "SELECT b.skill, COUNT(*), s.created_on, s.description 
            FROM belong_to b, skill s 
            WHERE s.name = b.skill 
            GROUP BY b.skill, s.description, s.created_on 
            HAVING b.user = '" . $this->session->userdata('email') .
            "' ORDER BY b.skill ASC";


        $result  = $this->db->query($query);

        return $result;

    }

     // my_group order by popularity
    function my_group_order_by_popularity() {

        $query = "SELECT b.skill, COUNT(*), s.created_on, s.description 
            FROM belong_to b, skill s 
            WHERE s.name = b.skill 
            GROUP BY b.skill, s.description, s.created_on 
            HAVING b.user = '" . $this->session->userdata('email') .
            "' ORDER BY COUNT(*) ASC";

        $result  = $this->db->query($query);

        return $result;

    }

    // my_group order by popularity
    function my_group_order_by_date_created() {

        $query = "SELECT b.skill, COUNT(*), s.created_on, s.description 
            FROM belong_to b, skill s 
            WHERE s.name = b.skill 
            GROUP BY b.skill, s.description, s.created_on 
            HAVING b.user = '" . $this->session->userdata('email') .
            "' ORDER BY s.created_on DESC";

        $result  = $this->db->query($query);

        return $result;

    }

    // leave a group
    function leave_group($group) {

        $query = "DELETE FROM belong_to 
            WHERE user = '" . $this->session->userdata('email') .
            "' AND skill = " . $this->db->escape($group);

        if ($this->db->query($query)) {
            return true;
        }
        else {
            return false;   
        }

    }
}
?>