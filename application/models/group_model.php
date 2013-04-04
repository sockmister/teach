<?php
class Group_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_group($group){
       
        $sql = "INSERT INTO skill (Name, Description, Created_on) VALUES (" 
            . $this->db->escape($group[0]) ."," 
            . $this->db->escape($group[1]) .","
            . $this->session->userdata('last_activity') .
            ")"; 
        
        $query = $this->db->query($sql);


        if ($this->db->affected_rows() > 0) {
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


    // explore order by name
    function explore_order_by_name($user) {

        $sql = "SELECT b1.skill AS skill, COUNT(*) AS count, s.created_on AS create_on, s.description AS description
                FROM belong_to b1, skill s 
                WHERE s.name = b1.skill AND NOT EXISTS(
                SELECT b2.skill FROM belong_to b2 
                WHERE b2.user = '" . $user . "' AND b2.skill = b1.skill) 
                GROUP BY b1.skill, s.created_on, s.description 
                ORDER BY b1.skill ASC ";

        $query  = $this->db->query($sql);

        return $query->result();

    }

    // explore order by popularity
    function explore_order_by_popularity($user) {

        $sql = "SELECT b1.skill AS skill, COUNT(*) AS count, s.created_on AS create_on, s.description AS description
            FROM belong_to b1, skill s 
            WHERE s.name = b1.skill AND NOT EXISTS(
            SELECT b2.skill FROM belong_to b2 
            WHERE b2.user = '" . $user . "' AND b2.skill = b1.skill) 
            GROUP BY b1.skill, s.created_on, s.description 
            ORDER BY COUNT(*) DESC ";

        $query  = $this->db->query($sql);

        return $query->result();

    }

    // explore order by date
    function explore_order_by_date_created($user) {

        $sql = "SELECT b1.skill AS skill, COUNT(*) AS count, s.created_on AS create_on, s.description AS description
            FROM belong_to b1, skill s 
            WHERE s.name = b1.skill AND NOT EXISTS(
            SELECT b2.skill FROM belong_to b2 
            WHERE b2.user = '" . $user . "' AND b2.skill = b1.skill) 
            GROUP BY b1.skill 
            ORDER BY s.created_on ASC ";

        $query  = $this->db->query($sql);

        return $query->result();

    }

    // join a group
    function join_group($group,$user) {

        $sql = "INSERT INTO belong_to (user,skill) VALUES  ('"
            . $user . "',"
            . $this->db->escape($group) . ")";

        if ($this->db->query($sql)) {
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
    function my_group_order_by_name($user) {

        $sql = "SELECT b1.skill AS skill, COUNT(*) AS count, s.created_on AS create_on, s.description AS description
        FROM belong_to b1, skill s 
        WHERE s.name = b1.skill AND 
        EXISTS(SELECT b2.skill FROM belong_to b2 WHERE b2.user = '" . $user ."' AND b2.skill = b1.skill) 
        GROUP BY b1.skill ORDER BY b1.skill ASC ";


        $query  = $this->db->query($sql);

        return $query->result();

    }

     // my_group order by popularity
    function my_group_order_by_popularity($user) {

        $sql = "SELECT b1.skill AS skill, COUNT(*) AS count, s.created_on AS create_on, s.description AS description
        FROM belong_to b1, skill s 
        WHERE s.name = b1.skill AND 
        EXISTS(SELECT b2.skill FROM belong_to b2 WHERE b2.user = '" . $user ."' AND b2.skill = b1.skill) 
        GROUP BY b1.skill ORDER BY COUNT(*) ASC ";

        $query  = $this->db->query($sql);

        return $query->result();

    }

    // my_group order by date
    function my_group_order_by_date_created($user) {

        $sql = "SELECT b1.skill AS skill, COUNT(*) AS count, s.created_on AS create_on, s.description AS description
        FROM belong_to b1, skill s 
        WHERE s.name = b1.skill AND 
        EXISTS(SELECT b2.skill FROM belong_to b2 WHERE b2.user = '" . $user ."' AND b2.skill = b1.skill) 
        GROUP BY b1.skill ORDER BY s.created_on ASC ";

        $query  = $this->db->query($sql);

        return $query->result();

    }

    // leave a group
    function leave_group($group,$user) {

        $query = "DELETE FROM belong_to 
            WHERE user = '" . $user .
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