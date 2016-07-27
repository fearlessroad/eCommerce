<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
	public function get_all(){
		$query = "SELECT * FROM users";
		$results = $this->db->query($query)->result_array();
		return $results;
	}
	public function add_user($inputData){
		$age = $inputData['age'];
		$name = $inputData['name'];
		$query = "INSERT INTO users (age, 
									name) VALUES (?,?)";
		$this->db->query($query, array(
									$age,
									$name));
	}
}