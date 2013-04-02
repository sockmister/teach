<?php
class Comment_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function create_comment($user, $friend, $comment){
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        $sql = "INSERT INTO comment
                VALUES(?, ?, ?, ?)";
        $this->db->query($sql, Array($friend, $user, $comment, $timestamp));
    }

    function retrieve_comment($person, $friend){
    }

    function update_comment($friend){

    }

    function delete_comment($person, $friend){
    	
    }
}
?>