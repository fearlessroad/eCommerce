<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller 
{
	public function index()
	{
		$this->load->view('mainview');
	}
	public function show_product()
	{
		$this->load->view('product_view');
		$this->load->helper('url');
	}

}