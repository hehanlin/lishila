<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/08
*/

class Show_users extends AM_Controller {


	public function index()
	{
		$this->load->view('show_users');
	}
}
