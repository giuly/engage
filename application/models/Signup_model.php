<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_model extends CI_Model {

	function __construct() {
        // Call the Model constructor
        parent::__construct();		
	}

    public function check_email($email) {
    	//return number of users with same email address
    	return $this->db->where('email', $email)->from("users")->count_all_results();
    }

    public function add_user($data) {
    	if(is_array($data)) {
    		return $this->db->insert('users', $data);
    	}
        return false;
    }

}