<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/07
*/

class Show_orders extends AM_Controller {


	public function index()
	{
		$page_index = $this->uri->segment(3,1);
		$this->load->model('show_orders_model');
		$this->show_orders_model->get_api_data();
		$this->load->view('show_orders_view');
	}

	public function doDelete(){
		
	}
}
