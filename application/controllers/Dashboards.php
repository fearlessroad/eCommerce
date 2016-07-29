<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboards extends CI_Controller {
	
	public function index()
	{	
		$this->load->view("adminLogin");
	}
	public function showOrders(){
		if($this->session->userdata('loggedin')!=true){
			redirect('dashboards/index');
		}
		else{
			$this->load->model('product');
			$products = $this->product->getDashboardOrders();
			$data = array(
					'products'=>$products
					);	
			$this->load->view("mainDashboard", $data);
		}
	}
	public function showProducts(){
		$this->load->model('product');
		if($this->session->userdata('loggedin')!=true){
			redirect('dashboards/index');
		}
		else{
			$categories = $this->product->getAllCategories();
			$products = $this->product->getAllProducts();
			$data = array('products'=>$products,
							'categories'=>$categories);
			$this->load->view("productOrders", $data);
		}
	}
	public function login(){
		$this->load->model('admin');
		$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
		$result = $this->admin->getall($email, $password);
		if($result == null){
			redirect('dashboards/index');
		}
		else{
			$this->session->set_userdata('id', $result['id']);
			$this->session->set_userdata('loggedin',true);
			// var_dump($result['id']);die('happy');
			redirect('dashboards/showOrders');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('dashboards/index');
	}

	public function indivOrder(){
		$this->load->view("individualOrder");
	}
}