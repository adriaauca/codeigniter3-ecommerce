<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Products extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		
		$this->load->model('products_model');
	}


	public function index()
	{
		$this->global['nav_links'] = array('Dashboard','Products', 'Users', 'Sells', 'Historic');
		$this->loadViews("products", $this->global, NULL, NULL);
	}


	public function create()
	{
		$data = [];

		$this->global['nav_links'] = array('Products');

		$this->load->model('departments_model');
		$data['all_departments'] = $this->departments_model->get_departments();
		$data['use'] = 'create';

		$this->loadViews("product", $this->global, $data, NULL);
	}


	public function store()
	{
		$status = 0;
		$image = "";

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('details', 'Details', 'trim|required');
		$this->form_validation->set_rules('model', 'Model', 'trim|required');
		$this->form_validation->set_rules('color', 'Color', 'trim|required');
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|is_natural');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		if (isset($_POST['image']))
		{
			$image = $this->input->post('image');
		}

		if (isset($_POST['status']))
		{
			$this->form_validation->set_rules('status', 'Status', 'trim|required|in_list[true]');
			$status = 1;
		}
		
		$this->form_validation->set_rules('fk_department_id', 'Department', 'trim|required|is_natural');

		if($this->form_validation->run())
		{
			$data = array(
				'name'				=>	$this->input->post('name'),
				'description'		=>	$this->input->post('description'),
				'details'			=>	$this->input->post('details'),
				'model'				=>	$this->input->post('model'),
				'color'				=>	$this->input->post('color'),
				'image'				=>	$image,
				'quantity'			=>	$this->input->post('quantity'),
				'price'				=>	$this->input->post('price'),
				'last_price'		=>	0,
				'discount'			=>	0,
				'discount_status'	=>	0,
				'status'			=>	$status,
				'fk_department_id'	=>	$this->input->post('fk_department_id'),
			);

			$id = $this->products_model->store($data);

			if ($id > 0)
			{
				$this->session->set_flashdata('success', 'Product added correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'Product not added correctly!');
			}

			redirect('products');
		}
		else {
			$this->create();
		}
	}


	public function show($name)
	{
		$data = [];

		$name = str_replace('_', ' ', $name);

		$this->global['nav_links'] = array('Product','Information', 'Details', 'Related Products', 'Comments');

		$this->load->model('departments_model');
		$departments = $this->departments_model->get_departments();

		$data['product'] = $this->products_model->show($name);

		if ($data['product'])
		{
			foreach ($departments as $department)
			{
				if ($department->id == $data['product']->fk_department_id)
				{
					$data['department'] = $department->name;
				}
			}

			$data['use'] = 'show';

			$this->load->model('comments_model');
			$data['comments'] = $this->comments_model->show($data['product']->id);
			
			if ($this->hasPermision(ROLE_ADMIN))
			{
				$data['all_departments'] = $departments;
				$data['use'] = 'edit';
				$this->global['nav_links'] = array('Products');
			}

			if ($this->hasPermision(ROLE_CONSUMER))
			{
				// CHECK IF USER HAS BUYED PREVIOUSLY THE PORDUCT
				$this->load->model('orders_model');
				$data['buyed'] = $this->orders_model->check_if_user_has_buyed_the_product($data['product']->id, $this->session->userdata('id'));

				// CHECK IF USER HAS COMMENTED PREVIOUSLY THE PORDUCT
				$data['commented'] = $this->orders_model->check_if_user_has_commented_the_product($data['product']->id, $this->session->userdata('id'));
			}
	
			$this->loadViews("product", $this->global, $data, NULL);
		}
		else
		{
			redirect('');
		}
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


	public function show_all()
    {

        $data = [];

		$data['data'] = $this->products_model->show_all();

		echo json_encode($data);
    }
}
