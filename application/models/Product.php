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
		$query = "SELECT products.img, products.id, categories.name as category from products
			JOIN categories on products.category_id = categories.id 
			WHERE categories.id = ?
			order by RAND()
			LIMIT 4";
		return $this->db->query($query, array($id))->result_array();
	}

	public function getProductsByCategory($name){
		$query = "SELECT products.img, products.name, products.id, categories.name as category from products
			JOIN categories on products.category_id = categories.id 
			WHERE categories.name = ?
			order by RAND()";
		return $this->db->query($query, array($name))->result_array();
	}
	public function getDashboardOrders(){
		$query = "SELECT order_details.order_id 'Order ID', users.first_name Name, DATE(order_details.created_at) Date, 
					CONCAT_WS(' ',addresses.address1,addresses.address2, addresses.city, addresses.state, addresses.zip) 'Billing Address', 
					orders.status Status, TRUNCATE(SUM(products.price),2) Total 
					FROM users
					JOIN addresses ON addresses.user_id = users.id
					JOIN billing_addresses ON addresses.id = billing_addresses.address_id
					JOIN orders ON orders.user_id =  users.id
					JOIN order_details ON order_details.order_id = orders.id
					JOIN products ON products.id = order_details.product_id";
		return $this->db->query($query)->result_array();
	}
}