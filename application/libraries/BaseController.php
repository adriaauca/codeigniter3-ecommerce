<?php

defined ( 'BASEPATH' ) or exit ( 'No direct script access allowed' ); 

class BaseController extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();

		$this->global['pageTitle'] = 'Store';

		$this->isLoggedIn();
	}
    

    function loadViews($viewName = "", $headerInfo = NULL, $pageInfo = NULL, $footerInfo = NULL)
    {
		$data['headerInfo'] = $headerInfo;

        $this->load->view('includes/header', $data);
        $this->load->view($viewName, $pageInfo);
        $this->load->view('includes/footer', $footerInfo);
    }


    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');
        
        if (isset($isLoggedIn) && $isLoggedIn == TRUE)
        {
            $this->global['name'] = $this->session->userdata('name');
        }
    }


    public function hasPermision($role)
	{
		if ($role == $this->session->userdata('fk_role_id'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}