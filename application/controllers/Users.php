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
		$data = [];

		$data['users'] = $this->users_model->show_all();
		$this->loadViews("users", $this->global, $data, NULL);
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
		}
		
		redirect('users');
	}


	public function show_all()
    {
        $data = [];

		$data['data'] = $this->users_model->show_all();

		echo json_encode($data);
    }

	
	public function update()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$status = $this->input->post('status');

		if ($password != NULL)
        {
            $password = password_hash($password, PASSWORD_DEFAULT);
        }
		if (!isset($status))
		{
			$status = 0;
		}

		// CHECK IF DEPARTMENT EXIST
		$exist = $this->users_model->check_if_exist($id);

		if (!empty($exist))
		{
			$updated = $this->users_model->update($id, $name, $email, $password, $status);

			if ($updated > 0)
			{
				$this->session->set_flashdata('success', 'User updated correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'User not updated correctly!');
			}
		}

		redirect('users');
	}


	public function destroy()
	{
		$id = $this->input->post('id');

		// CHECK IF DEPARTMENT EXIST
		$exist = $this->users_model->check_if_exist($id);

		if (!empty($exist))
		{
			$deleted = $this->users_model->destroy($id);

			if ($deleted)
			{
				$this->session->set_flashdata('success', 'User deleted correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'User not deleted correctly!');
			}
		}
	}


	public function profile()
	{
		$data = [];

		$this->global['nav_links'] = array('My Profile','Update Profile', 'Directions', 'Pay Methods', 'Order History');

		$id = $this->session->userdata('id');

		$data['user'] = $this->users_model->show($id);

		$this->loadViews("profile", $this->global, $data, NULL);
	}
}
