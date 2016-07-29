<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function addProduct($data){
		$query = "INSERT INTO products (name, description, price, quantity, category_id, img, updated_at, created_at)
		VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
		$this->db->query($query, $data);
	}	
	public function getCategoryID($category){
		$query = "SELECT id from categories WHERE name=?";
		return $this->db->query($query, array($category))->row_array();
	}
	public function getAllProducts(){
		$query = "SELECT products.id, products.img, products.name, products.quantity, categories.name as category, categories.id as categoryID 
				  from products
				  join categories on categories.id = products.category_id";
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
	public function getByID($id){
		$query = "SELECT products.img, products.name, products.description, products.id, categories.name as category, categories.id as categoryID from products
			join categories on categories.id = products.category_id 
			WHERE products.id=?";
		return $this->db->query($query, array($id))->row_array();
	}
	public function getSimilarItems($id){
		$query = "SELECT products.img, products.id from products 
			JOIN categories on products.category_id = categories.id 
			WHERE categories.id = ?
			order by RAND()
			LIMIT 4";
		return $this->db->query($query, array($id))->result_array();
	}
}