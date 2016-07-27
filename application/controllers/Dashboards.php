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
			$this->load->view("dashboardOrders");
		}
	}
	public function showProducts(){
		if($this->session->userdata('loggedin')!=true){
			redirect('dashboards/index');
		}
		else{
			$this->load->view("dashboardProductView");
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
}