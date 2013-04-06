<?php
class Skill_comment_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_skill_comment($skill, $user, $comment){
        $skill = base64_decode($skill);
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $sql = "INSERT INTO skill_comment
                VALUES(?, ?, ?, ?)";
        $this->db->query($sql, Array($skill, $user, $comment, $timestamp));
    }

    function retrieve_skill_comments($skill, $user){
        $skill = base64_decode($skill);
        $sql = "SELECT sc.Skill, sc.Comment, sc.Created_on, u.Name
                FROM skill_comment sc, users u
                WHERE sc.Skill = ? AND sc.Comment_by = ? AND u.Email = ?
                ORDER BY sc.Created_on DESC";
        $query = $this->db->query($sql, Array($skill, $user, $user));
        $data['skill_comments'] = $query->result();

        return $data;
    }

    function update_skill_comment($friend){

    }

    function delete_skill_comment($person, $friend){
    	
    }
}
?>