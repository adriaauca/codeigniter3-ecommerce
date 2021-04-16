<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Dashboard extends BaseController {


	public function __construct()
	{
		parent::__construct();
	}


	public function index()
	{
		$data = [];
		
		if ($this->session->userdata('fk_role_id') == FALSE || ($this->session->userdata('fk_role_id') == TRUE && ROLE_ADMIN != $this->session->userdata('fk_role_id')))
		{
			$this->load->model('products_model');
			$data['products'] = $this->products_model->get_products();


			$departments = array('Dashboard', "Today's Deals",'Popular products');

			$this->load->model('departments_model');
			$all_departments = $this->departments_model->show_all();

			foreach ($all_departments as $department)
			{
				array_push($departments, $department->name);
			}
			$this->global['nav_links'] = $departments;
		}

		$this->loadViews("dashboard", $this->global, $data, NULL);
	}
}
