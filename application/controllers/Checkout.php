<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Checkout extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		
		$this->load->model('chart_model');
		$this->load->model('checkout_model');
		$this->load->model('orders_model');
		$this->load->model('products_model');

		if (!$this->hasPermision(ROLE_CONSUMER))
		{
			redirect('login');
		}
	}


	public function index()
	{
		$data = [];

		$data['total_amount'] = $this->chart_model->sum_total($this->session->userdata('id'));

		if ($data['total_amount'][0]->total_amount > 0)
		{
			$this->loadViews("checkout", $this->global, $data, NULL);
		}
		else
		{
			redirect('');
		}
	}


	public function store()
	{
		$this->form_validation->set_rules('firstName', 'First Name', 'trim|required');
		$this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');

		$this->form_validation->set_rules('nameCard', 'Name on card', 'trim|required');
		$this->form_validation->set_rules('cardNumber', 'Credit card number', 'trim|required');
		$this->form_validation->set_rules('expiration', 'Expiration', 'trim|required');
		$this->form_validation->set_rules('cvv', 'CVV', 'trim|required');

		if($this->form_validation->run())
		{
			$user_id = $this->session->userdata('id');


			// CREDIT CARD ~ STORE
			$credit_card_data = array(
				'name'				=>	$this->input->post('nameCard'),
				'number'			=>	$this->input->post('cardNumber'),
				'expiration'		=>	$this->input->post('expiration'),
				'cvv'				=>	$this->input->post('cvv'),
				'fk_user_id'		=>	$user_id,
			);

			$this->load->model('credit_cards_model');
			$credit_card_id = $this->credit_cards_model->store($credit_card_data);


			// CHECKOUT ~ STORE
			$today_date = date('Y-m-d');
			$checkout_data = array(
				'first_name'		=>	$this->input->post('firstName'),
				'last_name'			=>	$this->input->post('lastName'),
				'address'			=>	$this->input->post('address'),
				'postcode'			=>	$this->input->post('postcode'),
				'city'				=>	$this->input->post('city'),
				'phone'				=>	$this->input->post('phone'),
				'country'			=>	$this->input->post('country'),
				'date'				=>	$today_date,
				'fk_user_id'		=>	$user_id,
				'fk_credit_card_id'	=>	$credit_card_id,
			);

			$checkout_id = $this->checkout_model->store($checkout_data);


			// ORDER & PRODUCTS
			$all_chart = $this->chart_model->show_all($user_id);
			foreach ($all_chart as $chart)
			{
				// ORDER ~ STORE
				$order_data = array(
					'fk_user_id'		=>	$user_id,
					'fk_checkout_id'	=>	$checkout_id,
					'fk_product_id'		=>	$chart->id_product,
					'quantity'			=>	$chart->quantity,
					'unit_price'		=>	$chart->price,
				);
	
				$this->orders_model->store($order_data);

				// PRODUCTS ~ UPDATE
				$this->products_model->update_quantity($chart->id_product, $chart->quantity);
			}


			// SHIPPING ~ STORE
			// --> NOT YET


			// CHART ~ DESTROY
			$this->chart_model->destroy_all($user_id);


			// FINISH
			redirect('');
		}
		else
		{
			$this->index();
		}
	}
}
