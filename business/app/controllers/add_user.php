<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/05/08
*/

class Add_user extends AM_Controller {


	public function index()
	{
		$this->load->view('add_user');
	}
}
