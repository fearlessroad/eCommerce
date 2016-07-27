<?php
defined('BASEPATH') OR exit('No direct script access allowed');


	public function index()
	{
		$this->load->view('dashBoardProductView');
	}


	public function registerUser()
	{
		$post = $this->input->post();

		$config = array(
				array(
					'field'=>'nameRegister',
					'label'=>'Name',
					'rules'=>'trim|required',
					'errors'=>array(
							'required'=>'You have not provided %s.'
						)
				),
				array(
					'field'=>'aliasRegister',
					'label'=>'Alias',
					'rules'=>'trim|required'
				),
				array(
					'field'=>'emailRegister',
					'label'=>'Email',
					'rules'=>'trim|required|valid_email|is_unique[users.email]'
				),
				array(
					'field'=>'passwordRegister',
					'label'=>'Password',
					'rules'=>'trim|required',
					'errors'=>array(
						'required'=>'You must provide a %s',
					)
				),
				array(
					'field'=>'passwordConfirm',
					'label'=>'Password Confirmation',
					'rules'=>'trim|required|matches[passwordRegister]'
				)
				// array(
				// 	'field'=>'date',
				// 	'label'=>'Date of Birth',
				// 	'rules'=>
				// 		'trim|required|regex_match[(0[1-9]|1[0-9]|2[0-9]|3(0|1))-(0[1-9]|1[0-2])-\d{4}]'
				// )
			);
		// $this->form_validation->set_rules('date', 'Date of Birth', 'callback_valid_date');
		$this->form_validation->set_rules($config);

		if ($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('errors', validation_errors());
			redirect('/');
			// $this->load->view('mainView');
		}
		else
		{
			$post = $this->input->post();
			$data = array(
					'name'=> $post['nameRegister'],
					'alias'=> $post['aliasRegister'],
					'email'=> $post['emailRegister'],
					'password'=> $post['passwordRegister'],
					'dob'=>$post['date']
					);
			$this->User->registerUser($data);
			redirect('/Users/welcomeTheUser'); 
		}
	}
	public function logUserIn()
	{

		$email = $this->input->post('emailLogIn');
		$password = $this->input->post('passwordLogIn');
		$logInData = array($email, $password);
		$results=$this->User->logInUser($logInData)->row_array();

		if(empty($results))
		{
			redirect('/');
		}
		else 
		{
			$this->session->set_userdata(array('user'=>$results));
			redirect('/Users/welcomeTheUser');
		}

	}
	public function welcomeTheUser()
	{
		$user=$this->session->userdata('user');
		if (isset($user)){

		$data1=$this->User->getUsersWhoPokedMe($user['id'])->row_array();
				
		$data2=$this->User->getUserAndTimesTheyPokedMe($user['id']);

		$data3=$this->User->usersToPokeNotMe($user['id']);
		
		// how do I get friend Id as second parameter?
		// $data4=$this->User->poke($user['id'], );

		$newData=array(
			'user'=>$user,
			'pokedMe'=>$data1,
			'log'=>$data2,
			'history'=>$data3
			);

		$this->load->view('welcomeView', $newData);
		}
	}

	public function logOut()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function poke(){
		$data = $this->input->post();
		$data1 = $this->session->userdata('user')['id'];

		$this->User->poke($data['pokeThisPerson'], $data1);
		redirect('/Users/welcomeTheUser');
		// var_dump($data['pokeThisPerson']); die();

	}
}


