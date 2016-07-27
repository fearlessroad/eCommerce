<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Model{
	public function getAll($email, $password){
		$logindata = array($email, $password);
		$query = "SELECT * from admins where email=? AND password = ?";
		return $this->db->query($query, $logindata)->row_array();
	}
}