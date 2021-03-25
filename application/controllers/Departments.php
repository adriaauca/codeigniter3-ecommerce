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
	
	}


	public function create()
	{

	}


	public function store()
	{

	}


	public function show($name)
	{
		$data = [];

		$name = str_replace('_', ' ', $name);

		$data['product'] = $this->products_model->show($name);
		//$data['query']=$this->db->last_query();
		$this->loadViews("product", $this->global, $data, NULL);
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
}
