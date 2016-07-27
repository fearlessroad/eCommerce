<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bios extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('user');
	}
	public function index (){
		// Assign controller variable to return value of
		// the model's get_all method
		$dataFromModel = $this->user->get_all();
		// results_array will return a multidimensional iterative
		// array that will contain associative arrays as such:
		// $dataFromModel=[
		// 	["name"=>"kelvin", "age"=>30],
		// 	["name"=>"kelvin", "age"=>30],
		// 	["name"=>"kelvin", "age"=>30],
		// 	["name"=>"kelvin", "age"=>30]
		// ];

		// Create a new associative array to contain labels
		// to use on our view
		$data = array();

		// Assign the data from our model with a name
		// to the new associative array that we will load into our view
		$data['myUsers'] = $dataFromModel;
		// Load the view using the aforementioned associative array
		$this->load->view('bios', $data);
	}
	public function add_user($name, $age){
		$this->load->model('user');
		$data = ["name"=>$name, "age"=>$age];
		$this->user->add_user($data);
		$this->load->view('chris/bio', array(
							'name'=>$name,
							'age'=>$age
							));
	}
}

