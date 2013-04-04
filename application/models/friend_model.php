<?php
class Friend_model extends CI_Model {
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->helper('url');
    }

    //precondition: $person is requesting to be a friend of $friend
    function create_friend($person, $friend){
        $request_from = $person;
        //check alphabetical first
        if(strcmp($person, $friend) > 0){
            $temp = $person;
            $person = $friend;
            $friend = $temp;
        }

        $sql = "INSERT INTO friend
                VALUES (?, ?, ?)";

        $query = $this->db->query($sql, array($person, $friend, $request_from));
    }

    function retrieve_friend($person, $friend){
        $to_view = $friend;

        $sql = "SELECT f.status
                FROM friend f
                WHERE (Email_first = ? AND Email_second = ?) OR (Email_first = ? AND Email_second = ?)";

        if($person != $friend){
            $query = $this->db->query($sql, array($person, $friend, $friend, $person));
            $request_from = $query->result();
            if($request_from){
                $request_from = $request_from[0]->Status;
            }
            else{
                $request_from = -1;
            }
        }

        if($person == $friend || $request_from == "accepted"){
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
                    WHERE (f.Email_first = u.Email AND f.Email_second = ? AND f.status = 'accepted') 
                        OR (f.Email_second = u.Email AND f.Email_first = ? AND f.status = 'accepted')";
            $query = $this->db->query($sql, array($to_view, $to_view));
            $data['friends'] = $query->result();

            $sql = "SELECT c.Comment, c.Comment_by, c.Created_on, u.Name
                    FROM comment c, users u
                    WHERE c.Comment_for = ? AND u.Email = c.Comment_by
                    ";
            $query = $this->db->query($sql, array($to_view));
            $data['comments'] = $query->result();

            if($person == $friend){
                $data['friend_status'] = Array("", "Unfriend");
                return $data;
            }
            if($request_from == "accepted"){
                $site = site_url("friend/unfriend/" . base64_encode($to_view));
                $data['friend_status'] = Array($site, "Unfriend");
                return $data;                
            }
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

            if($request_from == $person){
                $site = site_url("wall/view/" . base64_encode($to_view));
                $data['friend_status'] = array($site, "Request sent");
                return $data;
            }
            if($request_from == $friend){
                $site = site_url("friend/accept_friend/" . base64_encode($to_view));
                $data['friend_status'] = array($site, "Accept request");
                return $data;
            }
            if($request_from == -1){
                $site = site_url("friend/befriend/" . base64_encode($to_view));
                $data['friend_status'] = array($site, "Friend");
                return $data;
            }
        }

        return $data;
    }

    function update_friend($person, $friend){
        $sql = "UPDATE friend
                SET status = 'accepted'
                WHERE (Email_first = ? AND Email_second = ?) OR (Email_first = ? AND Email_second = ?)";

        $query = $this->db->query($sql, array($person, $friend, $friend, $person));
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

    //retrieve friend list and push friend request to top
    function retrieve_friend_list($person){
        $sql = "SELECT u.name as name, u.Email, f.status as status, 
                    CASE f.Status
                    WHEN ? THEN 'friend/withdraw_request'
                    WHEN 'accepted' THEN 'friend/unfriend'
                    ELSE 'friend/accept_friend'
                    END as link,

                    CASE f.Status
                    WHEN ? THEN 'Withdraw Request'
                    WHEN 'accepted' THEN 'Unfriend'
                    ELSE 'Accept Request'
                    END as button_name  

                FROM users u, friend f
                WHERE (f.Email_first = ? OR f.Email_second = ?) AND (u.Email <> ? AND (u.Email = f.Email_first OR u.Email = f.Email_second))
                ORDER BY(
                    CASE status
                    WHEN ? THEN 2
                    WHEN 'accepted' THEN 3
                    ELSE 1
                    END
                ) ASC";
                

        $query = $this->db->query($sql, array($person, $person, $person, $person, $person, $person));

        //print_r($query->result());

        return $query->result();
    }
}
?>