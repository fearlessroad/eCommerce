<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller{
	
	public function index(){
		$this->load->model('product');
		$products = $this->product->getAllProducts();
		$data = array('products'=>$products);
		$this->load->view('productListing',$data);
	}
	
	public function addCart($id){								//Tom added & needs; please don't delete
		$quantity = $this->session->userdata($id);
		$quantity = $this->input->post('qty');
		$this->session->set_userdata($id, $quantity);

		redirect('/products/shoppingcart');
	}
	public function shoppingcart($id){
		$this->load->view('shoppingcart');
	}

	public function addProduct(){								//this adds products to the database from edit product
		$this->load->model('product');
		if($this->input->post('categoryWrite')==null){
			$category = $this->input->post('categoryDrop');
		}
		else{
			$category = $this->input->post('categoryWrite');
		}
		// check if category exists
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

	public function getAll(){
		$this->load->model('product');
		$products = $this->product->getAll();
	}

	// click image to see product_view
	public function productView($id){
		$this->load->model('product');
		$products = $this->product->getByID($id);
		$similars = $this->product->getSimilarItems($products['categoryID']);
		$data = array('products'=>$products,
					   'similars'=>$similars);
		$this->load->view('productDescription',$data);
	}

	public function getProductsByCategory($name){
		$this->load->model('product');
		$jquery = $this->product->getProductsByCategory($name);
		$whatever = array('jquery'=>$jquery);
		$this->load->view('partials/jquery', $whatever);
	}

}