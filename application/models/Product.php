<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function addProduct($data){
		$query = "INSERT INTO products (name, description, price, quantity, category_id, img, updated_at, created_at)
		VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($query, $data);
	}
}
	



























































































































































































/*	public function registerUser($data)
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
>>>>>>> dfa05143f567a59da7b117fc36b26b85c3f08e0a
	}
	public function getCategoryID($category){
		$query = "SELECT id from categories WHERE name=?";
		return $this->db->query($query, array($category))->row_array();
	}
<<<<<<< HEAD
	public function getAllProducts(){
		$query = "SELECT * FROM products";
		return $this->db->query($query)->result_array();
	}
	public function getAllCategories(){
		$query = "SELECT name from categories";
		return $this->db->query($query)->result_array();
	}
	public function ifExists($name){
		$query = "SELECT * FROM categories WHERE name = ?";
		return $this->db->query($query, array($name))->row_array();
	}
	public function addCategory($name){
		$query = "INSERT INTO categories (name, created_at, updated_at) VALUES (?, NOW(), NOW())";
		return $this->db->query($query, array($name));
	}
}
=======
	public function getUserData($id)
	{
		$query ="SELECT * FROM users
			WHERE id = ?";
		return $this->db->query($query, $id);
	}											*/


	
>>>>>>> dfa05143f567a59da7b117fc36b26b85c3f08e0a
