<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 author:ldp
 time:2015/06/09
*/

class Message extends AM_Controller {


	public function index()
	{
		$this->load->view('message_view');
	}
}
