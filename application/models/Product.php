<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function registerUser($data)
	{
		$query = "INSERT INTO users 
					(name, 
					alias, 
					email, 
					password,
					dob, 
					updated_at, 
					created_at)
						VALUES 
						(?, 
						?, 
						?, 
						?, 
						?,
						NOW(), 
						NOW())";
		$this->db->query($query, array(
					$data['name'],
					$data['alias'],
					$data['email'],
					$data['password'],
					$data['dob']
			));
	}
	public function logInUser($logInData)
	{
		$query = "SELECT * FROM users WHERE email = ? AND password = ?";
		return $this->db->query($query, $logInData);
	}
	public function getUserData($id)
	{
		$query ="SELECT * FROM users
			WHERE id = ?";
		return $this->db->query($query, $id);
	}
	