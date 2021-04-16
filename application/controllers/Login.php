<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Login extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		
		$this->load->model('users_model');
	}


	public function index()
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
				redirect('login');
			}
		}
		else {
			redirect('login');
		}
	}


	function logout()
    {
		$this->session->sess_destroy();
		
		redirect ('');
	}
}
