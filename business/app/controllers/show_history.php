<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/07
*/

class Show_history extends AM_Controller {


	public function index()
	{
		$page_index = $this->uri->segment(3,1);
		$this->load->model('show_history_model');
		$data = $this->show_history_model->get_data('admin',$page_index,'*'); 
		$this->load->view('show_history_view',$data);
	}
}
