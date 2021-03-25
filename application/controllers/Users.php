<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Users extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		
		$this->load->model('users_model');
	}


	public function index()
	{

	}


	public function create()
	{
		$this->load->view('register');
	}


	public function store()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run())
		{
			$hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data = array(
				'name'		=>	$this->input->post('name'),
				'email'		=>	$this->input->post('email'),
				'password'	=>	$hashed_password,
				'status'	=>	1,
				'fk_role_id'=>	3
			);

			$id = $this->users_model->store($data);

			if ($id > 0)
			{
				$this->session->set_flashdata('success', 'User added correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'User not added correctly!');
			}

			redirect('register');
		}
		else {
			$this->index();
		}
	}


	public function show($id)
	{
		$data = [];

		$data['user'] = $this->users_model->show($id);

		$this->loadViews("user", $this->global, $data, NULL);
	}


	public function edit()
	{

	}

	
	public function update()
	{

	}


	public function destroy()
	{

	}


	public function profile()
	{
		$data = [];

		$this->global['nav_links'] = array('My Profile','Update Profile', 'Directions', 'Pay Methods', 'Order History');

		$id = $this->session->userdata('id');

		$data['user'] = $this->users_model->show($id);

		$this->loadViews("profile", $this->global, $data, NULL);
	}


	public function login()
	{
		$this->load->view('login');
	}


	public function validate()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if($this->form_validation->run())
		{
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$result = $this->users_model->validate($email, $password);

			if (empty($result))
			{
				redirect('');
			}
			else
			{
				$this->session->set_flashdata('error', $result);
				$this->login();
			}
		}
		else {
			$this->login();
		}
	}


	function logout()
    {
		$this->session->sess_destroy();
		
		redirect ('');
	}
}
