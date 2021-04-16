<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Departments extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		
		$this->load->model('departments_model');
	}


	public function index()
	{
		$data = [];

		$data['departments'] = $this->departments_model->show_all();
		$this->loadViews("departments", $this->global, $data, NULL);
	}


	public function store()
	{
		$name = $this->input->post('name');
		$status = $this->input->post('status');

		if (!isset($status))
		{
			$status = 0;
		}

		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		if($this->form_validation->run())
		{
			$data = array(
				'name'				=>	$name,
				'status'			=>	$status,
			);

			$id = $this->departments_model->store($data);

			if ($id > 0)
			{
				$this->session->set_flashdata('success', 'Department added correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'Department not added correctly!');
			}
		}

		redirect('departments');
	}


	public function show_all()
    {
        $data = [];

		$data['data'] = $this->departments_model->show_all();

		echo json_encode($data);
    }

	
	public function update()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$status = $this->input->post('status');

		if (!isset($status))
		{
			$status = 0;
		}

		// CHECK IF DEPARTMENT EXIST
		$exist = $this->departments_model->check_if_exist($id);

		if (!empty($exist))
		{
			$updated = $this->departments_model->update($id, $name, $status);

			if ($updated > 0)
			{
				$this->session->set_flashdata('success', 'Department updated correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'Department not updated correctly!');
			}
		}

		redirect('departments');
	}


	public function destroy()
	{
		$id = $this->input->post('id');

		// CHECK IF DEPARTMENT EXIST
		$exist = $this->departments_model->check_if_exist($id);

		if (!empty($exist))
		{
			$deleted = $this->departments_model->destroy($id);

			if ($deleted)
			{
				$this->session->set_flashdata('success', 'Department deleted correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'Department not deleted correctly!');
			}
		}
	}
}
