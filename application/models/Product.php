<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function addProduct($data){
		$query = "INSERT INTO products (name, description, price, quantity, category_id, img, updated_at, created_at)
		VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($query, $data);
	}

	public function getAllCategories(){
		$query = "SELECT * FROM categories";
		return $this->db->query($query)->results_array();
	}

	public function getAllProducts(){
		$query = "SELECT * FROM products";
		return $this->db->query($query)->results_array();
	}

}

