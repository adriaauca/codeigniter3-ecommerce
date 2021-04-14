<?php

defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . '/libraries/BaseController.php';

class Comments extends BaseController {


	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		
		$this->load->model('comments_model');

		if (!$this->hasPermision(ROLE_CONSUMER))
		{
			redirect('login');
		}
	}


	public function index()
	{
	
	}


	public function store()
	{
		$this->form_validation->set_rules('review', 'Review', 'trim|required');
		$this->form_validation->set_rules('stars', 'Stars', 'trim|required|is_natural|in_list[1,2,3,4,5]');

		$redirect = '';

		if ($this->form_validation->run())
		{
			$product_id = $_SESSION["productID"];
			$user_id = $this->session->userdata('id');

			// CHECK IF USER HAS BUYED PREVIOUSLY THE PORDUCT
			$this->load->model('orders_model');
			$buyed = $this->orders_model->check_if_user_has_buyed_the_product($product_id, $user_id);

			// CHECK IF USER HAS COMMENTED PREVIOUSLY THE PORDUCT
			$commented = $this->orders_model->check_if_user_has_commented_the_product($product_id, $user_id);

			
			if (!empty($buyed) && empty($commented))
			{
				$review = $this->input->post('review');
				$stars = $this->input->post('stars');
				$today_date = date('Y-m-d');
				

				$data = array(
					'review'			=>	$review,
					'stars'				=>	$stars,
					'date'				=>	$today_date,
					'fk_product_id'		=>	$product_id,
					'fk_user_id'		=>	$user_id,
				);

				$id = $this->comments_model->store($data);
	
				if ($id > 0)
				{
					$this->session->set_flashdata('success', 'Comment added correctly!');
				}
				else
				{
					$this->session->set_flashdata('error', 'Comment not added correctly!');
				}
				$redirect = str_replace(' ', '_', $buyed->name);
			}
		}

		redirect($redirect);
	}


	public function update()
	{
		$this->form_validation->set_rules('review', 'Review', 'trim|required');
		$this->form_validation->set_rules('stars', 'Stars', 'trim|required|is_natural|in_list[1,2,3,4,5]');

		$redirect = '';

		if ($this->form_validation->run())
		{
			$product_id = $_SESSION["productID"];
			$user_id = $this->session->userdata('id');

			// CHECK IF USER HAS BUYED PREVIOUSLY THE PORDUCT
			$this->load->model('orders_model');
			$buyed = $this->orders_model->check_if_user_has_buyed_the_product($product_id, $user_id);

			// CHECK IF USER HAS COMMENTED PREVIOUSLY THE PORDUCT
			$commented = $this->orders_model->check_if_user_has_commented_the_product($product_id, $user_id);

			
			if (!empty($buyed) && !empty($commented))
			{
				$review = $this->input->post('review');
				$stars = $this->input->post('stars');

				$id = $this->comments_model->update($product_id, $user_id, $stars, $review);
	
				if ($id > 0)
				{
					$this->session->set_flashdata('success', 'Comment added correctly!');
				}
				else
				{
					$this->session->set_flashdata('error', 'Comment not added correctly!');
				}
				$redirect = str_replace(' ', '_', $buyed->name);
			}
		}

		redirect($redirect);
	}


	public function destroy()
	{
		$product_id = $_SESSION["productID"];
		$user_id = $this->session->userdata('id');

		// CHECK IF USER HAS BUYED PREVIOUSLY THE PORDUCT
		$this->load->model('orders_model');
		$buyed = $this->orders_model->check_if_user_has_buyed_the_product($product_id, $user_id);

		// CHECK IF USER HAS COMMENTED PREVIOUSLY THE PORDUCT
		$commented = $this->orders_model->check_if_user_has_commented_the_product($product_id, $user_id);

		
		if (!empty($buyed) && !empty($commented))
		{
			$deleted = $this->comments_model->destroy($product_id, $user_id);

			if ($deleted)
			{
				$this->session->set_flashdata('success', 'Comment deleted correctly!');
			}
			else
			{
				$this->session->set_flashdata('error', 'Comment not deleted correctly!');
			}
		}
	}
}
