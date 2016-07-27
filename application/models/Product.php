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
	public function getUsersWhoPokedMe($id){
		$query="SELECT COUNT(pokes.friend_id) AS 'whoPokedMe' 
				FROM pokes
				WHERE friend_id = ?";
		return $this->db->query($query, $id);
		// send back people who poked not number of times poked total
	}
	public function getUserAndTimesTheyPokedMe($id){
		$query="SELECT users.name, COUNT(pokes.friend_id) AS timesPokedBy FROM users
				JOIN pokes ON users.id = pokes.user_id
				WHERE pokes.friend_id = ?
				GROUP BY name";
			return $this->db->query($query, $id)->result_array();
	}
	public function usersToPokeNotMe($id){
		$query="SELECT users.id id, users.name name, users.alias alias, users.email email, COUNT(pokes.user_id) pokeHistory FROM users
				LEFT JOIN pokes ON pokes.user_id = users.id
				WHERE users.id !=?
				GROUP BY name";
			return $this->db->query($query, $id)->result_array();
	}
	public function pokeHistory($id){
		$query="SELECT count(pokes.user_id) AS count FROM pokes
			WHERE pokes.user_id = ?";
			return $this->db->query($query, $id)->result_array();
	}
	public function poke($myId, $friendId){
		// echo "My ID";
		// var_dump($myId);
		// echo "Friend ID";
		// var_dump($friendId);
		// die();
		$query = "INSERT INTO pokes (pokes.user_id, pokes.friend_id, pokes.updated_at, pokes.created_at)
					VALUES (?, ?, NOW(), NOW())";

			return $this->db->query($query, 
				array($myId, $friendId));
	}
}

