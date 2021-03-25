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
		}
		else
		{
			$this->global['nav_links'] = array('Dashboard','Products', 'Users', 'Sells', 'Historic');
		}

		$this->loadViews("dashboard", $this->global, $data, NULL);
	}
}
