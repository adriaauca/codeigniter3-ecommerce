<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Chart extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('cart');
		
		$this->load->model('chart_model');
	}


	public function index()
	{
		$data = [];

		if ($this->session->userdata('name'))
		{
			if ($this->cart->contents())
			{
				foreach ($this->cart->contents() as $product)
				{
					$product = (object)$product;

					$product_id = $product->id;
					$user_id = $this->session->userdata('id');
					$quantity = $product->qty;
		
					
					$check_if_exists = $this->chart_model->check_if_exists($product_id, $user_id);;
		
					if ($check_if_exists > 0)
					{
						$this->chart_model->update($product_id, $user_id, $quantity);
					}
					else
					{
						$data = array(
							'fk_product_id'		=>	$product_id,
							'fk_user_id'		=>	$user_id,
							'quantity'			=>	$quantity,
						);

						$this->chart_model->store($data);
					}

					$data = array(
						'rowid'   => $product->rowid,
						'qty'     => 0
					);
			
					$this->cart->update($data);
				}
			}

			$data['all_chart_products'] = $this->chart_model->show_all($this->session->userdata('id'));
		}
		else
		{
			$data['all_chart_products'] = $this->cart->contents();
		}

		$this->loadViews("chart", $this->global, $data, NULL);
	}


	public function store()
	{
		$this->form_validation->set_rules('quantity', 'Quantity', 'trim|required|is_natural');

		if($this->form_validation->run())
		{
			if ($this->session->userdata('name'))
			{
				$product_id = $_SESSION["productID"];
				$user_id = $this->session->userdata('id');
				$quantity = $this->input->post('quantity');
	
				
				$check_if_exists = $this->chart_model->check_if_exists($product_id, $user_id);;
	
				if ($check_if_exists > 0)
				{
					$id = $this->chart_model->update($product_id, $user_id, $quantity);
				}
				else
				{
					$data = array(
						'fk_product_id'		=>	$product_id,
						'fk_user_id'		=>	$user_id,
						'quantity'			=>	$quantity,
					);
	
					$id = $this->chart_model->store($data);
		
					if ($id > 0)
					{
						$this->session->set_flashdata('success', 'Product added correctly!');
					}
					else
					{
						$this->session->set_flashdata('error', 'Product not added correctly!');
					}
				}
			}
			else
			{
				$newProduct = TRUE;
				$rowid = '';

				foreach ($this->cart->contents() as $product)
				{
					$product = (object)$product;

					if ($product->id == $_SESSION["productID"])
					{
						$rowid = $product->rowid;
						$newProduct = FALSE;
					}
				}
				
				if ($newProduct)
				{
					$this->load->model('products_model');
					$product = $this->products_model->get_product($_SESSION["productID"]);
	
					$data = array(
						'id'		 => $_SESSION["productID"],
						'model'      => $product->model,
						'color'      => $product->color,
						'qty'   	 => $this->input->post('quantity'),
						'price'      => $product->price,
						'name'		 => $product->name,
						'discount_status'	=> $product->discount_status,
						'discount'	 => $product->discount,
						'last_price' => $product->last_price,
						'name_department' => $product->name_department
					);
					
					$this->cart->insert($data);
				}
				else
				{
					$data = array(
						'rowid'   => $rowid,
						'qty'     => $this->input->post('quantity')
					);
			
					$this->cart->update($data);
				}
			}

			redirect('chart');
		}
		else {
			$this->index();
		}
	}

	
	public function update()
	{
		$id = $this->input->post('id');
		$user_id = $this->session->userdata('id');
		$quantity = $this->input->post('quantity');

		$updated = $this->chart_model->update($id, $user_id, $quantity);

		if ($updated > 0)
		{
			return 'The product chart was updated correctly!';
		}
		else
		{
			return 'Error - The product chart was not updated';
		}
	}


	public function destroy()
	{
		$id = $this->input->post('id');

		if ($this->session->userdata('name'))
		{
			$user_id = $this->session->userdata('id');

			$deleted = $this->chart_model->destroy($id, $user_id);
		}
		else
		{
			$data = array(
				'rowid'   => $id,
				'qty'     => 0
			);
	
			$this->cart->update($data);

			$deleted = TRUE;
		}

		if ($deleted)
		{
			return 'The product chart was deleted correctly!';
		}
		else
		{
			return 'Error - The product chart was not deleted';
		}
	}
}
