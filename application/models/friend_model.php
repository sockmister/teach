<?php
class Friend_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url');
    }

    function create_friend($person, $friend){
        //check alphabetical first
        if(strcmp($person, $friend) > 0){
            $temp = $person;
            $person = $friend;
            $friend = $temp;
        }

        $sql = "INSERT INTO friend
                VALUES (?, ?)";

        $query = $this->db->query($sql, array($person, $friend));
    }

    function retrieve_friend($person, $friend){
        $to_view = $friend;

        if(strcmp($person, $friend) > 0){
            $temp = $person;
            $person = $friend;
            $friend = $temp;
        }

        $sql = "SELECT * 
                FROM friend
                WHERE Email_first = ? AND Email_second = ?";

        if($person != $friend)
            $query = $this->db->query($sql, array($person, $friend));

        if($person == $friend || $query->result()){
            //users: name,email,dob,gender,handphone, picture
            //belongs_to: groups_joined
            //friend: friends of
            //comments: commentby,time
            $sql = "SELECT u.Name, u.Email, u.Birthday, u.Gender, u.Contact_number, u.Photo
                    FROM users u
                    WHERE u.Email = ?
                    ";
            $query = $this->db->query($sql, array($to_view));
            $data['user'] = $query->result();

            $sql = "SELECT bt.skill
                    FROM belong_to bt
                    WHERE bt.user = ?";
            $query = $this->db->query($sql, array($to_view));
            $data['groups'] = $query->result();

            $sql = "SELECT u.Name, u.Email
                    FROM friend f, users u
                    WHERE (f.Email_first = u.Email AND f.Email_second = ?) 
                        OR (f.Email_second = u.Email AND f.Email_first = ?)";
            $query = $this->db->query($sql, array($to_view, $to_view));
            $data['friends'] = $query->result();

            $sql = "SELECT c.Comment, c.Comment_by, c.Created_on, u.Name
                    FROM comment c, users u
                    WHERE c.Comment_for = ? AND u.Email = c.Comment_by
                    ";
            $query = $this->db->query($sql, array($to_view));
            $data['comments'] = $query->result();

            if($person != $friend){
                $site = site_url("friend/unfriend/" . base64_encode($to_view));
                $data['friend_status'] = Array($site, "Unfriend");
            }   
            else{
                $data['friend_status'] = Array("", "Unfriend");
            }

            return $data;
        }
        else{
            //retrieve name,gender,groups
            $sql = "SELECT u.Name, u.Gender
                    FROM users u
                    WHERE u.Email = ?";
            $query = $this->db->query($sql, array($to_view));
            $data['user'] = $query->result();

            $sql = "SELECT bt.skill
                    FROM belong_to bt
                    WHERE bt.user = ?";
            $query = $this->db->query($sql, array($to_view));
            $data['groups'] = $query->result();

            $site = site_url("friend/befriend/" . base64_encode($to_view));
            $data['friend_status'] = Array($site, "Friend");

            return $data;
        }
    }

    function update_friend($friend){

    }

    function delete_friend($person, $friend){
    	if(strcmp($person, $friend) > 0){
            $temp = $person;
            $person = $friend;
            $friend = $temp;
        }

        $sql = "DELETE FROM friend
                WHERE Email_first = ? AND Email_second = ?";

        $query = $this->db->query($sql, array($person, $friend));
    }
}
?>