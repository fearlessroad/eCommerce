<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	public function index(){
		$this->load->view('productListing');
	}
	public function addProduct(){
		$this->load->model('product');

		if($this->input->post('categoryWrite')==null){
			$category = $this->input->post('categoryDrop');
		}
		else{
			$category = $this->input->post('categoryWrite');
		}
		// check if author exists
		$check = $this->product->IfExists($category);


		// don't add if category already exists
		if($check==null){
			$this->product->addCategory($category);
		}

		// add product now
		$name=$this->input->post('productName');
		$description = $this->input->post('description');
		$price = $this->input->post('price');
		$quantity=$this->input->post('quantity');
		$image=$this->input->post('image');
		// get category ID to push into $data
		$categoryID = $this->product->getCategoryID($category);
		// push data into database
		$data = array($name, $description, $price, $quantity, $categoryID, $image);
		$this->product->addProduct($data);
		redirect('dashboards/showproducts');
	}
	// public function getAll(){
	// 	$this->load->model('product');
	// 	$products = $this->product->getAll();
	// }

	// click image to see product_view
	public function productView(){
		$this->load->view('productDescription');
	}

	public function shoppingcart(){
		$this->load->view('shoppingcart');
	}
}